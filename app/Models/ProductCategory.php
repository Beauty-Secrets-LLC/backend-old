<?php

namespace App\Models;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;



class ProductCategory extends Model
{
    use HasFactory;
    use NodeTrait;

    protected $fillable = ['name'];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'products_product_category');
    }

}