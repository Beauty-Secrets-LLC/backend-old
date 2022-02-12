<div>
    @if (!empty($attached_attributes))
        <!--begin::Alert-->
        <div class="alert bg-light-primary d-flex flex-column flex-sm-row p-5 mb-3">
            <!--begin::Wrapper-->
            <div class="d-flex flex-column">
                <!--begin::Content-->
                <span>Та бүтээгдэхүүний сонголтонд шинж чанар оруулахын өмнө <b>"Хадгалах"</b> товчийг эхлээд дарна уу.</span>
                <!--end::Content-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Alert-->
    @endif

    @if (session()->has('attribute-save-message'))
        <div class="alert bg-light-success mb-5">
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
            @if (!empty($attached_attributes))
                <button type="button" class="btn btn-success" wire:click="save">Хадгалах</button>
            @endif
            
        </div>
    </div>
    
    
    @if (!empty($attached_attributes))
        <div class="my-10">
            @foreach ($attached_attributes as $attribute_key => $attribute)
                <div class="row mb-6">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <input type="text" name="" class="form-control" placeholder="Нэр" wire:model.defer="attached_attributes.{{ $attribute_key }}.name" wire:key="{{ $attribute_key.'_name' }}">
                        </div>
                        <div class="form-check form-check-custom form-check-solid">
                            <input class="form-check-input" type="checkbox" value="1" id="{{ $attribute_key.'_attr_for_variation' }}"  wire:model.defer="attached_attributes.{{ $attribute_key }}.use_for_variation"  wire:key="{{ $attribute_key.'_use_for_variation' }}" />
                            <label class="form-check-label" for="{{ $attribute_key.'_attr_for_variation' }}">
                                Сонголт үүсгэхэд ашиглана
                            </label>
                        </div>
                    </div>
                    <div class="col-md-5">
                        @if (is_array($attribute['values']))
                            <select  class="form-select bs-select2 multiple-select" multiple="multiple" data-control="select2" data-placeholder="Сонгох" data-index="{{  $attribute_key }}">
                                @foreach ($attribute['values'] as $values)
                                    <option {{ (isset($attribute['selected']) && in_array( $values['value'],$attribute['selected'] )) ? 'selected' : '' }} value="{{ $values['value'] }}">{{ $values['value'] }}</option>
                                @endforeach
                            </select>
                        @else 
                            <textarea name="" 
                                class="form-control" 
                                placeholder="Утга (Ялгаатай утгыг | тэмдэгээр тусгаарлана)" 
                                rows="3" 
                                wire:model.defer="attached_attributes.{{ $attribute_key }}.values" 
                                wire:key="{{ $attribute_key.'_value' }}
                                ">
                            </textarea>
                            @endif
                        
                    </div>
                    <div class="col-md-3">
                        <button tyle="button" wire:click="remove({{  $attribute_key }})" class="btn btn-sm btn-light-danger">Устгах</button>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
   
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