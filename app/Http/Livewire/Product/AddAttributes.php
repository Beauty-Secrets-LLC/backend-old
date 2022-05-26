<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;
use App\Models\Product;
use App\Models\Attribute;
use App\Models\ProductAttributeValue;

class AddAttributes extends Component
{
    public $product;
    public $all_attributes = [];
    public $selected_attribute = 'custom';
    public $attached_attributes = [];
    public $attribute_remove = [];

    public $listeners = [
        '$refresh',
        "add-attribute:loadVariationAttributes" => 'loadVariationAttributes',
    ];

    public function mount($product){
        $this->all_attributes = Attribute::with('values')->get()->ToArray();
        $this->product = $product;
        //set stored attributes
        $temp_attr_storage = [];
        if(isset($this->product['product_attributes']) && !empty($this->product['product_attributes'])) {
            foreach($this->product['product_attributes'] as $attribute) {
           
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
                        'attribute_value_id'    => $attribute['attribute_value_id'], 
                        'name'                  => $attribute['attribute_value']
                    ], JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
                    
                    $temp_attr_storage[$attribute['attribute_id']]['use_for_variation'] = $attribute['use_for_variation'];
                    $temp_attr_storage[$attribute['attribute_id']]['db_id'][] = $attribute['id'];
                    $temp_attr_storage[$attribute['attribute_id']]['status'] = 'stored';

                } else {

                    if(isset($temp_attr_storage[$attribute['attribute_name']])) {
                        $custom_values = explode('|', $temp_attr_storage[$attribute['attribute_name']]['values']);
                        $custom_values[] = $attribute['attribute_value'];
                        $temp_attr_storage[$attribute['attribute_name']]['values'] = implode('|', $custom_values);
                        $temp_attr_storage[$attribute['attribute_name']]['db_id'][] = $attribute['id'];
           

                    } else {
                        $temp_attr_storage[$attribute['attribute_name']] = [
                            'name'              => $attribute['attribute_name'], 
                            'values'            => $attribute['attribute_value'],
                            'db_id'             => [$attribute['id']],
                            'use_for_variation' => $attribute['use_for_variation'],
                            'status'            => 'stored',
    
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
        $this->emit('add-variations:set_available_attributes', $variation_attr);
    }   

    public function render(){
        return view('livewire.product.add-attributes');
    }

    public function add() {
        if($this->selected_attribute != 'custom') {
            $attribute_option = Attribute::with('values')->select('id', 'name')->where('id', $this->selected_attribute)->first()->toArray();
            $attribute_option['status'] = 'new';
            $attribute_option['db_id'] = [];
            $this->attached_attributes[] = $attribute_option;
        }
        else {
            $this->attached_attributes[] = [
                'name'              => '',
                'values'            => '',
                'use_for_variation' => false,
                'status'            => 'new',
                'db_id'             => []
            ];
        }
        $this->selected_attribute = 'custom';
    }

    public function remove($index) {
        $this->attribute_remove = array_merge($this->attribute_remove,$this->attached_attributes[$index]['db_id']);
        unset($this->attached_attributes[$index]);
        $this->attached_attributes = array_values($this->attached_attributes);
    }

    public function save() {

        if(!empty($this->product)) {
            //Delete
            if(!empty($this->attribute_remove)) {
                ProductAttributeValue::whereIn('id', $this->attribute_remove)->delete();
            }

            //Update
            if(!empty($this->attached_attributes)) {
                foreach($this->attached_attributes as $attr_index => $attribute) {
                    if($attribute['status'] == 'stored') {
                        $stored_values = ProductAttributeValue::whereIn('id', $attribute['db_id'])->get();
                        //update custom attributes
                        if(!isset($attribute['id'])) {
                            $values = explode('|', $attribute['values']);
                            if(!empty($stored_values)) {
                                foreach($stored_values as $value_index => $value) {
                                    //remove action
                                    if(!in_array($value->attribute_value, $values )) {
                                        $value->delete();
                                    }

                                    $value->update(['use_for_variation' => $attribute['use_for_variation']]);

                                    if (($key = array_search($value->attribute_value, $values)) !== false) {
                                        unset($values[$key]);
                                    }
                                }
                            }
                            if(!empty($values)) {
                                //add action
                                foreach($values as $value) {
                                    if(trim($value)) {
                                        $insert = Product::find($this->product['id'])->productAttributes()->create([
                                            'type' => 'custom',
                                            'attribute_name' => $attribute['name'],
                                            'attribute_value' => $value,
                                            'use_for_variation' => (isset($attribute['use_for_variation'])) ? $attribute['use_for_variation'] : 0 ,
                                        ]);
                                        array_push($this->attached_attributes[$attr_index]['db_id'],$insert->id);
                                    }
                                    
                                }
                                
                            }
                        }
                        else {
    
                            if(!empty($stored_values)) {
                                $values = [];
                                foreach($attribute['selected'] as $selected) {
                                    $data = json_decode($selected, true);
                                    $values[$data['attribute_value_id']] = $data['name'];
                                }

                                foreach($stored_values as $value_index => $value) {
                                    //remove action
                                    if(!in_array($value->attribute_value, $values )) {
                                        $value->delete();
                                    }

                                    $value->update(['use_for_variation' => $attribute['use_for_variation']]);

                                    if (($key = array_search($value->attribute_value, $values)) !== false) {
                                        unset($values[$key]);
                                    }
            
                                }

                                if(!empty($values)) {
                                    //add action
                                   
                                    foreach($values as $attribute_value_id => $value) {
                                        $insert = Product::find($this->product['id'])->productAttributes()->create([
                                            'type'              =>  'attribute',
                                            'attribute_id'      =>  $attribute['id'],
                                            'attribute_name'    =>  $attribute['name'],
                                            'attribute_value_id'=>  $attribute_value_id,
                                            'attribute_value'   =>  $value,
                                            'use_for_variation' => (isset($attribute['use_for_variation'])) ? $attribute['use_for_variation'] : 0 ,
                                        ]);
                                        array_push($this->attached_attributes[$attr_index]['db_id'],$insert->id);
                                    }
                                    
                                }
                            }
                        }
                        
                    }
                }
            }

            //Add
            if(!empty($this->attached_attributes)) {
                foreach($this->attached_attributes as $attr_index => $attribute) {
                    if($attribute['status'] == 'new') {
                        if(isset($attribute['id'])) {
                            if(!empty($attribute['selected'])) {
                                foreach($attribute['selected'] as $value) {
                                    $value = json_decode($value, true);
                                    $insert = Product::find($this->product['id'])->productAttributes()->create([
                                        'type'              =>  'attribute',
                                        'attribute_id'      =>  $attribute['id'],
                                        'attribute_name'    =>  $attribute['name'],
                                        'attribute_value_id'=>  $value['attribute_value_id'],
                                        'attribute_value'   =>  $value['name'],
                                        'use_for_variation' => (isset($attribute['use_for_variation'])) ? $attribute['use_for_variation'] : 0 ,
                                    ]);
                                    array_push($this->attached_attributes[$attr_index]['db_id'],$insert->id);
                                    $this->attached_attributes[$attr_index]['status'] = 'stored';
                                }
                            }
                        } else {
                            //setting up custom attribute data
                            $values = explode('|', $attribute['values']);
                            if(!empty($values)) {
                                foreach($values as $value) {
                                    $insert = Product::find($this->product['id'])->productAttributes()->create([
                                        'type' => 'custom',
                                        'attribute_name' => $attribute['name'],
                                        'attribute_value' => $value,
                                        'use_for_variation' => (isset($attribute['use_for_variation'])) ? $attribute['use_for_variation'] : 0 ,
                                    ]);

                                    array_push($this->attached_attributes[$attr_index]['db_id'],$insert->id);
                                    $this->attached_attributes[$attr_index]['status'] = 'stored';
                                }
                            }
                        }

                        
                    }
                }
            }

            
        }


        $variation_attr = [];
        if(!empty($this->attached_attributes)) {
            foreach($this->attached_attributes as $key => $attributes) {
                if(isset($attributes['use_for_variation']) && $attributes['use_for_variation']) {
                    $variation_attr[] = $this->attached_attributes[$key];
                }
            }
        }
        $this->emit('add-variations:set_available_attributes', $variation_attr);
        session()->flash('attribute-save-message', 'Оруулсан шинж чанаруудыг амжилттай хадгаллаа.');
    }
    
}
