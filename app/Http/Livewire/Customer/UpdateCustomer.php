<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;
use App\Models\Customer;
use App\Models\CustomerAddress;

class UpdateCustomer extends Component
{
    public $customer;
    public $mn_address;
    public function mount($customer){
        $this->mn_address = config('address');
    }
    public function render()
    {
        return view('livewire.customer.update-customer');
    }

    public function save() {
        $customer = Customer::find($this->customer['id']);

        $update_general = $customer->update([
            'name'          => $this->customer['name'],
            'email'         => $this->customer['email'],
            'phone_primary' => $this->customer['phone_primary'],
            'data'          => $this->customer['data']
        ]);

        if(!empty($this->customer['addresses'])) {
            foreach($this->customer['addresses'] as $address) {
                CustomerAddress::where('id', $address['id'])->update([
                    'address_name'  => $address['address_name'],
                    'phone'         => $address['phone'],
                    'city'          => $address['city'],
                    'district'      => $address['district'],
                    'khoroo'        => $address['khoroo'],
                    'address'       => $address['address']
                ]);
            }
        }

        $this->emit('customer:updateDetail', $this->customer);

        session()->flash('attribute-save-message', 'Хэрэглэгчийн мэдээллийг шинэчиллээ.');
    }
}
