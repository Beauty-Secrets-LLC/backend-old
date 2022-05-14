<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;
use App\Models\Attribute;

class AddAttributes extends Component
{
    public $stored_attribute;
    public $all_attributes = [];
    public $selected_attribute = 'custom';
    public $attached_attributes = [];

    public function mount($stored_attribute){
        $this->all_attributes = Attribute::with('values')->get()->ToArray();
        //set stored attributes
        $temp_attr_storage = [];
        if(!empty($stored_attribute)) {
            foreach($stored_attribute as $attribute) {
                if(!is_null($attribute['attribute_id'])) {
                    $temp_attr_storage[$attribute['attribute_id']]['id'] = $attribute['attribute_id'];
                    $temp_attr_storage[$attribute['attribute_id']]['name'] = $attribute['attribute_name'];
                    if(!empty($this->all_attributes)) {
                        foreach($this->all_attributes as $all_attribute) {
                            if($attribute['attribute_id'] == $all_attribute['id'])
                                $temp_attr_storage[$attribute['attribute_id']]['values'] = $all_attribute['values'];
                        }
                    }
                    $temp_attr_storage[$attribute['attribute_id']]['selected'][] = json_encode([
                        'attribute_id'          => $attribute['attribute_id'], 
                        'attribute_value_id'    =>$attribute['attribute_value_id'], 
                        'name'                  =>$attribute['attribute_value']
                    ], JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
                    $temp_attr_storage[$attribute['attribute_id']]['use_for_variation'] = $attribute['use_for_variation'];

                } else {

                    if(isset($temp_attr_storage[$attribute['attribute_name']])) {
                        $custom_values = explode('|', $temp_attr_storage[$attribute['attribute_name']]['values']);
                        $custom_values[] = $attribute['attribute_value'];
                        $temp_attr_storage[$attribute['attribute_name']]['values'] = implode('|', $custom_values);

                    } else {
                        $temp_attr_storage[$attribute['attribute_name']] = [
                            'name'              =>$attribute['attribute_name'], 
                            'values'            => $attribute['attribute_value'],
                            'use_for_variation' => $attribute['use_for_variation'],
    
                        ];
                    }
                    
                } 
            }
            $this->attached_attributes = array_values($temp_attr_storage);
        }
        //end
        
    }

    public function loadVariationAttributes() {
        $variation_attr = [];
        if(!empty($this->attached_attributes)) {
            foreach($this->attached_attributes as $key => $attributes) {
                if(isset($attributes['use_for_variation']) && $attributes['use_for_variation']) {
                    $variation_attr[] = $this->attached_attributes[$key];
                }
            }
        }
        $this->emit('edit-product:setVariation', $variation_attr);
    }   

    public function render()
    {
        return view('livewire.product.add-attributes');
    }

    public function add() {
        if($this->selected_attribute != 'custom') {
            $this->attached_attributes[] = Attribute::with('values')->select('id', 'name')->where('id', $this->selected_attribute)->first()->toArray();
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
        $this->emit('type-select:setAttribute', $variation_attr);
        session()->flash('attribute-save-message', 'Оруулсан шинж чанаруудыг амжилттай хадгаллаа.');

    }
    
}
