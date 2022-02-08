<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;

class AddAttributes extends Component
{
    public $attributes = [];
    public function render()
    {
        return view('livewire.product.add-attributes');
    }

    public function add() {
        $this->attributes = [1,2,3];
    }
}
