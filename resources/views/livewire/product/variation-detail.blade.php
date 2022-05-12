<div>
    <div class="mb-10 d-flex flex-wrap gap-5">
        
        <div class="fv-row">
            <div class="form-check form-check-custom form-check-solid mb-2">
                <input class="form-check-input" type="checkbox" name="variations[{{$index}}][is_digital]" value="1" wire:model="digital" id="is_digital_{{$index}}">
                <label for="is_digital_{{$index}}" class="form-check-label form-label">Цахим бүтээгдэхүүн </label>
            </div>
        </div>
        @if (!$digital)
            <div class="fv-row">
                <div class="form-check form-check-custom form-check-solid mb-2">
                    <input class="form-check-input" type="checkbox" name="variations[{{$index}}][is_preorder]" value="1" id="is_preorder_{{$index}}">
                    <label for="is_preorder_{{$index}}" class="form-check-label form-label">Урьдчилсан захиалга</label>
                </div>
            </div>
        @endif
    </div>

    @if (!$digital)
        <div class="mb-5 row fv-plugins-icon-container">
            <!--begin::Label-->
            <label class="form-label col-md-4">Код</label>
            <!--end::Label-->
            <!--begin::Input-->
            <div class="col-md-8">
                <input type="text" name="variations[{{$index}}][sku]" class="form-control mb-2" placeholder="Код" value="">
                <!--end::Input-->
                <!--begin::Description-->
                <div class="text-muted fs-7">Бүтээгдэхүүний кодыг оруулна уу</div>
                <!--end::Description-->
            </div>
            
        </div>
    @endif
    
    <div class="mb-5 row fv-plugins-icon-container">
        <!--begin::Label-->
        <label class="required form-label col-md-4">Үндсэн үнэ</label>
        <!--end::Label-->
        <div class="col-md-8">
            <input type="number" name="variations[{{$index}}][regular_price]" class="form-control mb-2" value="">
            <div class="fv-plugins-message-container invalid-feedback"></div>
        </div>
    </div>

    <div class="mb-5 row">
        <!--begin::Label-->
        <label class="form-label col-md-4">Хямдарсан үнэ</label>
        <!--end::Label-->
        <!--begin::Input-->
        <div class="col-md-8">
            <input type="number" name="variations[{{$index}}][sale_price]"  class="form-control mb-2" value="">
        </div>
        <!--end::Input-->
    </div>

    <div class="mb-7 row">
        <label class="required form-label col-md-4">Барааны нөөц</label>
        <div class="col-md-8">
            <select name="variations[{{$index}}][stock_quantity]" class="form-select">
                <option value="{{ Product::STOCK_INSTOCK }}">Байгаа</option>
                <option value="{{ Product::STOCK_OUTOFSTOCK }}">Дууссан</option>
            </select>
        </div>
    </div>
    <div class="mb-7 row">
        <!--begin::Label-->
        <label class="form-label col-md-4">Тоо ширхэг</label>
        <!--end::Label-->
        <!--begin::Input-->
        <div class="col-md-8">
            <input type="number" name="variations[{{$index}}][stock_quantity]" class="form-control mb-2" placeholder="" value="" required>
            <!--begin::Input-->
            <div class="form-check form-check-custom form-check-solid mb-2">
                <input class="form-check-input" type="checkbox" name="variations[{{$index}}][backorder]" value="yes" id="backorder_{{$index}}">
                <label for="backorder_{{$index}}" class="form-check-label form-label">Нөөцөөс хамааралгүй захиалах</label>
            </div>
            <!--end::Input-->
            <!--begin::Description-->
            <div class="text-muted fs-7">Тухайн бүтээгдэхүүний нөөц дууссан ч хэрэглэгч захиалах боломжтой байна.</div>
            <!--end::Description-->
        </div>
        <!--end::Input-->
    </div>

    @if (!$digital)
        
        <div class="mb-7 row">
            <!--begin::Label-->
            <label class="form-label col-md-4">Жин</label>
            <!--end::Label-->
            <div class="col-md-8">
                <input type="number" name="variations[{{$index}}][data][weight]" class="form-control mb-2" placeholder="" value="">
                <!--end::Editor-->
                <!--begin::Description-->
                <div class="text-muted fs-7">Бүтээгдэхүүний жинг килограммаар (kg) тооцно.</div>
            </div>
        </div>
        <div class="row">
            <label class="form-label col-md-4">Овор</label>
            <div class="col-md-8">
                <div class="d-flex flex-wrap flex-sm-nowrap gap-3">
                    <input type="number" name="variations[{{$index}}][data][width]" class="form-control mb-2" placeholder="Өргөн (w)" value="">
                    <input type="number" name="variations[{{$index}}][data][height]" class="form-control mb-2" placeholder="Өндөр (h)" value="">
                    <input type="number" name="variations[{{$index}}][data][length]" class="form-control mb-2" placeholder="Урт (l)" value="">
                </div>
                <div class="text-muted fs-7">Бүтээгдэхүүний оврыг сантиметрээр (cm) тооцно.</div>
            </div>
        </div>
    @endif
    
</div>
