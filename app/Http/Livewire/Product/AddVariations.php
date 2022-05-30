<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;
use App\Models\Product;

class AddVariations extends Component
{

    public $listeners = [
        '$refresh',
        "add-variations:set_available_attributes" => 'set_AvailableAttributes',
    ];
    public $stored_variations;
    public $attributes = [];
    public $variations = [];

    public function set_AvailableAttributes($attr) {
        $this->attributes = $attr;
         //set default attributes for stored variations
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

    public function mount($product){
        //set stored variations on edit page
        if(isset($product['product_variation']) && !empty($product['product_variation'])) {
            $variations = [];
            foreach($product['product_variation'] as $variation_index => $variation) {
                $variations[$variation_index] = [
                    'id'                => $variation['id'],
                    'attributes'        => $variation['attributes'],
                    'status'            => 'stored',
                    'sku'               => isset($variation['sku']) ? $variation['sku'] : null,
                    'regular_price'     => $variation['regular_price'],
                    'sale_price'        => $variation['sale_price'],
                    'stock_status'      => $variation['stock_status'],
                    'stock_quantity'    => $variation['stock_quantity'],
                    'data'              => [
                        'is_digital'        => isset($variation['data']['is_digital']) ? $variation['data']['is_digital'] : false,
                        'is_preorder'       => isset($variation['data']['is_preorder']) ? $variation['data']['is_preorder'] : false,
                        'width'             => isset($variation['data']['width']) ? $variation['data']['width'] : null,
                        'height'            => isset($variation['data']['height']) ? $variation['data']['height'] : null,
                        'length'            => isset($variation['data']['length']) ? $variation['data']['length'] : null,
                        'weight'            => isset($variation['data']['weight']) ? $variation['data']['weight'] : null,
                        'points'            => isset($variation['data']['points']) ? $variation['data']['points'] : null,
                    ],
                    
                ];
            }
            $this->variations = $variations;
            //$this->attributes = $attributes;
        }
    }

    public function render()
    {
        return view('livewire.product.add-variations');
    }

    

    public function add() {
        //set default attributes for new variation
        $default_attr = [];
        if(!empty($this->attributes)) {
            foreach($this->attributes as $attributes) {
                $default_attr[$attributes['name']] = 'any';
            }
        }
        $this->variations[] = ['attributes' => $default_attr, 'status' => 'new']; 
    }

    public function save() {
        $this->emit('variation-detail:save', $this->variations);
        // $this->emit('variation-detail:update_attribute', $this->variations);
    }

    public function remove($index) {
        unset($this->variations[$index]);
        $this->variations = array_values($this->variations);
    }
}
