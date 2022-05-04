<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Tags\Tag;
use Spatie\Tags\HasTags;

use App\Models\ProductCategory;

class Product extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, LogsActivity, InteractsWithMedia, HasTags;

    protected $casts = [
        'data'  =>  'array',
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s'
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
        //Prepare create a product
        $user = \Auth::user();
        $data['user_id'] = $user->id;
        //Creating product
        $product = Product::create($data);
        
        //Add featured image
        if(isset($data['featured_image']) && !empty($data['featured_image'])) {
            $product->addMedia($data['featured_image'])->toMediaCollection('product_image', 'gcs');
        }

        //Add featured image
        if(isset($data['gallery_image']) && !empty($data['gallery_image'])) {
            foreach($data['gallery_image'] as $gallery) {
                $product->addMedia($gallery)->toMediaCollection('product_gallery', 'gcs');
            }
            
        }
        
        //Add tags
        if(isset($data['tags']) && !empty($data['tags'])) {
            $raw_tags = json_decode($data['tags'], true);
            $tags = [];
            foreach($raw_tags as $tag) {
                $tagObject = Tag::findOrCreate($tag['value'], 'product', 'mn');
                $product->attachTag($tagObject);
            }
        }
        
        //Add Categories
        if(isset($data['categories']) && !empty($data['categories'])) {
            $product->productCategory()->sync($data['categories']);
        }
        
        //Add Attributes
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
                            $attributes_data[$index]['use_for_variation']    = (isset($attribute['use_for_variation'])) ? $attribute['use_for_variation'] : 0 ;
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
                            $attributes_data[$index]['use_for_variation']    = (isset($attribute['use_for_variation'])) ? $attribute['use_for_variation'] : 0 ;
                            $index++;
                        }
                    }
                }
            }
        }
        $product_attributes = $product->productAttributes()->createMany($attributes_data);
        
        //Add variations
        $variations = $product->productVariation()->createMany($data[$data['type']]);
        
        return $product;
    }


    public static function get_products($options = null) {
        $result = [];

        $result['draw'] = (isset($options['draw'])) ? $options['draw'] : 0;
        $query = Product::with([
            'media',
            'productCategory',
            'tags',
            'productAttributes'
        ]);

        //Нийт бичлэгийн тоог авч бна
        $result['recordsTotal'] = $query->count();

        //Search by Name and Tags
        if (isset($options['search_key']) && trim($options['search_key'])) {
            $query
            ->whereRaw('name like "%'.$options['search_key'].'%"')
            ->orWhereHas('tags', function($tags) use($options) {
                $tags->where(function($tag) use($options){
                    $tag->whereRaw('LOWER(name->>"$.mn") like "%'.mb_strtolower($options['search_key']).'%"');
                });
            });
        }
        //Filter by STATUS
        if (isset($options['status']) && trim($options['status'])) {
            if($options['status'] == 'trashed') {
                $query->onlyTrashed();
            }else {

            }
        }

        //Filter by CATEGORIES
        if (isset($options['categories']) && !empty($options['categories']) ) {
           
            $query->whereHas('productCategory', function($categories) use($options) {
                $categories->where(function($category) use($options){
                    $category->whereIn('product_categories.id', $options['categories']);
                });
            });
        }
        
        //Шүүлт хийсний дараах бичлэгийн тоог авч бна
        $result["recordsFiltered"] = $query->count();
        
        if(isset($options['start']) && isset($options['length']))
            $query->offset($options['start'])->limit($options['length']);
        

        $result['data'] = $query->orderby('created_at', 'DESC')->get()->toArray();
        $result['draw']++;
        return $result;
    }

    public static function get_product($id) {
        $result = [];
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
        ])->where('id', $id)->first();

        if($product) {
            $result = $product->toArray();
            $result['product_image'] =  $product->getMedia('product_image')[0]->getUrl();

            if(!empty($product->getMedia('product_gallery'))) {
                foreach($product->getMedia('product_gallery') as $gallery) {
                    $result['product_gallery'][] = $gallery->getUrl();
                }
            }
        }

        return ($result);
    }


    public static function boot() {
        parent::boot();

        static::deleting(function($product) { 
            $product->productAttributes()->delete();
            $product->productVariation()->delete();
        });
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->useLogName('product_log')
        ->logOnly(['name', 'user_id']);
    }

}
