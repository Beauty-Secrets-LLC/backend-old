<div>
    @if (!empty($attached_attributes))
        <!--begin::Alert-->
        <div class="alert alert-dismissible bg-light-primary d-flex flex-column flex-sm-row p-5 mb-10">
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
    <div class="row mb-10">
        <div class="col-md-4">
            @if (!empty($all_attributes))
                <select class="form-select" id="select_attribute" wire:model.defer="selected_attribute" data-control="select2" data-placeholder="Сонгох" >
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
    <div>
        @if (!empty($attached_attributes))
            @foreach ($attached_attributes as $attribute_key => $attribute)
                @if (!isset($attribute['values']))
                    <div class="row mb-5">
                        <div class="col-md-4">
                            <input type="text" name="" class="form-control" placeholder="Нэр" wire:model.defer="attached_attributes.{{ $attribute_key }}.name" wire:key="{{ $attribute_key.'_name' }}">
                        </div>
                        <div class="col-md-4">
                            <textarea name="" class="form-control" placeholder="Утга" rows="2" wire:model.defer="attached_attributes.{{ $attribute_key }}.value" wire:key="{{ $attribute_key.'_value' }}"></textarea>
                        </div>
                        <div class="col-md-4">
                            <button tyle="button" wire:click="remove({{  $attribute_key }})" class="btn btn-sm btn-light-danger">Устгах</button>
                        </div>
                    </div>
                @else
                    <div class="row mb-5">
                        <div class="col-md-4">
                            <input type="text" name="" value="{{ $attribute['name'] }}" class="form-control" readonly>
                        </div>
                        <div class="col-md-4">
                            @if (!empty($attribute['values']))
                                <select  class="form-select bs-select2" multiple="multiple" data-control="select2" data-placeholder="Сонгох" data-index="{{  $attribute_key }}">
                                    @foreach ($attribute['values'] as $values)
                                        <option {{ (isset($attribute['selected']) && in_array( $values['value'],$attribute['selected'] )) ? 'selected' : '' }} value="{{ $values['value'] }}">{{ $values['value'] }}</option>
                                    @endforeach
                                </select>
                            @endif
                        </div>
                        <div class="col-md-4">
                            <button tyle="button" wire:click="remove({{  $attribute_key }})" class="btn btn-sm btn-light-danger">Устгах</button>
                        </div>
                    </div>
            
                @endif
          
            @endforeach
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
            $('.form-select').select2({
                closeOnSelect: false
            });

            //Select attribute change event
            $('.bs-select2').on('select2:close', function (e) {
                var options = $(this).val();
                var index = $(this).data('index');
                @this.set('attached_attributes.'+index+'.selected', options);
            });

            
        });
    })
</script>