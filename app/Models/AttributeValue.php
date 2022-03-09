<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Attribute;
use App\Models\ProductVariation;

class AttributeValue extends Model
{
    use HasFactory;

    public function attribute()
    {
        return $this->belongsTo(Attribute::class, 'attribute_id', 'id');
    }


    public function variations()
    {
        return $this->belongsToMany(ProductVariation::class,'product_attribute_values_product_variation');
    }

}
