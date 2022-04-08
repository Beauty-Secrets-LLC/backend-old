<?php

namespace App\Http\Livewire\Subscription;

use Livewire\Component;
use App\Models\CustomerAddress;

class DetailEditModal extends Component
{
    public $subscription;
    public $mn_address;
    public $phone;
    public $selected_city;
    public $selected_district = null;
    public $selected_khoroo = null;
    public $address = null;

    public function mount()
    {
        $this->phone                = $this->subscription['address']['phone'];
        $this->selected_city        = $this->subscription['address']['city'];
        $this->selected_district    = $this->subscription['address']['district'];
        $this->selected_khoroo      = $this->subscription['address']['khoroo'];
        $this->address              = $this->subscription['address']['address'];
        $this->mn_address = config('address');
    }

    public function render()
    {
        return view('livewire.subscription.detail-edit-modal');
    }

    public function save() {
        $this->subscription['address']['phone']    = $this->phone;
        $this->subscription['address']['city']     = $this->selected_city;
        $this->subscription['address']['district'] = $this->selected_district;
        $this->subscription['address']['khoroo']   = $this->selected_khoroo;
        $this->subscription['address']['address']  = $this->address;
        

        $update = CustomerAddress::find($this->subscription['address_id'])->update([
            'phone'     =>$this->phone,
            'city'      =>$this->selected_city,
            'district'  =>$this->selected_district,
            'khoroo'    =>$this->selected_khoroo,
            'address'   =>$this->address
        ]);

        $this->emit('details:update', $this->subscription);
    }
}
