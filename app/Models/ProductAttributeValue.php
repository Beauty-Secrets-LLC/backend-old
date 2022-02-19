<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductAttribute;
use App\Models\ProductVariation;

class ProductAttributeValue extends Model
{
    use HasFactory;

    public function attribute()
    {
        return $this->belongsTo(ProductAttribute::class, 'product_attribute_id', 'id');
    }


    public function variations()
    {
        return $this->belongsToMany(ProductVariation::class,'product_attribute_values_product_variation');
    }

}
