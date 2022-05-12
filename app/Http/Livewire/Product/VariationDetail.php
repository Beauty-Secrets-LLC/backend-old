<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;

class VariationDetail extends Component
{
    public $index = 0;
    public $digital = false;
    public function render()
    {
        return view('livewire.product.variation-detail');
    }
}
