<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopOrder extends Model
{
    use HasFactory;

    protected $table = "orders";
    protected $casts = [
        'data'          => 'array',
        'created_at'    => 'datetime:Y-m-d H:i:s',
        'updated_at'    => 'datetime:Y-m-d H:i:s'
    ];

    protected $fillable = [
        'customer',
        'customer_email',
        'customer_phone',
        'address_id',
        'subtotal',
        'shipping_id',
        'total',
        'status',
        'data'
    ];

    public function customer() {
        return $this->belongsTo(Customer::class,'customer_id','id');
    }

    public function address() {
        return $this->belongsTo(CustomerAddress::class,'address_id','id');
    }
    public function items() {
        return $this->hasMany(ShopOrderItem::class,'order_id','id');
    }

    public function vat() {
        return $this->hasOne(Vat::class,'subject_id','id')->where('subject_type', self::class);
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

    public static function get_order($id) {
        $order = ShopOrder::with([
            'customer',
            'items'=> function($items) {
                $items->with([
                    'product',
                    'variation'
                ]);
            },
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
            'vat'
        ])->where('id', $id)->first();

        if($order) 
            return $order->toArray();
        
        else 
            return null;
    }

    public function create_order($data = null) {
        $data = [
            'customer' => 1,
            'customer_email' => 'manaltseren@gmail.com',
            'customer_phone' => '90911025',
            'address_id' => 1,
            'subtotal' => 50000,
            'shipping_id' => 1,
            'total' => 55000,
        ];

        $order = ShopOrder::create($data);
        return $order;
    }
}
