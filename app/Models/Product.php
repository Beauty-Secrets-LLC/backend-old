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
        'data'  =>  'array',
        'total_quantity' =>  'integer'
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
        return $this->belongsToMany(ProductCategory::class,'products_product_category');
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
        
        //Setting product variations
        $variations = $product->productVariation()->createMany($data[$data['type']]);
        //Setting variations attribute / pivot
        if(!empty($variations)) {
            foreach($variations as $variation) {
                if(!empty( $variation['attributes'] )) {
                    foreach( $variation['attributes'] as $attribute) {
                        $json_to_array = json_decode($attribute, true);
                        if(json_last_error() === 0 && isset($json_to_array['product_attribute_value_id'])) {
                            $variation->attributeValues()->sync([$json_to_array['product_attribute_value_id']]);
                        }
                    }
                }
            }
        }
        return $product;
    }


    public static function get_products($options = null) {
        $result = [];

        $result['draw'] = (isset($options['draw'])) ? $options['draw'] : 0;
        $query = Product::with([
            'productCategory',
            'productVariation'=>function($variation) {
                $variation->with([
                    'attributeValues' => function($attribute_value) {
                        $attribute_value->with([
                            'attribute' => function ($attribute) {
                                $attribute->select('id', 'name');
                            }
                        ])->select(
                            'value',
                            'product_attribute_id'
                        );
                    }
                ])->sum('stock_quantity');
            },

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
            'productVariation'=>function($variation) {
                $variation->with([
                    'attributeValues' => function($attribute_value) {
                        $attribute_value->with([
                            'attribute' => function ($attribute) {
                                $attribute->select('id', 'name');
                            }
                        ])->select(
                            'value',
                            'product_attribute_id'
                        );
                    }
                ]);
            }
        ])->where('id', $id)->first()->toArray();

        return $product;
    }


    public static function boot() {
        parent::boot();

        static::deleting(function($product) { 
            $product->productVariation()->delete();
        });
    }
}
