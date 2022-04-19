<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class ShopOrderinvoice extends Model
{
    use HasFactory;
    protected $table = "order_invoices";
    protected $casts = [
        'data'          => 'array',
        'created_at'    => 'datetime:Y-m-d H:i:s',
        'updated_at'    => 'datetime:Y-m-d H:i:s',
        'expire_at'     => 'datetime:Y-m-d H:i:s'
    ];

    protected $fillable = [
        'order_id',
        'amount',
        'payment_id',
        'status',
        'data',
        'expire_at'
    ];

    public static function generate_expire_date($date) {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->addDays(1);   
    }
}
