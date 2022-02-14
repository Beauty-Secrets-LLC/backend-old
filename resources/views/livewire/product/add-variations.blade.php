<div>
    @dump($attributes)
    @dump($variations)

    @if (!empty($attributes))
        <button class="btn btn-primary" type="button" wire:click="add" >Хувилбар нэмэх</button>
    @else
        <div class="alert alert-dismissible bg-light-primary d-flex flex-column flex-sm-row p-5 mb-10">
            <!--begin::Wrapper-->
            <div class="d-flex flex-column">
                <!--begin::Content-->
                <span>Та бүтээгдэхүүний шинж чанарыг <b>"Хадгалах"</b> шаардлагатай.</span>
                <!--end::Content-->
            </div>
            <!--end::Wrapper-->
        </div>
    @endif
    @if (!empty($variations))
        <div class="accordion my-5" id="product_variations">
            @foreach ($variations as $variation_key => $variation)
                <div class="accordion-item p-3">
                    <h2 class="accordion-header" id="variationHeader_{{$variation_key}}">
                        @if (!empty($attributes))
                            <div class="form-group d-flex gap-5">
                                @foreach ($attributes as $attribute_key => $attribute)
                                    @if (isset($attribute['use_for_variation']) && $attribute['use_for_variation'])
                                        <div class="w-50">
                                            <select name="" class="form-select" wire:model.defer="variations.{{$variation_key}}.attributes.{{ $attribute['name'] }}">
                                                <option value="any" selected>Бүх {{ $attribute['name'] }}</option>
                                                @if (isset($attribute['selected']))
                                                    @foreach ($attribute['selected'] as $option)
                                                        @php
                                                            $option = json_decode($option, true);
                                                        @endphp
                                                        <option value="{{ $option['id'] }}">{{ $option['name'] }}</option>
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
                                <button class="btn btn-light-primary" type="button" data-bs-toggle="collapse" data-bs-target="#variationBody_{{$variation_key}}" aria-expanded="true" aria-controls="variationBody_{{$variation_key}}">
                                    Дата
                                </button>
                                <button type="button" class="btn btn-icon btn-light-danger" wire:click="remove({{ $variation_key }})"><i class="las la-times"></i></button>
                            </div>
                        @endif
                    </h2>
                    <div id="variationBody_{{$variation_key}}" class="accordion-collapse collapse" aria-labelledby="variationHeader_{{$variation_key}}" data-bs-parent="#product_variations">
                        <div class="accordion-body">
                            <div class="mb-5 d-flex flex-wrap gap-5">
                                <div class="fv-row">
                                    <div class="form-check form-check-custom form-check-solid mb-2">
                                        <input class="form-check-input" type="checkbox" name="is_preorder" value="1" wire:model.defer="variations.{{$variation_key}}.is_preorder">
                                        <label class="form-check-label form-label">Урьдчилсан захиалга</label>
                                    </div>
                                </div>
                                <div class="fv-row">
                                    <div class="form-check form-check-custom form-check-solid mb-2">
                                        <input class="form-check-input" type="checkbox" name="is_digital" value="1" wire:model.defer="variations.{{$variation_key}}.is_digital">
                                        <label class="form-check-label form-label">Цахим бүтээгдэхүүн </label>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-5 fv-row fv-plugins-icon-container">
                                <!--begin::Label-->
                                <label class="form-label">Код</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="data[sku]" class="form-control mb-2" placeholder="Код" value="" wire:model.defer="variations.{{$variation_key}}.sku">
                                <!--end::Input-->
                                <!--begin::Description-->
                                <div class="text-muted fs-7">Бүтээгдэхүүний кодыг оруулна уу</div>
                                <!--end::Description-->
                            </div>
                            <div  class="d-flex flex-wrap gap-5 mb-5">
                                <!--begin::Input group-->
                                <div class="fv-row w-100 flex-md-root fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="required form-label">Үндсэн үнэ</label>
                                    <!--end::Label-->
                                    <input type="number" name="regular_price" class="form-control mb-2" value="" wire:model.defer="variations.{{$variation_key}}.regular_price">
                                <div class="fv-plugins-message-container invalid-feedback"></div></div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="fv-row w-100 flex-md-root">
                                    <!--begin::Label-->
                                    <label class="form-label">Хямдарсан үнэ</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="number" name="sale_price"  class="form-control mb-2" value="" wire:model.defer="variations.{{$variation_key}}.sale_price">
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                            </div>
                            <div class="mb-5 fv-row fv-plugins-icon-container">
                                <!--begin::Label-->
                                <label class="required form-label">Тоо ширхэг</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <div class="d-flex gap-3">
                                    <input type="number" name="quantity" class="form-control mb-2" placeholder="" value="" required wire:model.defer="variations.{{ $variation_key }}.stock_quantity">
                                </div>
                                <!--end::Input-->
                            </div>
                            <div class="mb-5 fv-row">
                                <!--begin::Input-->
                                <div class="form-check form-check-custom form-check-solid mb-2">
                                    <input class="form-check-input" type="checkbox" name="data[backorder]" value="yes" wire:model.defer="variations.{{$variation_key}}.backorder">
                                    <label class="form-check-label form-label">Нөөцөөс хамааралгүй захиалах</label>
                                </div>
                                <!--end::Input-->
                                <!--begin::Description-->
                                <div class="text-muted fs-7">Тухайн бүтээгдэхүүний нөөц дууссан ч хэрэглэгч захиалах боломжтой байна.</div>
                                <!--end::Description-->
                            </div>

                            <div class="mb-5 fv-row">
                                <!--begin::Label-->
                                <label class="form-label">Жин</label>
                                <!--end::Label-->
                                <!--begin::Editor-->
                                <input type="number" name="data[weight]" class="form-control mb-2" placeholder="" value="" wire:model.defer="variations.{{$variation_key}}.weight">
                                <!--end::Editor-->
                                <!--begin::Description-->
                                <div class="text-muted fs-7">Бүтээгдэхүүний жинг килограммаар (kg) тооцно.</div>
                                <!--end::Description-->
                            </div>
                            <div class="fv-row">
                                <!--begin::Label-->
                                <label class="form-label">Овор</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <div class="d-flex flex-wrap flex-sm-nowrap gap-3">
                                    <input type="number" name="data[width]" class="form-control mb-2" placeholder="Өргөн (w)" value="" wire:model.defer="variations.{{$variation_key}}.width">
                                    <input type="number" name="data[height]" class="form-control mb-2" placeholder="Өндөр (h)" value="" wire:model.defer="variations.{{$variation_key}}.height">
                                    <input type="number" name="data[length]" class="form-control mb-2" placeholder="Урт (l)" value="" wire:model.defer="variations.{{$variation_key}}.length">
                                </div>
                                <!--end::Input-->
                                <!--begin::Description-->
                                <div class="text-muted fs-7">Бүтээгдэхүүний оврыг сантиметрээр (cm) тооцно.</div>
                                <!--end::Description-->
                            </div>
                           
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
