<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use Illuminate\Http\Request;
use App\Models\Attribute;
use App\Models\AttributeValue;
use Spatie\Activitylog\Models\Activity;


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
        // $classname = 'App\Services\Qpay';
        // $qpay = new $classname();

        // $data = array(
        //     "object_type" 	=> "INVOICE",
        //     "object_id" 	=> '9d18c167-e326-40ae-8276-88c7fb39fcfc',
        //     "offset" => [
        //         "page_number"=> 1,
        //         "page_limit" => 100
        //     ]
        // );


        // $sda = $qpay->checkInvoice($data);
        echo '<img src="data:image/png;base64, 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" alt="Red dot" />';
       
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
