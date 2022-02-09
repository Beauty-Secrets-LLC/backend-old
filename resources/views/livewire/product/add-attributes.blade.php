<div>
    @dump($attached_attributes)
    <div class="d-flex flex-column flex-md-row gap-5 mb-10">
        <div class="flex-row-fluid">
            @if (!empty($all_attributes))
              
                <select id="select_attribute" wire:model="selected_attribute"  class="form-select" data-control="select2" data-placeholder="Сонгох">
                    @foreach ($all_attributes as $attribute)
                        <option value="{{ $attribute['id'] }}" wire:key="{{ $attribute['id'] }}-{{ $attribute['name'] }}">{{ $attribute['name'] }}</option>
                    @endforeach
                    <option  value="custom">Дурын шинж</option>
                </select>
           
            @endif
        </div>
        <div class="flex-row-fluid">
            <button type="button" class="btn btn-primary" wire:click="add">Нэмэх</button>
        </div>
    </div>
    <div>
        @if (!empty($attached_attributes))
            @foreach ($attached_attributes as $attribute_key => $attribute)
                @if (!isset($attribute['values']))
                    <div class="row mb-5">
                        <div class="col-md-6">
                            <input type="text" name="" class="form-control" placeholder="Нэр" wire:model.lazy="attached_attributes.{{ $attribute_key }}.name" wire:key="{{ $attribute_key.'_name' }}">
                        </div>
                        <div class="col-md-6">
                            <textarea name="" class="form-control" placeholder="Утга" rows="2" wire:model.lazy="attached_attributes.{{ $attribute_key }}.value" wire:key="{{ $attribute_key.'_value' }}"></textarea>
                        </div>
                    </div>
                @else
                    <div class="row mb-5">
                        <div class="col-md-6">
                            {{ $attribute['name'] }}
                        </div>
                        <div class="col-md-6">
                            @if (!empty($attribute['values']))
                                <select  class="form-select bs-select2" multiple="multiple" data-control="select2" data-placeholder="Сонгох">
                                    @foreach ($attribute['values'] as $values)
                                        <option value="{{ $values['value'] }}">{{ $values['value'] }}</option>
                                    @endforeach
                                </select>
                            @endif
                            
                    
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
            $('.form-select').select2();
        });
    })
</script>