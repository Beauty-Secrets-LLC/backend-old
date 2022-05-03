<?php

namespace App\Http\Livewire\Ebarimt;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Vat;

class ListTable extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $vats = Vat::paginate(30);

        return view('livewire.ebarimt.list-table', compact('vats'));
    }

    
}
