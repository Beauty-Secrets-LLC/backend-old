<?php

namespace App\Http\Livewire\Subscription;

use Livewire\Component;

class Detail extends Component
{
    public $subscription;

    protected $listeners = ['details:update' => 'update'];

    public function render()
    {
        return view('livewire.subscription.detail');
    }

    function update($updated_subscription) {
        $this->subscription = $updated_subscription;
    }

    
}
