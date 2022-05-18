<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;

class VariationDetail extends Component
{
    public $index = 0;
    public $variation;
    public function mount($variation) {
        $this->variation = $variation;
        if(!isset($variation['is_digital'])) {
            $this->variation['is_digital'] = false;
        }
    }
    public function render()
    {
        return view('livewire.product.variation-detail');
    }
}
