<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;
use App\Models\Product;

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

         //set default attributes for stored attributes
         if(!empty($this->variations)) {
            foreach($this->variations as $variation_key => $variation) {
                if(!empty($this->attributes)) {
                    foreach($this->attributes as $attributes) {
                        if(!isset($variation['attributes'][$attributes['name']])) {
                            $this->variations[$variation_key]['attributes'][$attributes['name']] = 'any';
                        }
                    }
                }
            }
        }
        
    }

    public function add() {

        //set default attributes for new variation
        $default_attr = [];
        if(!empty($this->attributes)) {
            foreach($this->attributes as $attributes) {
                $default_attr[$attributes['name']] = 'any';
            }
        }
        $this->variations[] = ['attributes' => $default_attr];
        
       
        
    }

    public function remove($index) {
        unset($this->variations[$index]);
        $this->variations = array_values($this->variations);
    }
}
