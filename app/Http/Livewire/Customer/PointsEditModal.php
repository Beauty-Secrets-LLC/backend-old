<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;
use App\Models\Customer;
use App\Models\CustomerPoint;

class PointsEditModal extends Component
{
    public $customer;
    public $current_points;
    public $description;
    public function mount() {
        $points = CustomerPoint::where('customer_id', $this->customer['id'])->first();
        $this->current_points = ($points) ? $points->points : 0;
    }
    public function render()
    {
        return view('livewire.customer.points-edit-modal');
    }

    public function save() {
        $point = CustomerPoint::where('customer_id', $this->customer['id'])->first();
        if($point) {
            $point->adjust($this->current_points, $this->description);
            $this->emit('customer:updatePoints', $this->current_points);
            session()->flash('update-points-success-message', 'Хэрэглэгчийн оноог шинэчиллээ.');
        }
        else {
            session()->flash('update-points-failed-message', 'Алдаа гарлаа');
        }
       

        
    }
}
