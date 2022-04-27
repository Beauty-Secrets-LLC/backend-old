<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShopOrder;

class QpayController extends Controller
{
    public function webhook(Request $request)
    {
        if(isset($request['payment_id'])) {

            activity()->useLog('qpay')->event('paid')->log($request['payment_id']);
            $order = ShopOrder::where('order_number', $request['payment_id'])->first();

            if($order) {
                $order->invoice()->paid();
            }

        }
    }
}
