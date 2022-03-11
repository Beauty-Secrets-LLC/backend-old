<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\ProductCategory;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $casts = [
        'data'  =>  'array'
    ];
    protected $fillable = [
        'name',
        'status',
        'type',
        'price_regular',
        'price_sale',
        'quantity',
        'data',
        'is_preorder',
        'is_digital',
        'user_id'
    ];


    /* PRODUCT STATUSES */
    const STATUS_SCHEDULED = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_DRAFT = 2;
    const STATUS_INACTIVE = 3;
    /* STOCK STATUSES */
    const STOCK_INSTOCK = 1;
    const STOCK_OUTOFSTOCK = 0;

    public function productCategory()
    {
        return $this->belongsToMany(ProductCategory::class,'product_product_categories');
    }

    public function productAttributes()
    {
        return $this->hasMany(ProductAttributeValue::class);
    }

    public function productVariation()
    {
        //return $this->hasMany(ProductVariation::class)->addSelect('product_id',  \DB::raw("CONCAT( MIN(regular_price), '-', MAX(regular_price)) AS price"));
        return $this->hasMany(ProductVariation::class);
    }

    public function variationSummary()
    {
        return $this->hasMany(ProductVariation::class)
        ->addSelect('product_id',  \DB::raw("CONCAT( MIN(regular_price), '-', MAX(regular_price)) AS price"))
        ->addSelect('product_id',   \DB::raw("SUM(stock_quantity) AS qty"));
        //return $this->hasMany(ProductVariation::class);
    }

    public static function create_product($data) {

        $user = \Auth::user();
        
        unset($data['_token']);
        unset($data['featured_image_remove']);
        unset($data['tags']);
        $data['user_id'] = $user->id;
        $product = Product::create($data);
        
        //Setting product categories
        if(isset($data['categories']) && !empty($data['categories'])) {
            $product->productCategory()->sync($data['categories']);
        }

        $attributes_data = [];
        if(isset($data['attributes']) && !empty($data['attributes'])) {
            $index = 0;
            foreach($data['attributes'] as $attribute) {
                //setting up regsitered attribute data
                if(isset($attribute['id'])) {
                    if(!empty($attribute['value'])) {
                        foreach($attribute['value'] as $value) {
                            $value = json_decode($value, true);
                            $attributes_data[$index]['type']                 = 'attribute'; 
                            $attributes_data[$index]['attribute_id']         = $attribute['id'];
                            $attributes_data[$index]['attribute_name']       = $attribute['name'];
                            $attributes_data[$index]['attribute_value_id']   = $value['attribute_value_id'];
                            $attributes_data[$index]['attribute_value']      = $value['name'];
                            $attributes_data[$index]['use_for_variation']    = $attribute['use_for_variation'];
                            $index++;
                        }
                    }
                }else {
                    //setting up custom attribute data
                    $values = explode('|', $attribute['value']);
                    if(!empty($values)) {
                        foreach($values as $value) {
                            $attributes_data[$index]['type']                 = 'custom'; 
                            $attributes_data[$index]['attribute_name']       = $attribute['name'];
                            $attributes_data[$index]['attribute_value']      = $value;
                            $attributes_data[$index]['use_for_variation']    = $attribute['use_for_variation'];
                            $index++;
                        }
                    }
                }
            }
        }

        $product_attributes = $product->productAttributes()->createMany($attributes_data);
        //Setting product variations
        $variations = $product->productVariation()->createMany($data[$data['type']]);
        
        // //Setting variations attribute / pivot
        // if(!empty($variations)) {
        //     $variation_attribute_values = [];
        //     foreach($variations as $variation) {
        //         if(!empty( $variation['attributes'] )) {
        //             dump($variation['attributes']);
        //             foreach( $variation['attributes'] as $attribute_name => $attribute) {
        //                 $json_to_array = json_decode($attribute, true);
        //                 if(json_last_error() === 0 && isset($json_to_array['product_attribute_value_id'])) {
        //                     $attribute_value_data = [
        //                         'product_attribute_id' => $json_to_array['attribute_id'],
        //                         'product_attribute_name' => $attribute_name,
        //                         'product_attribute_value_id' => $json_to_array['product_attribute_value_id'],
        //                         'product_attribute_value_name' => $json_to_array['name']
        //                     ];
        //                     $variation->attributeValues()->attach($json_to_array['product_attribute_value_id'], $attribute_value_data);
   
        //                 }
        //             }
        //         }
        //     }
        // }

        return $product;
    }


    public static function get_products($options = null) {
        $result = [];

        $result['draw'] = (isset($options['draw'])) ? $options['draw'] : 0;
        $query = Product::with([
            'productCategory',
            'productAttributes'
        ]);

        //Нийт бичлэгийн тоог авч бна
        $result['recordsTotal'] = $query->count();
        
        //Шүүлт хийсний дараах бичлэгийн тоог авч бна
        $result["recordsFiltered"] = $query->count();
        
        if(isset($options['start']) && isset($options['length']))
            $query->offset($options['start'])->limit($options['length']);

        $result['data'] = $query->get()->toArray();
        $result['draw']++;
        return $result;
    }

    public static function get_product($id) {
        $product = Product::with([
            'productCategory',
            'productAttributes',
            'productVariation'
            // 'productVariation'=>function($variation) {
            //     $variation->with([
            //         'attributeValues' => function($attribute_value) {
            //             $attribute_value->with([
            //                 'attribute' => function ($attribute) {
            //                     $attribute->select('id', 'name');
            //                 }
            //             ])->select(
            //                 'value',
            //                 'product_attribute_id'
            //             );
            //         }
            //     ]);
            // }
        ])->where('id', $id)->first()->toArray();

        return $product;
    }


    public static function boot() {
        parent::boot();

        static::deleting(function($product) { 
            $product->productAttributes()->delete();
            $product->productVariation()->delete();
        });
    }
}
