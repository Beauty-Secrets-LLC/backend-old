@if (!empty($cards))
    <div id="kt_customer_view_payment_method" class="">
        @foreach ($cards as $card)
        <!--begin::Option-->
            <div class="py-0" data-kt-customer-payment-method="row">
                <!--begin::Header-->
                <div class="py-3 d-flex flex-stack flex-wrap">
                    <!--begin::Toggle-->
                    <div class="d-flex align-items-center collapsible collapsed rotate" data-bs-toggle="collapse" href="#customer_card_{{ $card['id'] }}" role="button" aria-expanded="false" aria-controls="customer_card_{{ $card['id'] }}">
                        <!--begin::Arrow-->
                        <div class="me-3 rotate-90">
                            <!--begin::Svg Icon | path: icons/duotone/Navigation/Angle-right.svg-->
                            <span class="svg-icon svg-icon-3">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24" />
                                        <path d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000003, 11.999999) rotate(-270.000000) translate(-12.000003, -11.999999)" />
                                    </g>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </div>
                        <!--end::Arrow-->
                        <!--begin::Logo-->
                
                        <!--begin::Svg Icon | path: assets/media/icons/duotune/finance/fin002.svg-->
                        <span class="svg-icon svg-icon-muted svg-icon-2hx w-40px me-3"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M22 7H2V11H22V7Z" fill="currentColor"/>
                            <path opacity="0.3" d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19ZM14 14C14 13.4 13.6 13 13 13H5C4.4 13 4 13.4 4 14C4 14.6 4.4 15 5 15H13C13.6 15 14 14.6 14 14ZM16 15.5C16 16.3 16.7 17 17.5 17H18.5C19.3 17 20 16.3 20 15.5C20 14.7 19.3 14 18.5 14H17.5C16.7 14 16 14.7 16 15.5Z" fill="currentColor"/>
                        </svg></span>
                            <!--end::Svg Icon-->
                        <!--end::Logo-->
                        <!--begin::Summary-->
                        <div class="me-3">
                            <div class="d-flex align-items-center">
                                <div class="text-gray-800 fw-bolder">{{ ($card['card_name'] == '') ? $card['public_id'] : $card['card_name'] }}</div>
                            </div>
                            <div class="text-muted">{{ $card['created_at'] }}</div>
                        </div>
                        <!--end::Summary-->
                    </div>
                    <!--end::Toggle-->
                    <!--begin::Toolbar-->
                    <div class="d-flex my-3 ms-9">
                        <!--begin::Delete-->
                        <a href="#" class="btn btn-icon btn-active-light-primary w-30px h-30px me-3" data-bs-toggle="tooltip" title="Delete" data-kt-customer-payment-method="delete">
                            <!--begin::Svg Icon | path: icons/duotone/General/Trash.svg-->
                            <span class="svg-icon svg-icon-3 mt-n1">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero" />
                                        <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3" />
                                    </g>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </a>
                        <!--end::Delete-->
                    </div>
                    <!--end::Toolbar-->
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div id="customer_card_{{ $card['id'] }}" class="collapse fs-6 ps-10" data-bs-parent="#kt_customer_view_payment_method">
                    <!--begin::Details-->
                    <div class="d-flex flex-wrap py-5">
                        <!--begin::Col-->
                        <div class="flex-equal me-5">
                            <table class="table table-flush fw-bold gy-1">
                                <tr>
                                    <td class="text-muted min-w-125px w-125px">Нэр</td>
                                    <td class="text-gray-800">{{ $card['card_name'] }}</td>
                                </tr>
                                <tr>
                                    <td class="text-muted min-w-125px w-125px">ID</td>
                                    <td class="text-gray-800">{{ bs_card_format($card['public_id']) }}</td>
                                </tr>
                            </table>
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="flex-equal">
                            <table class="table table-flush fw-bold gy-1">
                                <tr>
                                    <td class="text-muted min-w-150px w-150px">Баталгаажсан</td>
                                    <td class="text-gray-800">{{ ($card['confirmed'] == 1) ? 'Тийм' : 'Үгүй' }}</td>
                                </tr>
                                <tr>
                                    <td class="text-muted min-w-150px w-150px">Бүртгэсэн</td>
                                    <td class="text-gray-800">{{ $card['created_at'] }}</td>
                                </tr>
                                
                            </table>
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Details-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Option-->
            <div class="separator separator-dashed"></div> 
        @endforeach
        
    </div>
@else
    <div class="alert alert-warning text-center">
        Хэрэглэгч карт бүртгээгүй байна.
    </div>
@endif
