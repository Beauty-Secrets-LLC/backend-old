<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;
use App\Models\ProductAttribute;

class AddAttributes extends Component
{
    public $all_attributes = [];
    public $selected_attribute;
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
            $this->attached_attributes[] = ProductAttribute::with('values')->select('id', 'name')->where('id', 1)->first()->toArray();
        }
        else {
            $this->attached_attributes[] = ['name' => ''];
        }
        //$this->selected_attribute = 'asdasd';
    }

}
