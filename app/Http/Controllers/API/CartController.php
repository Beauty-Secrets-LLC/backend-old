<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

class CartController extends Controller
{
    public function getItems()
    {

        $guest_session = Session::getId();
        $cartItems = \Cart::session($guest_session)->getContent();
        dd($cartItems);

    }

    public function addCart(Request $request)
    {
        $guest_session = Session::getId();
        dd($guest_session);
        $add = \Cart::session($guest_session)->add([
            'id' => '123',
            'name' => 'test product',
            'price' => 15500,
            'quantity' => 1,
            'attributes' => [],
            'associatedModel' => [
                'id' => 1,
                'name' => 'test product'
            ]
        ]);
        dd($add);
    }
    //
}
