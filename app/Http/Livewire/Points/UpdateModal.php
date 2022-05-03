<?php

namespace App\Http\Livewire\Points;

use Livewire\Component;
use App\Models\CustomerPoint;

class UpdateModal extends Component
{
    public $customer_points;
    public $description;
    public $listeners = [
        'points:setPoints'=>'setPoints',
    ];

    public function render()
    {
        return view('livewire.points.update-modal');
    }

    public function setPoints($id) {
        
        $this->customer_points = CustomerPoint::with('customer')->find($id)->toArray();
        $this->description = '';
    }

    public function save() {
        
        CustomerPoint::find($this->customer_points['id'])->adjust($this->customer_points['points'], $this->description);
        $this->emitTo('points.list-table', '$refresh');
        $this->emit('component-modal-close','points_update'); 
    }

    public function close(){      
        $this->emit('component-modal-close','points_update');  
    }
}
