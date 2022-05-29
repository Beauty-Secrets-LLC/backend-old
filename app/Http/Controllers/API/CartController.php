<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
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
        // $_SESSION['zz'] = "hello";
        dd($guest_session);
        // $add = \Cart::session($guest_session)->add([
        //     'id' => '123',
        //     'name' => 'test product',
        //     'price' => 15500,
        //     'quantity' => 1,
        //     'attributes' => [],
        //     'associatedModel' => [
        //         'id' => 1,
        //         'name' => 'test product'
        //     ]
        // ]);
        dd($add);
    }
    
    public function checkproduct(Request $request)
    {

        try {

            if(!$request->has('pid') || !$request->has('quantity')) throw new \Exception('Мэдээлэл буруу');

            $product = Product::where('id',$request->get('pid'))->first();
            if(!$product) throw new \Exception('Бүтээгдэхүүн олдсонгүй');

            // Product type == simple
            if($product['type'] == "simple") {
                if($product['stock_status'] == 1 && $product['stock_quantity'] < $request->get('quantity')) throw new \Exception('Тухайн барааг '.$request->get('quantity').' тоогоор авах боломжгүй.');
            }

            return response()->json([
                'success' => true
            ], 200, [], JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
            
        } catch (\Exception $e) {

            return response()->json([
                'success'=>false,
                'message'=>$e->getMessage()
            ], 400, [], JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
            
        }

    }
}
