<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttributeValue extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'type',
        'attribute_id',
        'attribute_name',
        'attribute_value_id',
        'attribute_value'
    ];

}
