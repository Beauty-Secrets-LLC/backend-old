<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

use App\Models\Mongolchat;

class CustomerCard extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'card_name',
        'public_id',
        'confirmed'
    ];


    protected $casts = [
        'created_at'    => 'datetime:Y-m-d H:i:s',
        'updated_at'    => 'datetime:Y-m-d H:i:s'
    ];

    public function get_transactions_api() {
        $response = Http::withHeaders(Mongolchat::api_sub_header())
        ->post( Mongolchat::api_sub_url('/api/transaction/card/list'), [
            'public_id' => $this->public_id,
        ])->json();

        return $response;
    }
}
