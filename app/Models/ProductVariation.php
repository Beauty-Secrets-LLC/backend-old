<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AttributeValue;

class ProductVariation extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id','attributes', 'sku', 'stock_status', 'stock_quantity', 'regular_price', 'sale_price', 'data'
    ];

    protected $casts = [
        'attributes'    =>  'array',
        'data'          =>  'array'
    ];


}
