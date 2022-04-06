<?php

namespace App\Imports;

use App\Models\SubscriptionTransaction;
use Maatwebsite\Excel\Concerns\ToModel;

class SubscriptionTransactionImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new SubscriptionTransaction([
            'customer_id'           => $row[0],
            'type'                  => $row[1],
            'reference_number'      => $row[2],
            'transaction_id'        => $row[3],
            'amount'                => $row[4],
            'subscription_plan_id'  => $row[5],
            'card_subscribe_id'     => $row[6],
            'card_id'               => $row[7],
            'settlement'            => $row[8]
        ]);
    }
}
