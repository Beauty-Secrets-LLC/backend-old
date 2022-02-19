<div class="card card-flush py-4">
    <!--begin::Card header-->
    <div class="card-header">
        <div class="card-title">
            <h2>Бүтээгдэхүүний нөөц ба үнэ</h2>
        </div>
    </div>
    <!--end::Card header-->
    <!--begin::Card body-->
    <div class="card-body pt-0">
        <div class="fv-row mb-10">
            <!--begin::Label-->
            <label class="fs-6 fw-bold mb-2">Төрөл
            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Бүтээгдэхүүний төрлөөс хамааран үнийг динамикаар тохируулах боломжтой"></i></label>
            <!--End::Label-->
            <!--begin::Row-->
            <div class="row row-cols-1 row-cols-md-3 row-cols-lg-1 row-cols-xl-3 g-9" data-kt-buttons="true" data-kt-buttons-target="[data-kt-button='true']">
                <!--begin::Col-->
                <div class="col">
                    <!--begin::Option-->
                    <label class="btn btn-outline btn-outline-dashed btn-outline-default active d-flex text-start p-6" data-kt-button="true">
                        <!--begin::Radio-->
                        <span class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
                            <input class="form-check-input" type="radio" name="type" value="simple" checked="checked">
                        </span>
                        <!--end::Radio-->
                        <!--begin::Info-->
                        <span class="ms-5">
                            <span class="fs-5 fw-bolder text-gray-800 d-block">Дан бүтээгдэхүүн</span>
                        </span>
                        <!--end::Info-->
                    </label>
                    <!--end::Option-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col">
                    <!--begin::Option-->
                    <label class="btn btn-outline btn-outline-dashed btn-outline-default d-flex text-start p-6" data-kt-button="true">
                        <!--begin::Radio-->
                        <span class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
                            <input class="form-check-input" type="radio" name="type" value="variable">
                        </span>
                        <!--end::Radio-->
                        <!--begin::Info-->
                        <span class="ms-5">
                            <span class="fs-5 fw-bolder text-gray-800 d-block">Сонголттой бүтээгдэхүүн</span>
                        </span>
                        <!--end::Info-->
                    </label>
                    <!--end::Option-->
                </div>
                <!--end::Col-->
                
            </div>
            <!--end::Row-->
        </div>

        <div id="price_simple"  class="price-container">
            <div class="mb-5 d-flex flex-wrap gap-5">
                <div class="fv-row">
                    <div class="form-check form-check-custom form-check-solid mb-2">
                        <input class="form-check-input" type="checkbox" name="simple[0][is_preorder]" value="1">
                        <label class="form-check-label form-label">Урьдчилсан захиалга</label>
                    </div>
                </div>
                <div class="fv-row">
                    <div class="form-check form-check-custom form-check-solid mb-2">
                        <input class="form-check-input" type="checkbox" name="simple[0][is_digital]" value="1">
                        <label class="form-check-label form-label">Цахим бүтээгдэхүүн </label>
                    </div>
                </div>
            </div>
            <div class="mb-5 fv-row fv-plugins-icon-container">
                <!--begin::Label-->
                <label class="form-label">Код</label>
                <!--end::Label-->
                <!--begin::Input-->
                <input type="text" name="simple[0][sku]" class="form-control mb-2" placeholder="Код" value="">
                <!--end::Input-->
                <!--begin::Description-->
                <div class="text-muted fs-7">Бүтээгдэхүүний кодыг оруулна уу</div>
                <!--end::Description-->
            </div>
            <div class=" mb-5 d-flex flex-wrap gap-5">
                <!--begin::Input group-->
                <div class="fv-row w-100 flex-md-root fv-plugins-icon-container">
                    <!--begin::Label-->
                    <label class="required form-label">Үндсэн үнэ</label>
                    <!--end::Label-->
                    <input type="number" name="simple[0][regular_price]" class="form-control mb-2" value="">
                <div class="fv-plugins-message-container invalid-feedback"></div></div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="fv-row w-100 flex-md-root">
                    <!--begin::Label-->
                    <label class="form-label">Хямдарсан үнэ</label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input type="number" name="simple[0][sale_price]"  class="form-control mb-2" value="">
                    <!--end::Input-->
                </div>
                <!--end::Input group-->
            </div>
            <div class="mb-5 fv-row fv-plugins-icon-container">
                <!--begin::Label-->
                <label class="required form-label">Барааны нөөц</label>
                <!--end::Label-->
                <!--begin::Input-->
                <div class="d-flex gap-3">
                    <select name="simple[0][stock_quantity]" class="form-select">
                        <option value="{{ Product::STOCK_INSTOCK }}">Байгаа</option>
                        <option value="{{ Product::STOCK_OUTOFSTOCK }}">Дууссан</option>
                    </select>
                </div>
                <!--end::Input-->
            </div>
            <div class="mb-5 fv-row fv-plugins-icon-container">
                <!--begin::Label-->
                <label class="form-label">Тоо ширхэг</label>
                <!--end::Label-->
                <!--begin::Input-->
                <div class="d-flex gap-3">
                    <input type="number" name="simple[0][stock_quantity]" class="form-control mb-2" placeholder="" value="" required>
                </div>
                <!--end::Input-->
            </div>
            <div class="mb-5 fv-row">
                <!--begin::Input-->
                <div class="form-check form-check-custom form-check-solid mb-2">
                    <input class="form-check-input" type="checkbox" name="simple[0][backorder]" value="yes">
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
                <input type="number" name="simple[0][data][weight]" class="form-control mb-2" placeholder="" value="">
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
                    <input type="number" name="simple[0][data][width]" class="form-control mb-2" placeholder="Өргөн (w)" value="">
                    <input type="number" name="simple[0][data][height]" class="form-control mb-2" placeholder="Өндөр (h)" value="">
                    <input type="number" name="simple[0][data][length]" class="form-control mb-2" placeholder="Урт (l)" value="">
                </div>
                <!--end::Input-->
                <!--begin::Description-->
                <div class="text-muted fs-7">Бүтээгдэхүүний оврыг сантиметрээр (cm) тооцно.</div>
                <!--end::Description-->
            </div>
        </div>

        <div id="price_variable" class="price-container" style="display:none">
            @livewire('product.add-variations')
        </div>
    </div>
    <!--end::Card body-->
</div>


<script>
    $('input[name="type"]').change(function() {
        var selected = $(this).val();
        $('.price-container').hide();
        $('#price_'+selected).show();
    })
</script>