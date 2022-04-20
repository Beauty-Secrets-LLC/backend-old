<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use Illuminate\Http\Request;
use App\Models\Attribute;
use App\Models\AttributeValue;
use Spatie\Activitylog\Models\Activity;
use App\Services\Qpay;


class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $user = \Auth::user();
        // $token = $user->createToken('bsecret')->plainTextToken;
        // dd($token);
        return view('dashboard');
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
     * @param  \App\Models\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function show(Dashboard $dashboard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function edit(Dashboard $dashboard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dashboard $dashboard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dashboard $dashboard)
    {
        //
    }


    public function test()
    {
        $qpay = new Qpay();

        $data = array(
            "sender_invoice_no"		=> 'Manal220421',
            "invoice_receiver_data" => array(
                "register"	=> '90911025',
                "name"		=> 'Manal',
                "email"		=> 'Manaltseren@gmail.com',
                "phone"		=> '90911025'
            ),
            "invoice_description"	=> 'test is here',
            "amount"				=> 20,
            "callback_url"			=> "https://beautysecrets.mn/wp-json/payment/v1/qpay-v2?payment_id=Manal220421"
        );


        $sda = $qpay->createInvoice($data);
        dump($sda);
    }

    public function activitylog() {
        
        return view('activity-log');
    }

    public function activitylog_listjson(Request $request) {
        $options = $request->all();
        $result = [];
        $result['draw'] = (isset($options['draw'])) ? $options['draw'] : 0;
        $query = Activity::select('*');
        $result['recordsTotal'] = $query->count();
        $result["recordsFiltered"] = $query->count();
        
        if(isset($options['start']) && isset($options['length']))
            $query->offset($options['start'])->limit($options['length']);
        

        $result['data'] = $query->orderby('created_at', 'DESC')->get()->toArray();

        return response()->json($result, 200, [], JSON_UNESCAPED_UNICODE);
    }
}
