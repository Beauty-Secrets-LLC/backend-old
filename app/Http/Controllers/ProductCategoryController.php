<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use DB;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        $category_tree = ProductCategory::get()->toTree();
        // $traverse = function ($categories, $prefix = '') use (&$traverse) {
        //     foreach ($categories as $category) {
        //         $category->name = $prefix.''.$category->name;
        //         $traverse($category->children, $prefix.'-');
        //     }
        // };
        // $traverse($category_tree);
        $categories = ProductCategory::all();
        return view('product_categories.list', compact('category_tree','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product_category = ProductCategory::create(['name' => $request->get('name')]);
        if($request->get('parent_id') && !is_null($request->get('parent_id'))) {
            $parent = ProductCategory::find($request->get('parent_id'));
            $parent->appendNode($product_category);
        }

        session()->flash('success', 'Ангилалыг амжилттай бүртгэлээ.');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ProductCategory $productCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductCategory $productCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductCategory $productCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductCategory $productCategory)
    {
        //
    }

    public function sync() {
        // $response = Http::post('http://beautysecrets.mn/wp-json/manal/v1/test')->json();
        // DB::beginTransaction();
        // try {
        //     foreach($response as $category) {
        //         $cat = ProductCategory::create(['name' => $category['name']]);
        //         if(!empty($category['sub'])) {
        //             foreach($category['sub'] as $child1) {
        //                 $child1_new = ProductCategory::create(['name' => $child1['name']]);
        //                 $cat->appendNode($child1_new);

        //                 if(!empty($child1['sub'])) {
        //                     foreach($child1['sub'] as $child2) {
        //                         $child2_new = ProductCategory::create(['name' => $child2['name']]);
        //                         $child1_new->appendNode($child2_new);
        //                     }
        //                 }
        //             }
        //         }
        //     }



        //     DB::commit();
        // } catch (\Exception $e) {
        //     dump($e->getMessage());
        //     DB::rollback();
        // }
    }
}
