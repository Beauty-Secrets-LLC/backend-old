<div class="modal-dialog modal-dialog-centered mw-650px">
    <!--begin::Modal content-->
    <div class="modal-content">
        <!--begin::Form-->
        <form class="form" action="#" id="kt_modal_update_customer_form">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_update_customer_header">
                <!--begin::Modal title-->
                <h2 class="fw-bolder">Мэдээлэл шинэчлэх</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div  data-bs-dismiss="modal" class="btn btn-icon btn-sm btn-active-icon-primary">
                    <!--begin::Svg Icon | path: icons/duotone/Navigation/Close.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)" fill="#000000">
                                <rect fill="#000000" x="0" y="7" width="16" height="2" rx="1" />
                                <rect fill="#000000" opacity="0.5" transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)" x="0" y="7" width="16" height="2" rx="1" />
                            </g>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body py-10 px-lg-17">
                @if (session('attribute-save-message'))
                    <div class="alert alert-success d-flex align-items-center p-5 mb-10">
                        <!--begin::Svg Icon | path: icons/duotone/General/Shield-check.svg-->
                        <span class="svg-icon svg-icon-2hx svg-icon-success me-4">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"></rect>
                                    <path d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z" fill="#000000" opacity="0.3"></path>
                                    <path d="M11.1750002,14.75 C10.9354169,14.75 10.6958335,14.6541667 10.5041669,14.4625 L8.58750019,12.5458333 C8.20416686,12.1625 8.20416686,11.5875 8.58750019,11.2041667 C8.97083352,10.8208333 9.59375019,10.8208333 9.92916686,11.2041667 L11.1750002,12.45 L14.3375002,9.2875 C14.7208335,8.90416667 15.2958335,8.90416667 15.6791669,9.2875 C16.0625002,9.67083333 16.0625002,10.2458333 15.6791669,10.6291667 L11.8458335,14.4625 C11.6541669,14.6541667 11.4145835,14.75 11.1750002,14.75 Z" fill="#000000"></path>
                                </g>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                        <div class="d-flex flex-column">
                            <h5 class="mb-1">Амжилттай</h5>
                            <span>{{ session('attribute-save-message') }}</span>
                        </div>
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger d-flex align-items-center p-5 mb-10">
                        <!--begin::Svg Icon | path: icons/duotone/General/Shield-check.svg-->
                        <span class="svg-icon svg-icon-2hx svg-icon-danger me-4">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"></rect>
                                    <path d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z" fill="#000000" opacity="0.3"></path>
                                    <path d="M11.1750002,14.75 C10.9354169,14.75 10.6958335,14.6541667 10.5041669,14.4625 L8.58750019,12.5458333 C8.20416686,12.1625 8.20416686,11.5875 8.58750019,11.2041667 C8.97083352,10.8208333 9.59375019,10.8208333 9.92916686,11.2041667 L11.1750002,12.45 L14.3375002,9.2875 C14.7208335,8.90416667 15.2958335,8.90416667 15.6791669,9.2875 C16.0625002,9.67083333 16.0625002,10.2458333 15.6791669,10.6291667 L11.8458335,14.4625 C11.6541669,14.6541667 11.4145835,14.75 11.1750002,14.75 Z" fill="#000000"></path>
                                </g>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                        <div class="d-flex flex-column">
                            <h5 class="mb-1">Алдаа</h5>
                            <span>{{ session('error') }}</span>
                        </div>
                    </div>
                @endif
                <!--begin::Scroll-->
                <div class="d-flex flex-column scroll-y me-n7 pe-7">

                    <!--begin::User form-->
                    <div id="">
                        <div class="mb-20">
                            <h4 class="fw-bolder fs-4 mb-10">Ерөнхий мэдээлэл</h4> 
                            <!--begin::Input group-->
                            {{-- <div class="mb-7">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold mb-2">
                                    <span>Зураг солих</span>
                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Allowed file types: png, jpg, jpeg."></i>
                                </label>
                                <!--end::Label-->
                                <!--begin::Image input wrapper-->
                                <div class="mt-1">
                                    <!--begin::Image input-->
                                    <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url({{ asset('assets/media/avatars/blank.png') }})">
                                        <!--begin::Preview existing avatar-->
                                        <div class="image-input-wrapper w-125px h-125px" style="background-image: url({{ asset('assets/media/avatars/blank.png') }})"></div>
                                        <!--end::Preview existing avatar-->
                                        <!--begin::Edit-->
                                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                            <i class="bi bi-pencil-fill fs-7"></i>
                                            <!--begin::Inputs-->
                                            <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
                                            <input type="hidden" name="avatar_remove" />
                                            <!--end::Inputs-->
                                        </label>
                                        <!--end::Edit-->
                                        <!--begin::Cancel-->
                                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                            <i class="bi bi-x fs-2"></i>
                                        </span>
                                        <!--end::Cancel-->
                                        <!--begin::Remove-->
                                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                                            <i class="bi bi-x fs-2"></i>
                                        </span>
                                        <!--end::Remove-->
                                    </div>
                                    <!--end::Image input-->
                                </div>
                                <!--end::Image input wrapper-->
                            </div> --}}
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-8">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold mb-2">Нэр</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" class="form-control form-control-solid" placeholder="" wire:model.defer="customer.name" />
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-8">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold mb-2">Утас</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" maxlength="8" class="form-control form-control-solid" placeholder="" wire:model.defer="customer.phone_primary" />
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-10">
                                <!--begin::Label-->
                                <label class="fs-6 fw-bold mb-2">
                                    <span>И-мэйл хаяг</span>
                                </label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="email" class="form-control form-control-solid" placeholder="" wire:model.defer="customer.email" />
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                        </div>
                       
                        @if (!empty($customer['addresses']))
                            <h4 class="fw-bolder fs-4 mb-10">Бүртгэлтэй хаяг ({{ count($customer['addresses']) }})</h4> 
                            <div class="accordion">
                                @foreach ($customer['addresses'] as $address_index => $address)
                                    <div class="accordion-item" id="address_accordion">
                                        <div class="accordion-header" id="address_accordion_header_{{$address_index}}">
                                            <button class="accordion-button fs-5 fw-bold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#address_accordion_body_{{$address_index}}" aria-expanded="false" aria-controls="address_accordion_body_{{$address_index}}">
                                                {{ $address['address_name'] }}
                                            </button>
                                        </div>

                                        <div id="address_accordion_body_{{$address_index}}" class="accordion-collapse collapse" aria-labelledby="address_accordion_header_{{$address_index}}" data-bs-parent="#address_accordion" wire:ignore.self>
                                            <div class="p-5">
                                                <div class="row mb-5">
                                                    <label class="col-md-4 fs-6 fw-bold mb-2"><span>Хаяг</span></label>
                                                    <div class="col-md-8">
                                                        <input type="text" wire:model.defer="customer.addresses.{{$address_index}}.address_name" class="form-control form-control-solid">
                                                    </div>
                                                </div>
                                                <div class="row mb-5">
                                                    <label class="col-md-4 fs-6 fw-bold mb-2"><span>Аймаг / Хот</span></label>
                                                    <div class="col-md-8">
                                                        <select class="form-select form-select-solid" wire:model="customer.addresses.{{$address_index}}.city">
                                                            @foreach ($mn_address as $city)
                                                                <option value="{{ $city['name'] }}">{{ $city['name'] }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-5">
                                                    <label class="col-md-4 fs-6 fw-bold mb-2"><span>Сум / Дүүрэг</span></label>
                                                    <div class="col-md-8">
                                                        <select class="form-select form-select-solid" wire:model="customer.addresses.{{$address_index}}.district">
                                                            @foreach ($mn_address as $city)
                                                                @if ($city['name'] == $customer['addresses'][$address_index]['city'])
                                                                    @foreach ($city['sub'] as $district)
                                                                        <option value="{{ $district['name'] }}">{{ $district['name'] }}</option>
                                                                    @endforeach
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-5">
                                                    <label class="col-md-4 fs-6 fw-bold mb-2"><span>Баг / Хороо</span></label>
                                                    <div class="col-md-8">
                                                        <select class="form-select form-select-solid" wire:model="customer.addresses.{{$address_index}}.khoroo">
                                                            @foreach ($mn_address as $city)
                                                                @if ($city['name'] == $customer['addresses'][$address_index]['city'])
                                                                    @foreach ($city['sub'] as $district)
                                                                        @if ($district['name'] == $customer['addresses'][$address_index]['district'])
                                                                            @foreach ($district['sub'] as $khoroo)
                                                                                <option value="{{ $khoroo['name'] }}">{{ $khoroo['name'] }}</option>
                                                                            @endforeach
                                                                        @endif
                                                                    @endforeach
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
        
                                                <div class="row mb-5">
                                                    <label class="col-md-4 fs-6 fw-bold mb-2"><span>Дэлгэрэнгүй хаяг</span></label>
                                                    <div class="col-md-8">
                                                        <textarea class="form-control form-control-solid" wire:model.defer="customer.addresses.{{$address_index}}.address" cols="30" rows="3"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>

                                        
                                    </div>
                                @endforeach
                            </div>
                        @endif
                        
                    </div>
                    <!--end::User form-->
                    
                </div>
                <!--end::Scroll-->
            </div>
            <!--end::Modal body-->
            <!--begin::Modal footer-->
            <div class="modal-footer flex-center">
                <!--begin::Button-->
                <button type="button" class="btn btn-primary" wire:click="save()">Хадгалах</button>
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Цуцлах</button>
                <!--end::Button-->
            </div>
            <!--end::Modal footer-->
        </form>
        <!--end::Form-->
    </div>
</div>