<?php

namespace App\Observers;

use App\Models\ShopOrder;

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
