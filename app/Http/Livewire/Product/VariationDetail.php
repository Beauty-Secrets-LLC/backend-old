<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;

class VariationDetail extends Component
{
    public $index = 0;
    public $digital;
    public $variation;
    public function mount($variation) {
        $this->variation = $variation;
        $this->digital = (empty($variation)) ? false : $variation['is_digital'];
    }
    public function render()
    {
        return view('livewire.product.variation-detail');
    }
}
