<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductAttributeValue;

class ProductAttribute extends Model
{
    use HasFactory;

    public function values() {
        return $this->hasMany(ProductAttributeValue::class);
    }
}
