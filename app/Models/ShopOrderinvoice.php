<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Models\Payment;

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
        'customer_id',
        'order_id',
        'amount',
        'payment_id',
        'status',
        'data',
        'expire_at'
    ];

    public function invoice_order() {
        return $this->belongsTo(ShopOrder::class,'order_id','id');
    }

    public function payment_method() {
        return $this->hasOne(Payment::class,'id','payment_id');
    }

    public function paid() {
        return 'paid';
    }

    public static function generate_expire_date($date) {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->addDays(1);   
    }

    public function payment() {
        $order = $this->invoice_order()->with('customer')->first();
        $customer = $order->customer()->first();
        $payment_method = Payment::find($this->payment_id);
        $payment_class = $payment_method->class;
        if($payment_method->class == 'App\Services\Qpay') {
            $qpay = new $payment_class();
            $this->data = $qpay->createInvoice([
                "sender_invoice_no"		=> $order->order_number,
                "invoice_receiver_data" => array(
                    "register"	=> 'BEAUTYMEMBER'.$customer->id,
                    "name"		=> $customer->name,
                    "email"		=> $customer->email,
                    "phone"		=> $customer->phone_primary
                ),
                "invoice_description"	=> $order->order_number.' захиалгын төлбөр',
                "amount"				=> $order->total,
                "callback_url"			=> route('payment.webhook.qpay', ['payment_id' => $order->order_number])
            ]);

            $this->save();
            return [
                'id'            => $this->id,
                'redirect_url'  => 'invoice/'.$this->id,
            ];
        }
        return false;
    }
}
