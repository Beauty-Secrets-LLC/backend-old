<?php

namespace App\Http\Livewire\Points;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\CustomerPoint;

class ListTable extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = [
        '$refresh',
        'points:search' => 'search'
    ];

    public $customer_points;
    public $search = '';

    public function mount() {

    }
    public function render()
    {
        $points = CustomerPoint::with('customer')->whereHas('customer', function($customer) {
            $customer->where('phone_primary', 'like', '%'.$this->search.'%')->orWhere('email', 'like', '%'.$this->search.'%');
        })->paginate(30);
        return view('livewire.points.list-table', compact('points'));
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }


}
