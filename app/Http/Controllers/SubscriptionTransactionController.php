<?php

namespace App\Http\Controllers;

use App\Models\SubscriptionTransaction;
use App\Models\SubscriptionPlan;
use Illuminate\Http\Request;
use App\Imports\SubscriptionTransactionImport;
use Maatwebsite\Excel\Facades\Excel;

use App\Models\CustomerCard;

class SubscriptionTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $plans = SubscriptionPlan::where('status', SubscriptionPlan::STATUS_ACTIVE)->pluck('name', 'subscribe_id')->toArray();
        return view('subscriptions.transactions.list', compact('plans'));
    }

    public function json(Request $request)
    {
        //
        $data = SubscriptionTransaction::get_transactions($request->all());
        return $data;
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
     * @param  \App\Models\SubscriptionTransaction  $subscriptionTransaction
     * @return \Illuminate\Http\Response
     */
    public function show(SubscriptionTransaction $subscriptionTransaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubscriptionTransaction  $subscriptionTransaction
     * @return \Illuminate\Http\Response
     */
    public function edit(SubscriptionTransaction $subscriptionTransaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubscriptionTransaction  $subscriptionTransaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubscriptionTransaction $subscriptionTransaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubscriptionTransaction  $subscriptionTransaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubscriptionTransaction $subscriptionTransaction)
    {
        //
    }

    public function import() {
        return view('subscriptions.transactions.import');
    }

    public function importdata(Request $request) {

        Excel::import(new SubscriptionTransactionImport, $request->file('transaction_file'));
        return redirect('/')->with('success', 'All good!');

       
    }
}
