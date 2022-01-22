<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\ProductCategory;

class Product extends Model
{
    use HasFactory;
    protected $casts = [
        'data'  =>  'array',
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
        'owner'
    ];

    public function productCategory()
    {
        return $this->belongsToMany(ProductCategory::class,'products_product_category');
    }

    public static function get_products($options = null) {
        $result = [];
        $result['draw'] = (isset($options['draw'])) ? $options['draw'] : 0;

        $query = Product::with('productCategory');
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
}
