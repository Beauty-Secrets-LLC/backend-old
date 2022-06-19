<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShopOrder;

class OrderController extends Controller
{
    public function list(Request $request)
    {

        try {

            $orders = ShopOrder::with('customer')->where('customer_phone', auth()->user()->phone_primary)->get();

            return response()->json([
                'success' => true,
                'data' => $orders
            ], 200, [], JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
            
        } catch (\Exception $e) {

            return response()->json([
                'success'=>false,
                'message'=>$e->getMessage()
            ], 400, [], JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
            
        }

    }

    public function getAddress(Request $request)
    {

        try {

            $addresses = config('address');
            
            if($request->has('city')) {

                if($request->has('city') && $request->has('code')) {

                    // Хороо, баг
                    $khoroo_arr = [];
                    $collection = collect($addresses);
                    $keyed = $collection->keyBy('code');
                    $khoroos = $keyed[$request->get('city')]['sub'];

                    $collection2 = collect($khoroos);
                    $keyed2 = $collection2->keyBy('code');

                    foreach($keyed2[$request->get('code')]['sub'] as $sum) {
                        $arr = [
                            'value' => $sum['name'],
                            'label' => $sum['name'],
                            'code' => $sum['code'],
                        ];
                        array_push($khoroo_arr, $arr);
                    }

                    return response()->json($khoroo_arr, 200, [], JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);

                } else {

                    // Дүүрэг, сум
                    $duureg_arr = [];
                    $collection = collect($addresses);
                    $keyed = $collection->keyBy('code');

                    foreach($keyed[$request->get('city')]['sub'] as $duureg) {
                        $arr = [
                            'value' => $duureg['name'],
                            'label' => $duureg['name'],
                            'code' => $duureg['code'],
                            'isLeaf' => false
                        ];
                        array_push($duureg_arr, $arr);
                    }

                    return response()->json($duureg_arr, 200, [], JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);

                }
            
            } else {

                // Хот, аймаг
                $city = [];
                foreach($addresses as $address) {
                    $arr = [
                        'value' => $address['name'],
                        'label' => $address['name'],
                        'code' => $address['code'],
                        'isLeaf' => false
                    ];
                    array_push($city, $arr);
                }

                return response()->json($city, 200, [], JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
            }
            
        } catch (\Exception $e) {

            return response()->json([
                'success'=>false,
                'message'=>$e->getMessage()
            ], 400, [], JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
            
        }

    }

}
