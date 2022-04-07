<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

use App\Models\Mongolchat;

class SubscriptionTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'type',
        'reference_number',
        'transaction_id',
        'amount',
        'subscription_plan_id',
        'card_subscribe_id',
        'card_id',
        'settlement'
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s'
    ];


    public function plan(){
        return $this->belongsTo(SubscriptionPlan::class, 'subscription_plan_id','subscribe_id');
    }

    public function subscription(){
        return $this->belongsTo(Subscription::class, 'card_subscribe_id','card_subscribe_id');
    }


    public static function get_list_api() {
        $response = Http::withHeaders(Mongolchat::api_sub_header())
        ->post( Mongolchat::api_sub_url('/api/transaction/list'), [
            'page' => 0,
            'pper' => 100
        ])->json();
        return $response;
    }

    public static function get_list_by_card_api($card_id = null) {
        if(!is_null($card_id )) {
            $response = Http::withHeaders(Mongolchat::api_sub_header())
            ->post( Mongolchat::api_sub_url('/api/transaction/card/list'), [
                'public_id' => $card_id
            ])->json();
            return $response;
        }
        return null;
    }

    public static function get_transactions($options) {
        $result = [];

        $result['draw'] = (isset($options['draw'])) ? $options['draw'] : 0;
        $query = SubscriptionTransaction::with([
            'plan',
            'subscription' => function($subscription) {
                $subscription->with([
                    'customer',
                    'address' => function($address) {
                        $address->select(
                            'id', 
                            'city', 
                            'district', 
                            'khoroo', 
                            'address',
                            \DB::raw('CONCAT(city,", ", district,", ",khoroo,", ",address) as full_address')
                        );
                    }
                ]);
            }
        ]);

        if (isset($options['date']) && trim($options['date'])) {
            $date_range = explode('-', $options['date']);
            $sdate = date("Y-m-d", strtotime($date_range[0]));
            $edate = date("Y-m-d", strtotime($date_range[1]));
        }
        else {
            $sdate = date('Y-m').'-01';
            $edate = date('Y-m-t');
        }

        $query->whereBetween('created_at', array($sdate . ' 00:00:00', $edate . ' 23:59:59'));

        //Нийт бичлэгийн тоог авч бна
        $result['recordsTotal'] = $query->count();

        if (isset($options['search_key']) && trim($options['search_key'])) {
            $query
            ->whereRaw('reference_number like "'.$options['search_key'].'%"')
            ->orWhereRaw('transaction_id like "'.$options['search_key'].'%"')
            ->orWhere('card_id', $options['search_key']);
            // ->orWhereHas('tags', function($tags) use($options) {
            //     $tags->where(function($tag) use($options){
            //         $tag->whereRaw('LOWER(name->>"$.mn") like "%'.mb_strtolower($options['search_key']).'%"');
            //     });
            // });
        }

        if (isset($options['plans']) && !empty($options['plans'])) {
            $query->whereIn('subscription_plan_id', $options['plans']);
        }

        if (isset($options['type']) && trim($options['type'])) {
            $query->where('type', $options['type']);
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
