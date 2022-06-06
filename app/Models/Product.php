<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Illuminate\Support\Facades\Storage;
use Spatie\Tags\Tag;
use Spatie\Tags\HasTags;
use App\Models\Media;


use App\Models\ProductCategory;

class Product extends Model
{
    use HasFactory, SoftDeletes, LogsActivity, HasTags;

    protected $casts = [
        'data'  =>  'array',
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s'
    ];
    protected $fillable = [
        'name',
        'sku',
        'slug',
        'status',
        'type',
        'regular_price',
        'sale_price',
        'stock_status',
        'stock_quantity',
        'data',
        'user_id'
    ];

    protected $appends = ['media', 'attributes'];

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
        return $this->hasMany(ProductVariation::class);
    }

    public function productMedia()
    {
        return $this->hasMany(MediaLookup::class,  'model_id', 'id')->where('model_type', self::class);
    }

    public function getMediaAttribute()
    {
        $media_lookup = MediaLookup::with('media')->where('model_type', self::class)->where('model_id', $this->id)->get();
        if($media_lookup->count() > 0) {
            $result = array();
            foreach($media_lookup as $media) {
                $result[$media['collection_name']][] = $media['media']['url'];
            }

            return $result;
        }
        return null;
    }

    public function getAttributesAttribute()
    {
        $result = null;
        $attrs = ProductAttributeValue::where('product_id', $this->id)->get();
        if($attrs->count() > 0) {
            foreach($attrs as $attr) {
                $result[$attr['attribute_name']][] = $attr['attribute_value'];
            }
        }
        return $result;
    }



    public function variationSummary()
    {
        return $this->hasMany(ProductVariation::class)
        ->addSelect('product_id',  \DB::raw("CONCAT( MIN(regular_price), '-', MAX(regular_price)) AS price"))
        ->addSelect('product_id',   \DB::raw("SUM(stock_quantity) AS qty"));
        //return $this->hasMany(ProductVariation::class);
    }

    function addMedia($file, $collection = 'beauty') {
        $media = Media::upload($file)->attachTo(self::class, $this->id, $collection);
        return $media;
    }

    public static function create_product($data) {
        
        //Prepare create a product
        $user = \Auth::user();
        $data['user_id'] = $user->id;
        //Creating product

        if($data['type'] == 'simple' && count($data['variations']) == 1) {
            $data = array_merge($data, $data['variations'][0]);
        }

        $product = Product::create($data);
        
        //Add featured image
        if(isset($data['featured_image']) && !empty($data['featured_image'])) {
            $product->addmedia($data['featured_image'], 'featured_image');
        }

        //Add gallery image
        if(isset($data['gallery_image']) && !empty($data['gallery_image'])) {
            foreach($data['gallery_image'] as $gallery) {
                $product->addmedia($gallery, 'gallery_image');
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
        

        if($data['type'] == 'variable') {
            //Add variations
            $variations = $product->productVariation()->createMany($data['variations']);
        }
        
        
        return $product;
    }


    public static function get_products($options = null) {
        $result = [];

        $result['draw'] = (isset($options['draw'])) ? $options['draw'] : 0;
        $query = Product::with([
            'productCategory',
            'tags',
            'productVariation'
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

    public static function get_product($slug) {
  
        $result = [];
        $product = Product::with([
            'tags',
            'productCategory',
            'productVariation'
        ])->where('slug', $slug)->first();

        if($product) {
            $result = $product->toArray();
   
        } else {
            throw new \Exception();
        }
        return $result;
    }


    public static function boot() {
        parent::boot();

        static::creating(function($product) {
            $slug = Str::slug($product->name);
            $count = static::where("slug", $slug)->count();
            $product->slug = $count ? "{$slug}-{$count}" : $slug;
        });

        static::deleting(function($product) { 
            $product->productAttributes()->delete();
            $product->productVariation()->delete();
            $product->productMedia()->delete();
        });
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->useLogName('product_log')
        ->logOnly(['name', 'user_id']);
    }

    public static function get_items_latest($request)
    {

        $query = Product::with([
            'productCategory',
            'tags',
            'productVariation'
        ]);

        return $query->orderBy('created_at', 'desc')->get();

    }

    public static function get_items_sales($request)
    {

        $query = Product::with([
            'media',
            'productCategory',
            'tags',

            'productVariation'
        ]);

        if($request->has('category'))
            $query->where('co.year',$request->get('year'));

        $query->orderBy('created_at', 'desc')
                ->whereNotNull('sale_price')
                ->get();

        $result = $query->get();
        // foreach($result as $q) {

        //     $q['product_image'] =  ( trim($q->getFirstMediaUrl('product_image')) ) ? $q->getMedia('product_image')[0]->getUrl() : null;
            
        // }

        return $result;

    }

}
