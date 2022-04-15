<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;

class Detail extends Component
{
    public $customer;
    public $selected_address;

    
    protected $listeners = ["customer:updateDetail" => 'update'];

    public function mount()
    {
        // $this->selected_address = [
        //     'city' => $customer['a'],
        //     'district' => ,
        //     'khoroo' => 
        // ];

        // if(!empty($customer['addresses'])) {
        //     foreach($customer['addresses'] as $index => $address) {

        //     }
        // }
    }

    public function render()
    {
        return view('livewire.customer.detail');
    }

    public function update($customer) {
        $this->customer = $customer;
    }
}
