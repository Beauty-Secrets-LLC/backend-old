<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductApiController extends Controller
{
    public function index(Request $request)
    {

        try {

            switch (true) {
                case $request->get('type') == 'sales':
                    $products = Product::get_items_sales($request);
                    break;
                
                default:
                    $products =[ Product::get_items_latest($request)];
                    break;
            }

            return response()->json([
                'success' => true,
                'data' => $products
            ], 200, [], JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
            
        } catch (\Exception $e) {

            return response()->json([
                'success'=>false,
                'message'=>$e->getMessage()
            ], 404, [], JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
            
        }

    }

    public function show($slug)
    {

        try {

            $product = Product::with([
                'tags',
                'productCategory',
                'productVariation'
            ])->where('slug', $slug)->first();
            if(!$product) throw new \Exception('Бүтээгдэхүүн олдсонгүй');
 
            return response()->json([
                'success' => true,
                'data' => $product
            ], 200, [], JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
            
        } catch (\Exception $e) {

            return response()->json([
                'success'=>false,
                'message'=>$e->getMessage()
            ], 400, [], JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
            
        }

    }
    //
}
