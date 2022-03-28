<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class SubscriptionPlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'subscribe_id',
        'sub_type',
        'amount',
        'repeated_date',
        'sub_custom_name',
        'start_date',
        'subs_count',
    ];

    public static function get_list() {
        $result = self::get()->toArray();
        return $result;
    }


    public static function get_list_api() {
        $response = Http::withHeaders(Subscription::api_auth_header())
        ->post( Subscription::api_url('/api/application/subscribe/list'), [
            'page' => 0,
            'pper' => 100
        ])->json();
        return $response;
    }


    public static function sync() {
        $api_data = self::get_list_api();
        $synced = [];
        if(!empty($api_data['list'])) {
            foreach($api_data['list'] as $row) {
                if(SubscriptionPlan::where('subscribe_id', $row['subscribe_id'])->count() == 0) {
                    $synced[] = SubscriptionPlan::create($row);
                }
            }
        }
    }
}
