<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QpayController extends Controller
{
    public function webhook(Request $request)
    {
        if(isset($request['payment_id'])) {
            activity()->useLog('qpay')->event('paid')->log($request['payment_id']);
        }
    }
}
