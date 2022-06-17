<?php

namespace App\Observers;

use App\Models\ShopOrderInvoice;
use App\Models\ShopOrder;
use App\Models\Vat;

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
        $order = ShopOrder::find($shopOrderInvoice->order_id);
        // Change order status
        if($shopOrderInvoice->status == ShopOrderInvoice::STATUS_PAID){
            $order->status = ShopOrder::STATUS_PROCESSING;

            //create an Ebarimt
            //Vat::createFromShopOrderInvoice($shopOrderInvoice);
        }
        elseif($shopOrderInvoice->status == ShopOrderInvoice::STATUS_EXPIRED) {
            $order->status = ShopOrder::STATUS_CANCELLED;
        }
        $order->save();
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
