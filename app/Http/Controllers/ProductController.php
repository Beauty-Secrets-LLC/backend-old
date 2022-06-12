<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\Media;
use App\Models\Brand;
use Illuminate\Http\Request;
use Spatie\Tags\Tag;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
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
            return view('products.view', compact('product', 'product_categories', 'product_tags'));
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
            return view('products.view', compact('product','product_categories', 'product_tags'));
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
        // dd($request->all());
        DB::beginTransaction();
        try {
           
            $product = Product::find($id);
            //update categories
            if(isset($request['categories']) && !empty($request['categories'])) {
                $product->productCategory()->sync($request['categories']);
            }
            //update tags
            if(isset($request['tags']) && !empty($request['tags'])) {
                $raw_tags = json_decode($request['tags'], true);
                $tags = [];

                foreach($raw_tags as $tag) {
                    $tagObject = Tag::findOrCreateFromString($tag['value'], 'product', 'mn');
                    $tags[] = $tag['value'];
                }
                $product->syncTags($tags);
            }

            
            //update model
            $product->update($request->all());

            DB::commit();
            $request->session()->flash('success', "Бүтээгдэхүүн шинэчлэгдлээ");

        } catch (\Exception $e) {
            $request->session()->flash('error', $e->getMessage());
            DB::rollback();
        }
        return redirect()->back();
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

    public function sync() {
        $response = Http::post('http://beautysecrets.mn/wp-json/manal/v1/test')->json();

        $img = \Image::make($response[0]['images']['featured']);
        // header('Content-Type: image/png');
        // return $img->response();


        $uploaded_file = Storage::disk('gcs')->put('synced/'.date('Y/m').'/test.jpg',$img->stream());


        dump(Storage::disk('gcs')->url('synced/'.date('Y/m').'/test.jpg'));
        dd('end');
        if(!empty($response)) {
            DB::beginTransaction();
            try {
            
                foreach($response as $product) {
                    $synced = DB::table('wp_product_sync')->where('wp_id', $product['id'])->first();

                    if($synced)
                        continue;

                    //FIND BRAND
                    if(isset($product['brand']) && !empty($product['brand'])) {
                        $brand = Brand::where('name',$product['brand'])->first();
                    }
                    //CREATE PRODUCT
                    $new_product = Product::create([
                        'name'          => $product['name'],
                        'type'          => 'simple',
                        'regular_price' => (int) $product['regular_price'],
                        'stock_status'  => $product['stock_status'],
                        'stock_quantity'=> $product['stock_quantity'],
                        'brand_id'      => ($brand) ? $brand->id : null,
                        'sale_price'    => (int) $product['sale_price'],
                        'data'          => $product['data'],
                        'created_at'    => $product['created_at'],
                        'user_id'       => auth()->user()->id,
                    ]);

                    //ASSIGN CATEGORIES
                    if(!empty($product['categories'])) {
                        foreach($product['categories'] as $cat_index => $category) {
                            $product['categories'][$cat_index] = trim($category);
                        }
                        $cats = ProductCategory::whereIn('name', $product['categories'])->pluck('id');
                        $new_product->productCategory()->sync($cats);
                    }      
                    
                    //ASSIGN TAGS
                    if(!empty($product['tags'])) {
                        foreach($product['tags'] as $tag) {
                            $tag= trim($tag);
                            $tagObject = Tag::findOrCreate($tag, 'product', 'mn');
                            $new_product->attachTag($tagObject);
                        }
                    }

                    //ASSIGN ATTRIBUTES
                    $attributes_data = [];
                    //skin_type
                    if(isset($product['skin_type']) && !empty($product['skin_type'])) {
                        foreach($product['skin_type'] as $skin_type) {
                            $skin_type = trim($skin_type);
                            $attr = AttributeValue::where('value', $skin_type)->first();
                            if($attr) {
                                $attributes_data[] = [
                                    'type'              => 'attribute',
                                    'attribute_id'      => 2,
                                    'attribute_name'    => 'Арьсны төрөл',
                                    'attribute_value_id'=> $attr->id,
                                    'attribute_value'   => $skin_type,
                                    'use_for_variation' => 0,
                                ];
                            }
                            
                        }
                    }

                    //size 
                    if(isset($product['size']) && !empty($product['size'])) {
                        $attributes_data[] = [
                            'type'                  => 'custom',
                            'attribute_name'        => 'Хэмжээ',
                            'attribute_value'       => $product['size'],
                            'use_for_variation'     => 0,
                        ];
                    }

                    $new_product->productAttributes()->createMany($attributes_data);

                    //Reg to synced
                    DB::table('wp_product_sync')->insert([
                        'wp_id' => $product['id'],
                        'p_id'  => $new_product->id
                    ]);
                    
                    
                }

                DB::commit();
            } catch (\Exception $e) {
                dump($e->getMessage());
                DB::rollback();
            }

            
        }

        
    }


}
