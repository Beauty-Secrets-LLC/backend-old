<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

use App\Models\Mongolchat;

class SubscriptionTransaction extends Model
{
    use HasFactory;


    public static function get_list_api() {
        $response = Http::withHeaders(Mongolchat::api_sub_header())
        ->post( Mongolchat::api_sub_url('/api/transaction/list'), [
            'page' => 0,
            'pper' => 100
        ])->json();
        return $response;
    }
}
