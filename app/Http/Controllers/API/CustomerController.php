<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CustomerAddress;

class CustomerController extends Controller
{
    public function addresses(Request $request)
    {

        try {

            $auth = auth()->user();
            $addresses = CustomerAddress::where('customer_id', $auth->id)->get();

            return response()->json([
                'success' => true,
                'data' => $addresses
            ], 200, [], JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
            
        } catch (\Exception $e) {

            return response()->json([
                'success'=>false,
                'message'=>$e->getMessage()
            ], 400, [], JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
            
        }

    }
}
