<div>
    @dump($variations)

    @if (!empty($attributes))
        <div class="accordion" id="product_variations">
            @foreach ($attributes as $attribute_key => $attribute)
                @if (isset($attribute['selected']))
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="variationHeader_{{$attribute_key}}">
                            <select name="">
                                <option value="" selected>Бүх {{ $attribute['name'] }}</option>
                                @foreach ($attribute['selected'] as $selected)
                                    <option value="{{ $selected }}">{{ $selected }}</option>
                                @endforeach
                            </select>
                           
                            <button class="" type="button" data-bs-toggle="collapse" data-bs-target="#variationBody_{{$attribute_key}}" aria-expanded="true" aria-controls="variationBody_{{$attribute_key}}">
                                {{ $attribute['name']  }}
                            </button>
                        </h2>
                        <div id="variationBody_{{$attribute_key}}" class="accordion-collapse collapse" aria-labelledby="variationHeader_{{$attribute_key}}" data-bs-parent="#product_variations">
                            <div class="accordion-body">
                                asdasd
                            </div>
                        </div>
                    </div>
                @endif
                
            @endforeach
        </div>
    @endif

    <button class="btn btn-primary btn-sm" type="button" wire:click="add" >Add Variation</button>
</div>
