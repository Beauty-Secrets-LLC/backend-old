<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

use App\Models\ShopOrder;
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
            $order = ShopOrder::create($request->all());
            ShopOrder::OrderNumberGenerator($order);
            $result['result']           = 'success';
            $result['message']          = 'Амжилттай';
            $result['data']             = $order;
            $result['data']['items']    = $order->items()->createMany($request['items']);
            $result['data']['invoice']  = $order->invoice()->create([
                'order_id'      => $order->id,
                'amount'        => $request['total'],
                'payment_id'    => $request['payment_id'],
                'expire_at'     => ShopOrderInvoice::generate_expire_date($order->created_at)
            ]);
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
}
