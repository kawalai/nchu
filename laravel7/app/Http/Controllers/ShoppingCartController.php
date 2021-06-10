<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
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

            $data = ['qty' => $qty, 'sum' => $sum, 'shipping' => $shipping, 'total' => $total];

            // dd($data);

            return view('checkout2', compact('data'));
        }
    }

    public function paymentShipment(Request $request)
    {
        if ($request->payment && $request->shipment) {
            Session::put('payment', $request->payment);
            Session::put('shipment', $request->shipment);
            return view('checkout3');
        }
    }

    public function checkout3()
    {
        return view('checkout3');
    }

    public function checkout4()
    {
        return view('checkout4');
    }

    static function swal($icon, $title, $message)
    {
        return ['icon' => $icon, 'title' => $title, 'message' => $message];
    }
}
