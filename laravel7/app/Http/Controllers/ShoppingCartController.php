<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use App\OrderDetail;
use App\OrderStatus;
use App\ShippingStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Darryldecode\Cart\Facades\CartFacade;

class ShoppingCartController extends Controller
{
    public function add(Request $result)
    {
        $Product = Product::find($result->productId); // assuming you have a Product model with id, name, description & price
        // dd($Product);
        $rowId = 456; // generate a unique() row ID
        $userID = 2; // the user ID to bind the cart contents

        // // 偷懶，add前先全清掉，正式流程不能留
        // CartFacade::clear();

        $result = CartFacade::add(array(
            'id' => $Product->id,
            'userId' => $userID,
            'name' => $Product->name,
            'price' => $Product->price,
            'quantity' => 1,
            'attributes' => array(
                'img' => $Product->img,
            ),
            'associatedModel' => $Product
        ));

        return 'success';
    }
    public function removeSpecificProduct(Request $result)
    {
        // 不管有沒有刪除東西都是回傳true...
        $items = CartFacade::remove($result->productId);

        return 'success';
    }

    public function updateProductQuantity(Request $request)
    {
        // 避免0，負值
        if ($request->qty < 1) {
            $request->qty = 1;
        }
        // 取得目前數量 $item->quantity
        $item = CartFacade::get($request->productId);
        // 結果數量 $request->qty
        // 數量的差就是要放去quantity的值
        $quantity = $request->qty - $item->quantity;
        // 更新資料 : 值的差距
        CartFacade::update($request->productId, array(
            'quantity' => $quantity,
        ));

        return 'success';
    }

    public function content()
    {
        $items = CartFacade::getContent();

        $result = $items->toJson();

        return $items;
    }

    public function checkout1()
    {
        $cart = CartFacade::getContent()->sortBy('id');
        // // -------------建立有排序的array-----------------------
        // $data = [];
        // foreach ($cart as $i) {
        //     $data[] = $i;
        // }
        // // 取得作為排序依據的array
        // foreach ($data as $k => $v) {
        //     $edition[] = $v['id'];
        // }
        // // 使用array_multisort(排序依據, SORT_DESC, 要整理的array)整理目標array
        // array_multisort($edition, SORT_ASC, $data);
        // // 懶得去改blade頁面，所以塞回$cart
        // $cart = $data;
        // // ------------------------------------

        return view('checkout1', compact('cart'));
    }

    public function checkout2()
    {
        // CartFacade::clear();
        if (CartFacade::isEmpty()) {
            return redirect('/products')->with($this->swal('warning', '結帳失敗', '請選擇商品'));
        } else {
            $cart = CartFacade::getContent()->sortBy('id');

            $qty = 0;
            $sum = 0;
            foreach ($cart as $i) {
                $qty += $i->quantity;
                $sum += $i->quantity * $i->price;
            }
            if ($sum > 1000) {
                $shipping = 0;
            } else {
                $shipping = 80;
            }
            $total = $sum + $shipping;
            $data = ['qty' => number_format($qty), 'sum' => number_format($sum), 'shipping' => number_format($shipping), 'total' => number_format($total)];

            return view('checkout2', compact('data'));
        }
    }

    public function paymentShipment(Request $request)
    {
        $cart = CartFacade::getContent()->sortBy('id');
        $qty = 0;
        $sum = 0;
        foreach ($cart as $i) {
            $qty += $i->quantity;
            $sum += $i->quantity * $i->price;
        }
        if ($sum > 1000) {
            $shipping = 0;
        } else {
            $shipping = 80;
        }
        $total = $sum + $shipping;
        $data = ['qty' => number_format($qty), 'sum' => number_format($sum), 'shipping' => number_format($shipping), 'total' => number_format($total)];

        if ($request->payment && $request->shipment) {
            Session::put('payment', $request->payment);
            Session::put('shipment', $request->shipment);
            return view('checkout3', compact('data'));
        }
    }

    public function checkoutEnd(Request $request)
    {
        // dd($request->all());

        // 取得現在購物車內商品
        $cartData = CartFacade::getContent()->sortBy('id');
        // 取得訂單初始狀態(第一個)
        $shipping_status = ShippingStatus::orderBy('sort', 'asc')->first();
        $order_status = OrderStatus::orderBy('sort', 'asc')->first();

        // 取得目前會員(user)ID
        $user = Auth::user();
        // 將訂單寫進資料庫order table
        $order = Order::create([
            'user_id' => $user->id,
            'order_no' => 'DP' . time() . rand(1, 9999),
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->mail,
            'county' => $request->county,
            'district' => $request->district,
            'zipcode' => $request->zipcode,
            'address' => $request->address,
            'price' => 99999999,
            'pay_type' => Session::get('payment'), // 從session拿付款方式
            'shipping' => Session::get('shipment'), // 從session拿運送方式
            'shipping_fee' => 99999999,
            'shipping_status_id' => $shipping_status->id,
            'order_status_id' => $order_status->id,
            'remark' => '',
        ]);

        // 總額init
        $totalPrice = 0;
        // 對每筆商品做處理
        foreach ($cartData as $data) {
            // 取得商品資料
            $productId = $data->id;
            $product = Product::find($productId);
            // 取得購買此項商品總金額
            $totalPrice += $data->quantity * $product->price;
            // 將此筆訂單商品細項寫進OrderDetail table
            OrderDetail::create([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'qty' => $data->quantity,
                'old' => $product->tojson()
            ]);
        }
        // 計算運費大於1000免運
        $fee = $totalPrice > 1000 ? 0 : 60;
        // 更新本次訂單的金額&運費
        $order->update([
            'price' => $totalPrice + $fee,
            'shipping_fee' => $fee,
        ]);

        // 清掉購物車&使用的session
        CartFacade::clear();
        Session::forget('payment');
        Session::forget('shipment');

        return view('checkout4');
    }

    static function swal($icon, $title, $message)
    {
        return ['icon' => $icon, 'title' => $title, 'message' => $message];
    }
}
