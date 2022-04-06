<?php

namespace App\Imports;

use App\Models\Subscription;
use Maatwebsite\Excel\Concerns\ToModel;

class SubscriptionImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Subscription([
            'customer_id'           => $row[0],
            'subscription_plan_id'  => $row[1],
            'card_id'               => $row[2],
            'card_subscribe_id'     => $row[3],
            'address_id'            => $row[4],
            'status'                => $row[5]
        ]);
    }
}
