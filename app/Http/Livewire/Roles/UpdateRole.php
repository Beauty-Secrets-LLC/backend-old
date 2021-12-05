<?php

namespace App\Http\Livewire\Roles;

use Livewire\Component;

class UpdateRole extends Component
{
    public function setCustomer($id){
        $this->customer_id=$id;
        $customer = Customer::where('id',$this->customer_id)->first();                        
        $this->firstname=$customer->firstname;
        $this->lastname=$customer->lastname;
        $this->email=$customer->email;
        $this->phone=$customer->phone;            
        $this->address = isset($customer->data['address'])?$customer->data['address']:'';
        $this->resetValidation();
    }
    
    public function render()
    {
        return view('livewire.roles.update-role');
    }
}
