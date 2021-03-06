
<div class="card card-flush py-4">
    <!--begin::Card header-->
    <div class="card-header">
        <div class="card-title">
            <h2>Шинж чанар</h2>
        </div>
    </div>
    <!--end::Card header-->
    <!--begin::Card body-->
    <div class="card-body pt-0">
      
        <!--begin::Input group-->
   
        <div {{ (!empty($attached_attributes)) ? 'wire:init=loadVariationAttributes' : '' }}>
            
            @if (session()->has('attribute-save-message'))
                <div class="alert bg-light-success mb-5 alert-dismissible fade show">
                    {{ session('attribute-save-message') }}
                </div>
            @endif


            <div class="row">
                <div class="col-md-4">
                    @if (!empty($all_attributes))
                        <select class="form-select bs-select2" id="select_attribute" wire:model.defer="selected_attribute" data-control="select2" data-placeholder="Сонгох" >
                            <option  value="custom">Дурын шинж</option>
                            @foreach ($all_attributes as $attribute)
                                @php
                                    $disabled = '';
                                    if(!empty($attached_attributes)) {
                                        foreach($attached_attributes as $attached_attribute) {
                                            if(isset($attached_attribute['id']) && $attached_attribute['id'] == $attribute['id'] )
                                                $disabled = 'disabled';
                                        }
                                    }
                                @endphp
                                <option {{ $disabled }} value="{{ $attribute['id'] }}" wire:key="{{ $attribute['id'] }}-{{ $attribute['name'] }}">{{ $attribute['name'] }}</option>
                            @endforeach
                            
                        </select>
                    @endif
                </div>
                <div class="col-md-4">
                    <button type="button" class="btn btn-primary" wire:click="add">Нэмэх</button>
                    <button type="button" class="btn btn-success" wire:click="save">Хадгалах</button>
                </div>
            </div>
            @if (!empty($attached_attributes))
            
                <div class="my-10">
                    @foreach ($attached_attributes as $attribute_key => $attribute)
                        <div class="row mb-6">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    @isset($attribute['id'])
                                        <input type="hidden" name="attributes[{{ $attribute_key}}][id]" value="{{ $attribute['id']}}">
                                    @endisset
                                    <input type="text" name="attributes[{{ $attribute_key}}][name]" class="form-control" placeholder="Нэр" wire:model.defer="attached_attributes.{{ $attribute_key }}.name" wire:key="{{ $attribute_key.'_name' }}">
                                </div>
                                <div class="form-check form-check-custom form-check-solid">
                                    <input name="attributes[{{ $attribute_key}}][use_for_variation]" class="form-check-input" type="checkbox" value="1" id="{{ $attribute_key.'_attr_for_variation' }}"  wire:model.defer="attached_attributes.{{ $attribute_key }}.use_for_variation"  wire:key="{{ $attribute_key.'_use_for_variation' }}" />
                                    <label class="form-check-label" for="{{ $attribute_key.'_attr_for_variation' }}">
                                        Сонголт үүсгэхэд ашиглана
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-5">
                                @if (is_array($attribute['values']))
                                    <select name="attributes[{{ $attribute_key}}][value][]" class="form-select bs-select2 multiple-select" multiple="multiple" data-control="select2" data-placeholder="Сонгох" data-index="{{  $attribute_key }}">
                                        @foreach ($attribute['values'] as $values)
                                            
                                            @php
                    
                                                $attribute_formatted = json_encode([
                                                    // 'product_attribute_id'  =>$values['product_attribute_id'], 
                                                    'attribute_id'          =>$values['attribute_id'], 
                                                    'attribute_value_id'    =>$values['id'], 
                                                    'name'                  =>$values['value']
                                                ], JSON_UNESCAPED_UNICODE);
                                            @endphp
                                            <option {{ (isset($attribute['selected']) && in_array( $attribute_formatted ,$attribute['selected'] )) ? 'selected' : '' }} value="{{ $attribute_formatted }}">{{ $values['value'] }}</option>
                                        @endforeach
                                    </select>
                                @else 
                                    <input name="attributes[{{ $attribute_key}}][value]"
                                        class="form-control" 
                                        placeholder="Утга (Ялгаатай утгыг | тэмдэгээр тусгаарлана)" 
                                        rows="3" 
                                        wire:model.lazy="attached_attributes.{{ $attribute_key }}.values" 
                                        wire:key="{{ $attribute_key.'_value' }}
                                        " />
                                
                                    @endif
                                
                            </div>
                            <div class="col-md-3">
                                <button type="button" wire:click="remove({{  $attribute_key }})" class="btn btn-sm btn-light-danger">Устгах</button>
                            </div>
                        </div>
                    @endforeach
                </div>
        
            @endif
            
        </div>
    </div>
    <script>
        $('#select_attribute').on('select2:select', function (e) {
            var data = e.params.data;
            @this.set('selected_attribute', data.id);
        });
    
        document.addEventListener('livewire:load', function () {
            Livewire.hook('message.processed', (el, component) => {
                $('.bs-select2').select2({
                    closeOnSelect: false
                });
    
                //Select attribute change event
                $('.multiple-select').on('select2:close', function (e) {
                    var options = $(this).val();
                    var index = $(this).data('index');
                    @this.set('attached_attributes.'+index+'.selected', options);
                });
            });
        })
    </script>
</div>

