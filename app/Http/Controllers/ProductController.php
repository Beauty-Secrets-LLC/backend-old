<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Attribute;
use Illuminate\Http\Request;
use DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::get_products();
        $product_categories = ProductCategory::get()->toTree()->toArray();
        return view('products.list', compact('product_categories'));
    }


    public function json(Request $request) {
        $products = Product::get_products($request->all());
        return $products;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(Request $request)
    {
        $product = null;
        $product_categories = ProductCategory::get()->toTree();
        return view('products.new', compact('product', 'product_categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $product = Product::create_product($request->all());
            DB::commit();
            $request->session()->flash('success', "Бүтээгдэхүүн нэмэгдлээ.");

        } catch (\Exception $e) {
            $request->session()->flash('error', $e->getMessage());
            DB::rollback();
        }
        return redirect()->back();
      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $product = Product::get_product($id);
        $product_categories = ProductCategory::get()->toTree();
        return view('products.new', compact('product','product_categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        dump($id);
        dd($request->all());
    }

    public function delete($id)
    {
        $product = Product::withTrashed()->find($id);
        if ($product->trashed()) {
            //Permanant delete
            $product->forceDelete();
        } 
        else {
            //Soft delete
            $product->delete();
        }
        return $product;
    }

    public function restore($id)
    {
        return Product::onlyTrashed()->find($id)->restore();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

    public function test() {
        // $product = Product::find(42)->with([
        //     'productVariation' => function($variation) {
        //         $variation->with([
        //             'attributeValues' => function($attribute_value) {
        //                 $attribute_value->with('attribute');
        //             }
        //         ]);
        //     }
        // ])
        // ->first()->toArray();
        return view('test');
        
    }

    public function api() {
        return 'sda';
    }
}
