<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mongolchat extends Model
{
    use HasFactory;

    public static function api_sub_header() {
        return [
            'Content-Type'      => 'application/json',
            'api-key'           => config('services.mchat_sub.key'),
            'app-secret'        => config('services.mchat_sub.secret')
        ];
    }
    public static function api_sub_url($endpoint = null) {
       
        if(!is_null($endpoint)) {
            return config('services.mchat_sub.source_url').$endpoint;
        }
        return null;
    }

}
