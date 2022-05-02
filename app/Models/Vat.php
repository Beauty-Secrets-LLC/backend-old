<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

use App\Models\ShopOrderInvoice;
use App\Services\EBarimt;

class Vat extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject_type',
        'subject_id',
        'type',
        'register_number',
        'billId',
        'qrData',
        'created_at'
    ];

    protected $casts = [
        'created_at'    => 'datetime:Y-m-d H:i:s',
        'updated_at'    => 'datetime:Y-m-d H:i:s'
    ];


    
    public static function createFromShopOrderInvoice($invoice) {
        if($invoice) {
            //check if invoice's ebarimt exist
            if (!Vat::where('subject_type', 'App\Models\ShopOrderInvoice')->where('subject_id', $invoice->id)->exists()) {
                $order = $invoice->invoice_order()->first();
                $order_items = $order->items()->get();
                $data = [
                    "amount"        => $order->total.".00",
                    "vat"           => number_format($order->total/11,2,'.',''),
                    "cashAmount"    => "0.00",
                    "nonCashAmount" => $order->total.".00",
                    "cityTax"       => "0.00",
                    "districtCode"  => "25",
                    "posNo"         => "0001",
                    "billIdSuffix"  => "",
                    "returnBillId"  => "",
                    "stocks"        => []
                ];
                
                if(!empty($order_items)) {
                    foreach($order_items as $item_index => $item) {
                        $product = $item->product()->first();
                        $data['stocks'][$item_index] = [
                            "code"          => (string)$product->id,
                            "name"          => $product->name,
                            "measureUnit"   => "ш",
                            "qty"           => $item->quantity.".00",
                            "unitPrice"     => $item->subtotal.".00",
                            "totalAmount"   => $item->total.".00",
                            "cityTax"       => "0.00",
                            "vat"           => number_format($item->total/11,2,'.','')
                        ];
                    }
                }

                $billType = (isset($invoice->data['billType'])) ? $invoice->data['billType'] : "1";
                $data['billType'] = $billType;
                if($billType != "1") {
                    $data['customerNo'] = (isset($invoice->data['customerNo'])) ?  (string)$invoice->data['customerNo'] : "";
                }
                
                $ebarimt = new EBarimt();
                $ebarimt_data = $ebarimt->put($data);
                $invoice->vat()->create([
                    'subject_type'      => 'App\Models\ShopOrderInvoice',
                    'subject_id'        => $invoice->id,
                    'type'              => $billType,
                    'register_number'   => null,
                    'billId'            => $ebarimt_data['billId'],
                    'qrData'            => $ebarimt_data['qrData'],
                    'created_at'        => $ebarimt_data['date'],
                ]);
            }
        }
        
    }
}
