<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;

class TypeSelect extends Component
{
    public $product;
    public $product_type;
    public $variations = [];
    
    public $listeners = [
        "type-select:setVariation" => 'setVariation'
    ];

    public function mount($product) {
        $this->product_type = 'simple';
        $this->type = $product;
    }

    public function render()
    {
        return view('livewire.product.type-select');
    }
    public function setVariation($variationAttr)
    {
        $this->variations = $variationAttr;
    }
}
