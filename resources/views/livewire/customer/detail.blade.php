<div>
    <!--begin::Summary-->
    <div class="d-flex flex-center flex-column mb-5">
        <!--begin::Avatar-->
        <div class="symbol symbol-100px symbol-circle mb-7">
            <img src="{{ asset('assets/media/avatars/blank.png') }}" alt="image" />
        </div>
        <!--end::Avatar-->
        <!--begin::Name-->
        <a href="#" class="fs-3 text-gray-800 text-hover-primary fw-bolder mb-1">{{ $customer['name'] }}</a>
        <!--end::Name-->
        <!--begin::Position-->
        <div class="badge badge-light-info d-inline">ВИП хэрэглэгч</div>
        <!--end::Position-->
    </div>
    <!--end::Summary-->
    <!--begin::Details toggle-->
    <div class="d-flex flex-stack fs-4 py-3">
        <div class="fw-bolder rotate collapsible" data-bs-toggle="collapse" href="#kt_customer_view_details" role="button" aria-expanded="false" aria-controls="kt_customer_view_details">Дэлгэрэнгүй мэдээлэл
        <span class="ms-2 rotate-180">
            <!--begin::Svg Icon | path: icons/duotone/Navigation/Angle-down.svg-->
            <span class="svg-icon svg-icon-3">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <polygon points="0 0 24 0 24 24 0 24" />
                        <path d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000003, 11.999999) rotate(-180.000000) translate(-12.000003, -11.999999)" />
                    </g>
                </svg>
            </span>
            <!--end::Svg Icon-->
        </span></div>
        <span data-bs-toggle="tooltip" data-bs-trigger="hover" title="Мэдээлэл шинэчлэх">
            <a href="#" class="btn btn-sm btn-light-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_update_customer">Засах</a>
        </span>
    </div>
    <!--end::Details toggle-->
    <div class="separator separator-dashed my-2"></div>
    <!--begin::Details content-->
    <div id="kt_customer_view_details" class="collapse show">
        <div class="py-5 fs-6">
            <!--begin::Details item-->
            <div class="fw-bolder mt-5">И-мэйл хаяг</div>
            <div class="text-gray-600">
                <a href="#" class="text-gray-600 text-hover-primary">{{ $customer['email'] }}</a>
            </div>
            <!--begin::Details item--> 

            <!--begin::Details item-->
            <div class="fw-bolder mt-5">Утасны дугаар</div>
            <div class="text-gray-600">{{ $customer['phone_primary'] }}</div>
            <!--begin::Details item-->

            <!--begin::Details item-->
            <div class="fw-bolder mt-5 mb-3">Төрсөн огноо:</div>
            <div class="text-gray-600">{!! isset($customer['data']['birthdate']) ? $customer['data']['birthdate'] : '<span class="badge badge-light">Мэдээлэл оруулаагүй</span>' !!}</div>
            <!--begin::Details item-->
            
        </div>
    </div>
    <!--end::Details content-->

    <!--begin::Details toggle-->
    <div class="d-flex flex-stack fs-4 py-3">
        <div class="fw-bolder rotate collapsible" data-bs-toggle="collapse" href="#kt_customer_address" role="button" aria-expanded="false" aria-controls="kt_customer_view_details">Бүртгэлтэй хаягууд ({{ count($customer['addresses'])}})
        <span class="ms-2 rotate-180">
            <!--begin::Svg Icon | path: icons/duotone/Navigation/Angle-down.svg-->
            <span class="svg-icon svg-icon-3">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <polygon points="0 0 24 0 24 24 0 24" />
                        <path d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000003, 11.999999) rotate(-180.000000) translate(-12.000003, -11.999999)" />
                    </g>
                </svg>
            </span>
            <!--end::Svg Icon-->
        </span></div>
    </div>
    <div class="separator separator-dashed my-2"></div>
    <!--end::Details toggle-->
    <div id="kt_customer_address" class="collapse show">
        <div class="py-5 fs-6">
            <!--begin::Details item-->
            @if (!empty($customer['addresses']))
                @foreach ($customer['addresses'] as $address)
                    <div class="fw-bolder">{{ $address['address_name'] }}</div>
                    <div class="text-gray-600 mb-5">
                        {{ $address['city']  }},
                        {{ $address['district']  }},
                        {{ $address['khoroo']  }},
                        {{ $address['address']  }}
                    </div>
                @endforeach
            @endif
            
            <!--begin::Details item-->
        </div>
    </div>
</div>
