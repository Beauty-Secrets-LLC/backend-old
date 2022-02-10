<div>
    @dump($variations)
{{-- 
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
    @endif --}}

    @if (!empty($variations))
        <div class="accordion" id="product_variations">
            @foreach ($variations as $variation_key => $variation)
                <div class="accordion-item p-3">
                    <h2 class="accordion-header" id="variationHeader_{{$variation_key}}">

                        @if (!empty($attributes))
                            <div class="form-group d-flex gap-5">
                                @foreach ($attributes as $attribute)
                                    @if (isset($attribute['selected']))
                                        <div class="w-50">
                                            <select name="" class="form-control">
                                                <option value="" selected>Бүх {{ $attribute['name'] }}</option>
                                                @foreach ($attribute['selected'] as $selected)
                                                    <option value="{{ $selected }}">{{ $selected }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endif
                                @endforeach
                                <button class="" type="button" data-bs-toggle="collapse" data-bs-target="#variationBody_{{$variation_key}}" aria-expanded="true" aria-controls="variationBody_{{$variation_key}}">
                                    more
                                </button>
                                <button>X</button>
                            </div>
                        @endif
                    </h2>
                    <div id="variationBody_{{$variation_key}}" class="accordion-collapse collapse" aria-labelledby="variationHeader_{{$variation_key}}" data-bs-parent="#product_variations">
                        <div class="accordion-body">
                            <div  class="d-flex flex-wrap gap-5">
                                <!--begin::Input group-->
                                <div class="fv-row w-100 flex-md-root fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="required form-label">Үндсэн үнэ</label>
                                    <!--end::Label-->
                                    <input type="text" name="regular_price" class="form-control mb-2" value="">
                                <div class="fv-plugins-message-container invalid-feedback"></div></div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="fv-row w-100 flex-md-root">
                                    <!--begin::Label-->
                                    <label class="form-label">Хямдарсан үнэ</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" name="sale_price"  class="form-control mb-2" value="">
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    <button class="btn btn-primary btn-sm" type="button" wire:click="add" >Add Variation</button>
</div>
