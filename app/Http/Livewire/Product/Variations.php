<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;

class Variations extends Component
{
    public $product;
    public $attributes = [];
    public $variations = [];
    public $listeners = [
        '$refresh',
        "variations:set_available_attributes" => 'set_attributes',
    ];

    public function mount($product) {
        $this->product = $product;
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
        }
    }
    public function render()
    {
        return view('livewire.product.variations');
    }

    public function set_attributes($attr) {
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
}
