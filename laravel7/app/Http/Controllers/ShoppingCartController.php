<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
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

    public function content()
    {
        $items = CartFacade::getContent();

        $result = $items->toJson();

        // dd($items);
        // dd($result);

        return $items;
        // return $result;
    }

    public function checkout1()
    {
        $cart = CartFacade::getContent();
        // dd($cart);
        return view('checkout1', compact('cart'));
    }

    public function checkout2()
    {
        return view('checkout2');
    }

    public function checkout3()
    {
        return view('checkout3');
    }

    public function checkout4()
    {
        return view('checkout4');
    }
}
