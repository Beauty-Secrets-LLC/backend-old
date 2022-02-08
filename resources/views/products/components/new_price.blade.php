<div class="card card-flush py-4">
    <!--begin::Card header-->
    <div class="card-header">
        <div class="card-title">
            <h2>Үнэ</h2>
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
        

        <div id="price_variable" class="price-container" style="display:none">
            <div >
                variable
            </div>
            
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