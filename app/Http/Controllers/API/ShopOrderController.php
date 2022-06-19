<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

use App\Models\ShopOrder;
use App\Models\Coupon;
use App\Models\ShopOrderInvoice;

class ShopOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $orders = ShopOrder::get_orders($request->all());
        return response()->json($orders, 200, [], JSON_UNESCAPED_UNICODE);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $result = [];
        DB::beginTransaction();
        try {
            //Creating order
            $order = ShopOrder::create($request->all());
            //Order number generating
            $order->order_number = ShopOrder::OrderNumberGenerator($order);
            //Save order number
            $order->save();
            //Creating order items
            $order->items()->createMany($request['items']);
            //Creating invoice
            $invoice = $order->invoice()->create([
                'order_id'      => $order->id,
                'amount'        => $request['total'],
                'payment_id'    => $request['payment_id'],
                'expire_at'     => ShopOrderInvoice::generate_expire_date($order->created_at)
            ])->payment();

            //Build return values
            $result['result']           = 'success';
            $result['message']          = 'Амжилттай';
            $result['data']             = [
                'id'            => $order->id , 
                'order_number'  => $order->order_number,
                'invoice'       => $invoice
            ];
            DB::commit();

        } catch (\Exception $e) {
            $result['result']           = 'failed';
            $result['message']          = $e->getMessage();
            DB::rollback();
        }

        return response()->json($result, 200, [], JSON_UNESCAPED_UNICODE);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $order = ShopOrder::get_order($id);
        return response()->json($order, 200, [], JSON_UNESCAPED_UNICODE);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function calculate_total(Request $request) {
       
        $result = [];
        if(!empty($request->get('coupon'))) {
            $coupon = Coupon::select('type', 'amount', 'expire_at', 'data')->where('code', $request->get('coupon'))->first();
            if($coupon) {
                if($coupon->type == 'percentage') {
                    $amount = ($coupon->amount / 100 * $request->get('subtotal')) * -1;
                }
                elseif($coupon->type == 'fixed') {
                    $amount = $coupon->amount * -1;
                }
                $result['discounts'][] = [
                    'type'      => 'coupon',
                    'result'    => true,
                    'message'   => 'Купон: '.$request->get('coupon'),
                    'amount'    => $amount,
                    'data'      => $coupon->toArray()
                ];
            }
            else {
                $result['discounts'][] = [
                    'type'      => 'coupon',
                    'result'    => false,
                    'amount'    => 0,
                    'message'   => $request->get('coupon').' кодтой купон бүртгэлгүй'
                ];
            }
        }

        if(!empty($request->get('has_giftbox'))) {
            $result['fees'][] = [
                'type'      => 'custom',
                'result'    => true,
                'message'   => 'Бэлгийн хайрцагтай',
                'amount'   => 5000
            ];
        }

        return $result;
    }


    public function get_deliveries(Request $request) {

        if($request->get('city') == "Улаанбаатар") {
            return 'Улаанбаатар хот';
        }
        return $request->all();
    }
}
