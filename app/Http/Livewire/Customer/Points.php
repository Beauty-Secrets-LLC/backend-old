<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\CustomerPoint;

class Points extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    public $customer;
    public $points;

    protected $listeners = ["customer:updatePoints" => 'update'];
    
    public function mount()
    {
        $points = CustomerPoint::where('customer_id', $this->customer['id'])->first();
        $this->points = ($points) ? $points->points : 0;
    }

    public function render()
    {
        $logs = [];
        $points = CustomerPoint::where('customer_id', $this->customer['id'])->first();
        if($points) {
            $logs = $points->log()->paginate(10);
        }
        return view('livewire.customer.points',compact('logs'));
    }

    public function update($points)
    {
        $this->points = $points;
    }
}
