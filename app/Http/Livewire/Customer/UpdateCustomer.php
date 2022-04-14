<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;
use App\Models\Customer;

class UpdateCustomer extends Component
{
    public $customer;
    public function mount($customer){
    }
    public function render()
    {
        return view('livewire.customer.update-customer');
    }

    public function save() {
        $customer = Customer::find($this->customer['id'])->update([
            'name'          => $this->customer['name'],
            'email'         => $this->customer['email'],
            'phone_primary' => $this->customer['phone_primary'],
            'data'          => $this->customer['data']
        ]);

        session()->flash('attribute-save-message', 'Хэрэглэгчийн мэдээллийг шинэчиллээ.');
    }
}
