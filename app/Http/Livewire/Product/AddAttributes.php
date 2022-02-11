<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;
use App\Models\ProductAttribute;

class AddAttributes extends Component
{
    public $all_attributes = [];
    public $selected_attribute = 'custom';
    public $attached_attributes = [];

    public function mount(){
        $this->all_attributes = ProductAttribute::with('values')->get()->ToArray();
    }

    public function render()
    {
        return view('livewire.product.add-attributes');
    }

    public function add() {
        if($this->selected_attribute != 'custom') {
            $this->attached_attributes[] = ProductAttribute::with('values')->select('id', 'name')->where('id', $this->selected_attribute)->first()->toArray();
        }
        else {
            $this->attached_attributes[] = [
                'name' => '',
                'values' => '',
                'use_for_variation' => false,
            ];
        }
        $this->selected_attribute = 'custom';
        //$this->selected_attribute = 'asdasd';
    }

    public function remove($index) {
        unset($this->attached_attributes[$index]);
        $this->attached_attributes = array_values($this->attached_attributes);
    }

    public function save() {
        $variation_attr = [];
        if(!empty($this->attached_attributes)) {
            foreach($this->attached_attributes as $key => $attributes) {
                if(isset($attributes['use_for_variation']) && $attributes['use_for_variation']) {
                    $variation_attr[] = $this->attached_attributes[$key];
                }
            }
        }
        $this->emit('new-product:setVariation', $variation_attr);
        session()->flash('attribute-save-message', 'Оруулсан шинж чанаруудыг амжилттай хадгаллаа.');

    }
    
}
