<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    public function customer() {
        return $this->belongsTo(Customer::class,'customer_id','id');
    }

    public function address() {
        return $this->belongsTo(CustomerAddress::class,'address_id','id');
    }

    public static function api_auth_header() {
        return [
            'Content-Type'      => 'application/json',
            'api-key'           => config('services.mchat_sub.key'),
            'app-secret'        => config('services.mchat_sub.secret')
        ];
    }
    public static function api_url($endpoint = null) {
       
        if(!is_null($endpoint)) {
            return config('services.mchat_sub.source_url').$endpoint;
        }
        return null;
    }

}
