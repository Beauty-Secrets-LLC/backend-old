<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopOrder extends Model
{
    use HasFactory;

    protected $table = "orders";
    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s'
    ];

    public function customer() {
        return $this->belongsTo(Customer::class,'customer_id','id');
    }

    public function address() {
        return $this->belongsTo(CustomerAddress::class,'address_id','id');
    }

    public static function get_orders($options) {
        $result = [];

        $result['draw'] = (isset($options['draw'])) ? $options['draw'] : 0;
        
        $query = ShopOrder::with([
            'customer',
            'address' => function($address) {
                $address->select(
                    'id', 
                    'phone', 
                    'city', 
                    'district', 
                    'khoroo', 
                    'address',
                    \DB::raw('CONCAT(city,", ", district,", ",khoroo,", ",address) as full_address')
                );
            },
        ]);

        //Нийт бичлэгийн тоог авч бна
        $result['recordsTotal'] = $query->count();


        //Шүүлт хийсний дараах бичлэгийн тоог авч бна
        $result["recordsFiltered"] = $query->count();
        
        if(isset($options['start']) && isset($options['length']))
            $query->offset($options['start'])->limit($options['length']);
        

        $result['data'] = $query->orderby('created_at', 'DESC')->get()->toArray();
        $result['draw']++;
        return $result;
    }
}
