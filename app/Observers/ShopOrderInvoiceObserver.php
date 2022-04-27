<?php

namespace App\Observers;

use App\Models\ShopOrderInvoice;
use App\Models\ShopOrder;

class ShopOrderInvoiceObserver
{
    /**
     * Handle the ShopOrderInvoice "created" event.
     *
     * @param  \App\Models\ShopOrderInvoice  $shopOrderInvoice
     * @return void
     */
    public function created(ShopOrderInvoice $shopOrderInvoice)
    {
        //
    }

    public function updating(ShopOrderInvoice $shopOrderInvoice)
    {
        // Change order status
        if($shopOrderInvoice->status == ShopOrderInvoice::STATUS_PAID){
            ShopOrder::find($shopOrderInvoice->order_id)->update(['status' => ShopOrder::STATUS_PROCESSING]);
        }
        elseif($shopOrderInvoice->status == ShopOrderInvoice::STATUS_PAID) {
            ShopOrder::find($shopOrderInvoice->order_id)->update(['status' => ShopOrder::STATUS_CANCELLED]);
        }
    }


    /**
     * Handle the ShopOrderInvoice "updated" event.
     *
     * @param  \App\Models\ShopOrderInvoice  $shopOrderInvoice
     * @return void
     */
    public function updated(ShopOrderInvoice $shopOrderInvoice)
    {
        //
    }

    /**
     * Handle the ShopOrderInvoice "deleted" event.
     *
     * @param  \App\Models\ShopOrderInvoice  $shopOrderInvoice
     * @return void
     */
    public function deleted(ShopOrderInvoice $shopOrderInvoice)
    {
        //
    }

    /**
     * Handle the ShopOrderInvoice "restored" event.
     *
     * @param  \App\Models\ShopOrderInvoice  $shopOrderInvoice
     * @return void
     */
    public function restored(ShopOrderInvoice $shopOrderInvoice)
    {
        //
    }

    /**
     * Handle the ShopOrderInvoice "force deleted" event.
     *
     * @param  \App\Models\ShopOrderInvoice  $shopOrderInvoice
     * @return void
     */
    public function forceDeleted(ShopOrderInvoice $shopOrderInvoice)
    {
        //
    }
}
