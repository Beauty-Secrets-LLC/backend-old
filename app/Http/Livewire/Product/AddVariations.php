<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;

class AddVariations extends Component
{

    public $listeners = [
        "new-product:setVariation" => 'setVariation',
    ];

    public $attributes = [];
    public $variations = [];

    public function render()
    {
        return view('livewire.product.add-variations');
    }

    public function setVariation($attr) {
        $this->attributes = $attr;
    }

    public function add() {
        $this->variations[] = [];
    }
}
