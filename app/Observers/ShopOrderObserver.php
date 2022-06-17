<?php

namespace App\Observers;

use App\Models\ShopOrder;
use App\Models\Customer;
use App\Jobs\SendEmailJob;

class ShopOrderObserver
{
    /**
     * Handle the ShopOrder "created" event.
     *
     * @param  \App\Models\ShopOrder  $shopOrder
     * @return void
     */
    public function created(ShopOrder $shopOrder)
    {
        //
    }

    public function updating(ShopOrder $shopOrder)
    {
        if(!empty($shopOrder->customer_email)) {
            $template = '';
            if($shopOrder->status == ShopOrder::STATUS_ONHOLD){
                $template = 'App\Mail\ShopOrderReceived';
            }
            if($shopOrder->status == ShopOrder::STATUS_PROCESSING){
                $template = 'App\Mail\ShopOrderProcessing';
            }
            if($shopOrder->status == ShopOrder::STATUS_COMPLETED){
                $template = 'order-completed';
            }
            if($shopOrder->status == ShopOrder::STATUS_CANCELLED){
                $template = 'order-cancelled';
            }

            dispatch(new SendEmailJob([
                'to' => $shopOrder->customer_email,
                'template' => $template,
                'data' => $shopOrder->toArray()
            ]));
        }
        
       
    }



    /**
     * Handle the ShopOrder "updated" event.
     *
     * @param  \App\Models\ShopOrder  $shopOrder
     * @return void
     */
    public function updated(ShopOrder $shopOrder)
    {
        //
    }

    /**
     * Handle the ShopOrder "deleted" event.
     *
     * @param  \App\Models\ShopOrder  $shopOrder
     * @return void
     */
    public function deleted(ShopOrder $shopOrder)
    {
        //
    }

    /**
     * Handle the ShopOrder "restored" event.
     *
     * @param  \App\Models\ShopOrder  $shopOrder
     * @return void
     */
    public function restored(ShopOrder $shopOrder)
    {
        //
    }

    /**
     * Handle the ShopOrder "force deleted" event.
     *
     * @param  \App\Models\ShopOrder  $shopOrder
     * @return void
     */
    public function forceDeleted(ShopOrder $shopOrder)
    {
        //
    }
}
