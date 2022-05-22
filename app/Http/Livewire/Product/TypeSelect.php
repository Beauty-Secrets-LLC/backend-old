<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;

class TypeSelect extends Component
{
    public $product;
    public $product_type;
    public $attributes;
    
    public $listeners = [
        "type-select:setAttribute" => 'setAttribute'
    ];

    public function mount($product) {
        $this->product = $product;
        $this->product_type = (is_null($product)) ? 'simple' : $product['type'];
    }

    public function render()
    {
        return view('livewire.product.type-select');
    }
    public function setAttribute($variationAttr)
    {
        $this->attributes = $variationAttr;
        $this->emit('add-variations:set_available_attributes', $variationAttr);
    }

    public function change($type) {
        $this->emit('add-attribute:loadVariationAttributes');
    }

}
