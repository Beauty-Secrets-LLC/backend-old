<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShopOrder;
use App\Services\Payments\Qpay;

class QpayController extends Controller
{
    public function webhook(Request $request)
    {
        if(isset($request['payment_id'])) {
            //activity()->useLog('qpay')->event('paid')->log($request['payment_id']);
            $order = ShopOrder::where('order_number', $request['payment_id'])->first();
            if($order) {
                //Төлбөр төлөгдсөн эсэхийг дахин баталгаажуулж байна.
                $invoice = $order->invoice();
                $qpay_class = new Qpay();
                $data = array(
                    "object_type" 	=> "INVOICE",
                    "object_id" 	=> $invoice->data['invoice_id'],
                    "offset" => [
                        "page_number"=> 1,
                        "page_limit" => 100
                    ]
                );
                $result = $qpay_class->checkInvoice($data);
                
                if($result['count'] > 0 && $result['rows'][0]['payment_status'] == 'PAID' ) {
                    activity()->useLog('qpay')->event('paid')->log($request['payment_id']);
                    $order->invoice()->processing();
                } else {
                    activity()->useLog('qpay')->event('unpaid')->log($request['payment_id']);
                    return response()->json(['result' => 'success', 'message' => 'Төлбөр төлөгдөөгүй байна']);
                }    
            }

           
            
           
        }
    }
}
