<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

use App\Models\Mongolchat;

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

    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;

    public static function get_list() {
        $result = self::get()->toArray();
        return $result;
    }


    public static function get_list_api() {
        $response = Http::withHeaders(Mongolchat::api_sub_header())
        ->post( Mongolchat::api_sub_url('/api/application/subscribe/list'), [
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

        return $synced;
    }
}
