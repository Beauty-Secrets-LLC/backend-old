<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;
use App\Models\Product;
use App\Models\ProductVariation;

class VariationDetail extends Component
{
    public $index = 0;
    public $variation;
    public $sda = '';

    public $listeners = [
        '$refresh',
        "variation-detail:update_attribute" => 'update_attribute',
        "variation-detail:save" => 'save1',
    ];


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

    public function save1($variations) {
        dump($this->index);
        // if(isset($this->variation['id'])) {
           
        //    // $aa = ProductVariation::find($this->variation['id'])->update($this->variation);
           
        // }
        //dump($this->variation);
    }

    public function update_attribute($variations) {
        dump($variations);
    }
}
