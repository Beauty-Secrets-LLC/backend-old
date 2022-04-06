<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'subscription_plan_id',
        'card_id',
        'card_subscribe_id',
        'address_id',
        'status'
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s'
    ];


    public function customer() {
        return $this->belongsTo(Customer::class,'customer_id','id');
    }

    public function plan() {
        return $this->belongsTo(SubscriptionPLan::class, 'subscription_plan_id', 'subscribe_id');
    }

    public function address() {
        return $this->belongsTo(CustomerAddress::class,'address_id','id');
    }

    public static function get_subscriptions($options) {
        $result = [];

        $result['draw'] = (isset($options['draw'])) ? $options['draw'] : 0;
        $query = Subscription::with([
            'customer',
            'plan',
        ]);


        //Нийт бичлэгийн тоог авч бна
        $result['recordsTotal'] = $query->count();

        if (isset($options['search_key']) && trim($options['search_key'])) {
            $query
            // ->whereRaw('reference_number like "'.$options['search_key'].'%"')
            // ->orWhereRaw('transaction_id like "'.$options['search_key'].'%"')
            ->orWhere('card_id', $options['search_key'])
            ->orWhereHas('customer', function($customer) use($options) {
                $customer->whereRaw('email like "%'.$options['search_key'].'%"');
            });;

        }

  

        //Шүүлт хийсний дараах бичлэгийн тоог авч бна
        $result["recordsFiltered"] = $query->count();
        
        if(isset($options['start']) && isset($options['length']))
            $query->offset($options['start'])->limit($options['length']);
        

        $result['data'] = $query->orderby('created_at', 'DESC')->get()->toArray();
        $result['draw']++;
        return $result;
    }

    

}
