<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductAttribute;
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
        return view('products.list');
    }


    public function json() {
        $products = Product::get_products();
        return $products;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function new()
    {
        //
        $product_categories = ProductCategory::get()->toTree();
        return view('products.new', compact('product_categories'));
    }

    public function create(Request $request)
    {
       
        //$product->productCategories()->sync($request->categories);

        // dump($request->file());
  
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
    public function show(Product $product)
    {
        //
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
    public function update(Request $request, Product $product)
    {
        //
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

        $products = Product::get_products();

        dd($products);
    }
}
