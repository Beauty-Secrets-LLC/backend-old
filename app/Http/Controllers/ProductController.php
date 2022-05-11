<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Attribute;
use App\Models\Media;
use Illuminate\Http\Request;
use Spatie\Tags\Tag;
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
        $user = \Auth::user();
        if($user->hasPermissionTo('product_create')) {
            $product = null;
            $product_categories = ProductCategory::get()->toTree();
            $product_tags = Tag::selectRaw('name->>"$.mn" as tagname')->where('type', 'product')->pluck('tagname')->toArray();
            return view('products.new', compact('product', 'product_categories', 'product_tags'));
        }
        else {
            $request->session()->flash('error', 'Танд бүтээгдэхүүн нэмэх эрх байхгүй байна.');
            return redirect()->back();
        }
        
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
        return redirect()->route('products.list');
      
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

        if(is_null($product)) {
            abort(404, "The Product was not found");
        } 
        else {
            $product_categories = ProductCategory::get()->toTree();
            $product_tags = Tag::selectRaw('name->>"$.mn" as tagname')->where('type', 'product')->pluck('tagname')->toArray();
            return view('products.new', compact('product','product_categories', 'product_tags'));
        }
        
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

    public function delete(Request $request)
    {
        $user = \Auth::user();

        if($user->hasPermissionTo('product_delete')) {
            if(isset($request['ids']) && !empty($request['ids'])) {
                $products = Product::withTrashed()->whereIn('id', $request['ids'])->get();
                foreach($products as $product) {
                    if ($product->trashed()) {
                        //Permanant delete
                        $product->forceDelete();
                    } 
                    else {
                        //Soft delete
                        $product->delete();
                    }
                }
                return ['result' => 'success','message' => 'Амжилттай устгагдлаа.'];
            }
        }
        else {
            return ['result' => 'failed', 'message' => 'Та энэ үйлдлийг хийх эрхгүй !'];
        }

        return false;    
    }

    public function restore($id)
    {
        $user = \Auth::user();
        if($user->hasPermissionTo('product_restore')) {
            Product::onlyTrashed()->find($id)->restore();
            return ['result' => 'success','message' => 'Амжилттай сэргээлээ.'];
        }
        else {
            return ['result' => 'failed', 'message' => 'Та энэ үйлдлийг хийх эрхгүй !'];
        }
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
        $user = \Auth::user();
        dd($user->hasPermissionTo('product_delete'));
        return view('test');
        
    }


}
