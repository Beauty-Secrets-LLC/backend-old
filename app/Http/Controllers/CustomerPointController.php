<?php

namespace App\Http\Controllers;

use App\Models\CustomerPoint;
use Illuminate\Http\Request;

class CustomerPointController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        return view('points.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CustomerPoint  $customerPoint
     * @return \Illuminate\Http\Response
     */
    public function show(CustomerPoint $customerPoint, $id)
    {
        //
        $customer_points = $customerPoint->find($id);
        return view('points.view', compact('customer_points'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CustomerPoint  $customerPoint
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomerPoint $customerPoint)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CustomerPoint  $customerPoint
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CustomerPoint $customerPoint)
    {
        //
        
        $point = CustomerPoint::find($request['id'])->adjust($request['points'], $request['description']);
        return response()->json(['result' => 'success', 'message'=> 'Хэрэглэгчийн оноог шинэчиллээ.'], 200, [], JSON_UNESCAPED_UNICODE);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CustomerPoint  $customerPoint
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomerPoint $customerPoint)
    {
        //
    }
}
