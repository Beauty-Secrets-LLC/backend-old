<?php

namespace App\Http\Livewire\Subscription;

use Livewire\Component;
use App\Models\CustomerAddress;

class Detail extends Component
{
    public $subscription;
    public $address;

    public function mount()
    {
        $this->address = config('address');
    }

    public function render()
    {
        return view('livewire.subscription.detail');
    }

    public function save() {
        $update = CustomerAddress::find($this->subscription['address_id'])->update([
            'phone'     =>$this->subscription['address']['phone'],
            'city'      =>$this->subscription['address']['city'],
            'district'  =>$this->subscription['address']['district'],
            'khoroo'    =>$this->subscription['address']['khoroo'],
            'address'   =>$this->subscription['address']['address']
        ]);
    }
}
