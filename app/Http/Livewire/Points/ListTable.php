<?php

namespace App\Http\Livewire\Points;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\CustomerPoint;

class ListTable extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $customer_points;

    public function mount() {

    }
    public function render()
    {
        $points = CustomerPoint::with('customer')->paginate(40);
        return view('livewire.points.list-table', compact('points'));
    }
}
