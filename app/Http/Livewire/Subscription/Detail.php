<?php

namespace App\Http\Livewire\Subscription;

use Livewire\Component;

class Detail extends Component
{
    public $subscription;

    protected $listeners = ['subscription:updateDetail' => 'update'];

    public function render()
    {
        return view('livewire.subscription.detail');
    }

    function update($updated_subscription) {
        $this->subscription = $updated_subscription;
    }

    
}
