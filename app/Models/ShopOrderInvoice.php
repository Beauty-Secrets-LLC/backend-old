<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Models\Payment;

class ShopOrderInvoice extends Model
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

    const STATUS_UNPAID = 0;
    const STATUS_PAID = 1;
    const STATUS_EXPIRED = 2;

    public function invoice_order() {
        return $this->belongsTo(ShopOrder::class,'order_id','id');
    }

    public function payment_method() {
        return $this->hasOne(Payment::class,'id','payment_id');
    }

    public function vat() {
        return $this->hasOne(Vat::class,'subject_id','id')->where('subject_type', self::class);
    }

    public function makePaid() {
        $this->status = self::STATUS_PAID ;
        $this->save();

        //generate EBarimt
    }

    public static function generate_expire_date($date) {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->addDays(1);   
    }

    public function payment() {
        $order = $this->invoice_order()->with('customer')->first();
        $customer = $order->customer()->first();
        $payment_method = Payment::find($this->payment_id);
        $payment_class = $payment_method->class;
        if($payment_method->class == 'App\Services\Payments\Qpay') {
            $qpay = new $payment_class();
            $this->data = $qpay->createInvoice([
                "sender_invoice_no"		=> $order->order_number,
                "invoice_receiver_data" => array(
                    "register"	=> 'BEAUTYMEMBER'.$order->customer_phone,
                    "name"		=> $order->customer_name,
                    "email"		=> $order->customer_email,
                    "phone"		=> $order->customer_phone
                ),
                "invoice_description"	=> $order->order_number.' захиалгын төлбөр',
                "amount"				=> $order->total,
                "callback_url"			=> route('payment.webhook.qpay', ['payment_id' => $order->order_number])
            ]);

            $this->save();
            return [
                'id'            => $this->id,
                'redirect_url'  => '/dashboard/orders/view/'.$order->id,
            ];
        }
        return false;
    }
}
