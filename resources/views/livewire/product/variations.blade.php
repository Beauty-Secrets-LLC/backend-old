<div>
    @dump($attributes)
    @dump($variations)

    @if (!empty($variations))
        <div class="accordion my-5" id="product_variations">
            @foreach ($variations as $variation_key => $variation)
                <div class="accordion-item p-3">
                    <div class="accordion-header" id="variationHeader_{{$variation_key}}">
                        @if (!empty($attributes))
                            <div class="form-group d-flex gap-5  justify-content-between">
                                <div class="d-flex gap-5" style="flex:1">
                                    @foreach ($attributes as $attribute_key => $attribute)
                                        @if (isset($attribute['use_for_variation']) && $attribute['use_for_variation'])
                                            <div style="flex:1">
                                                <select class="form-select" wire:model="variations.{{ $variation_key }}.attributes.{{ $attribute['name'] }}">
                                                    <option value="any" selected>Бүх {{ $attribute['name'] }}</option>
                                                    @if (isset($attribute['selected']))
                                                        @foreach ($attribute['selected'] as $option)
                                                            @php
                                                                $option_array = json_decode($option, true);
                                                            @endphp
                                                            <option value="{{ $option }}">{{ $option_array['name'] }}</option>
                                                        @endforeach
                                                    @else
                                                        @foreach (explode("|", $attribute['values']) as $option)
                                                            <option value="{{ $option }}">{{ $option }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="options">
                                    <div class="d-inline text-hover-primary me-2">
                                        <span class="svg-icon svg-icon-muted svg-icon-2hx"  data-bs-toggle="collapse" data-bs-target="#variationBody_{{$variation_key}}" aria-expanded="true" aria-controls="variationBody_{{$variation_key}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3" d="M5 8.04999L11.8 11.95V19.85L5 15.85V8.04999Z" fill="currentColor"/>
                                                <path d="M20.1 6.65L12.3 2.15C12 1.95 11.6 1.95 11.3 2.15L3.5 6.65C3.2 6.85 3 7.15 3 7.45V16.45C3 16.75 3.2 17.15 3.5 17.25L11.3 21.75C11.5 21.85 11.6 21.85 11.8 21.85C12 21.85 12.1 21.85 12.3 21.75L20.1 17.25C20.4 17.05 20.6 16.75 20.6 16.45V7.45C20.6 7.15 20.4 6.75 20.1 6.65ZM5 15.85V7.95L11.8 4.05L18.6 7.95L11.8 11.95V19.85L5 15.85Z" fill="currentColor"/>
                                                </svg>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>

                    <div id="variationBody_{{$variation_key}}" class="accordion-collapse collapse" aria-labelledby="variationHeader_{{$variation_key}}" data-bs-parent="#product_variations" wire:ignore>
                        {{$variation_key}}
                    </div>
                </div>
                
            @endforeach
        </div>
    @endif
</div>
