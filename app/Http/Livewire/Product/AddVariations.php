<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;
use App\Models\Product;

class AddVariations extends Component
{

    public $listeners = [
        '$refresh',
        "add-variations:setVariation" => 'setVariation',
        "edit-product:setVariation" => 'setVariation',
    ];
    public $stored_variations;
    public $attributes = [];
    public $variations = [];
    

    public function mount($stored_variations, $attributes){
        //set stored variations on edit page
        if(!empty($stored_variations)) {
            $variations = [];
            foreach($stored_variations as $variation_index => $variation) {
                $variations[$variation_index] = [
                    'attributes'        => $variation['attributes'],
                    'is_digital'        => null,
                    'is_preorder'       => null,
                    'sku'               => $variation['sku'],
                    'regular_price'     => $variation['regular_price'],
                    'sale_price'        => $variation['sale_price'],
                    'stock_quantity'    => $variation['stock_quantity'],
                    'backorder'         => null,
                    'width'             => $variation['data']['width'],
                    'height'            => $variation['data']['height'],
                    'length'            => $variation['data']['length'],
                    'weight'            => $variation['data']['weight'],
                ];
            }
            $this->variations = $variations;

            $this->attributes = $attributes;
        }
    }

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
