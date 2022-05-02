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

    public function json(Request $request) {
        $data = CustomerPoint::get_points($request->all());
        return response()->json($data, 200, [], JSON_UNESCAPED_UNICODE);
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
    public function show(CustomerPoint $customerPoint)
    {
        //
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
