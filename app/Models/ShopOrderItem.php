<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopOrderItem extends Model
{
    use HasFactory;
    protected $table = "order_items";

    public function product() {
        return $this->hasOne(Product::class,'id','product_id');
    }
    public function variation() {
        return $this->hasOne(ProductVariation::class, 'id', 'variation_id');
    }
}
