<div class="card card-flush py-4">
    <div class="card-header">
        <div class="card-title">
            <h2>Test</h2>
        </div>
    </div>
    <div class="card-body pt-0">
        <div class="fv-row mb-10">
            <!--begin::Label-->
            <label class="fs-6 fw-bold mb-2">Төрөл
            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Бүтээгдэхүүний төрлөөс хамааран үнийг динамикаар тохируулах боломжтой"></i></label>
            <!--End::Label-->
            <!--begin::Row-->
            <div class="row row-cols-1 row-cols-md-3 row-cols-lg-1 row-cols-xl-3 g-9">
                <!--begin::Col-->
                <div class="col">
                    <!--begin::Option-->
                    <label class="btn btn-outline btn-outline-dashed btn-outline-default  d-flex text-start p-6 {{ $product_type == 'simple' ? 'active' : ''}}" >
                        <!--begin::Radio-->
                        <span class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
                            <input class="form-check-input" type="radio" name="type" value="simple" wire:model="product_type">
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
                    <label class="btn btn-outline btn-outline-dashed btn-outline-default d-flex text-start p-6 {{ $product_type == 'variable' ? 'active' : ''}}">
                        <!--begin::Radio-->
                        <span class="form-check form-check-custom form-check-solid form-check-sm align-items-start mt-1">
                            <input class="form-check-input" type="radio" name="type" value="variable" wire:model="product_type">
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
        @if ($product_type == 'simple')
            @livewire('product.variation-detail', ['index'=>0])
        @endif
    </div>
</div>