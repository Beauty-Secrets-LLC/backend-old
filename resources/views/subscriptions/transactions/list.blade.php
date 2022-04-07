@extends('layouts.admin')
@section('toolbar')
<!--begin::Container-->
<div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
    <!--begin::Page title-->
    <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
        <!--begin::Title-->
        <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">Гүйлгээ</h1>
        <!--end::Title-->
        <!--begin::Separator-->
        <span class="h-20px border-gray-200 border-start mx-4"></span>
        <!--end::Separator-->
        <!--begin::Breadcrumb-->
        <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
            <!--begin::Item-->
            <li class="breadcrumb-item text-muted">
                <a href="/" class="text-muted text-hover-primary">Эхлэл</a>
            </li>
            <!--end::Item-->
            <!--begin::Item-->
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-200 w-5px h-2px"></span>
            </li>
            <!--end::Item-->
            <!--begin::Item-->
            <li class="breadcrumb-item text-muted">Subscription</li>
            <!--end::Item-->
            <!--begin::Item-->
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-200 w-5px h-2px"></span>
            </li>
            <!--end::Item-->
            <!--begin::Item-->
            <li class="breadcrumb-item text-dark">Гүйлгээ</li>
            <!--end::Item-->
        </ul>
        <!--end::Breadcrumb-->
    </div>
    <!--end::Page title-->
</div>
<!--end::Container-->
@endsection
@section('content')
    @if (session('success'))
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
            <span>{{ session('success') }}</span>
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

    <div class="card card-flush">
        <div class="card-header border-0 pt-6">
            <div class="card-title">
                

                <div class="d-flex align-items-center position-relative my-1 mx-3">
                    <span class="svg-icon svg-icon-1 position-absolute ms-6">
                        <!--begin::Svg Icon | path: assets/media/icons/duotune/files/fil002.svg-->
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21" fill="none">
                            <path opacity="0.3" d="M19 3.40002C18.4 3.40002 18 3.80002 18 4.40002V8.40002H14V4.40002C14 3.80002 13.6 3.40002 13 3.40002C12.4 3.40002 12 3.80002 12 4.40002V8.40002H8V4.40002C8 3.80002 7.6 3.40002 7 3.40002C6.4 3.40002 6 3.80002 6 4.40002V8.40002H2V4.40002C2 3.80002 1.6 3.40002 1 3.40002C0.4 3.40002 0 3.80002 0 4.40002V19.4C0 20 0.4 20.4 1 20.4H19C19.6 20.4 20 20 20 19.4V4.40002C20 3.80002 19.6 3.40002 19 3.40002ZM18 10.4V13.4H14V10.4H18ZM12 10.4V13.4H8V10.4H12ZM12 15.4V18.4H8V15.4H12ZM6 10.4V13.4H2V10.4H6ZM2 15.4H6V18.4H2V15.4ZM14 18.4V15.4H18V18.4H14Z" fill="currentColor"/>
                            <path d="M19 0.400024H1C0.4 0.400024 0 0.800024 0 1.40002V4.40002C0 5.00002 0.4 5.40002 1 5.40002H19C19.6 5.40002 20 5.00002 20 4.40002V1.40002C20 0.800024 19.6 0.400024 19 0.400024Z" fill="currentColor"/>
                        </svg>
                        <!--end::Svg Icon-->
                    </span>
                    <input type="text" class="form-control form-control-solid  w-250px ps-16" placeholder="" id="filter_daterange"/>
                </div>

                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1">
                    <!--begin::Svg Icon | path: icons/duotone/General/Search.svg-->
                    <span class="svg-icon svg-icon-1 position-absolute ms-6">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24" />
                                <path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                <path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero" />
                            </g>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                    <input type="text" id="search_key" name="search" class="form-control form-control-solid w-250px ps-14" placeholder="Гүйлгээ хайх" autocomplete="off" />
                </div>
                <!--end::Search-->
            </div>

            <div class="card-toolbar">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end" data-kt-product-table-toolbar="base">
                    <!--begin::Filter-->
                    <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
                    <!--begin::Svg Icon | path: icons/duotone/Text/Filter.svg-->
                    <span class="svg-icon svg-icon-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M6.5 11C8.98528 11 11 8.98528 11 6.5C11 4.01472 8.98528 2 6.5 2C4.01472 2 2 4.01472 2 6.5C2 8.98528 4.01472 11 6.5 11Z" fill="currentColor"/>
                            <path opacity="0.3" d="M13 6.5C13 4 15 2 17.5 2C20 2 22 4 22 6.5C22 9 20 11 17.5 11C15 11 13 9 13 6.5ZM6.5 22C9 22 11 20 11 17.5C11 15 9 13 6.5 13C4 13 2 15 2 17.5C2 20 4 22 6.5 22ZM17.5 22C20 22 22 20 22 17.5C22 15 20 13 17.5 13C15 13 13 15 13 17.5C13 20 15 22 17.5 22Z" fill="currentColor"/>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->Тохиргоо</button>
                    <!--begin::Menu 1-->
                    <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
                        <!--begin::Header-->
                        <div class="px-7 py-5 ">
                            <div class="fs-5 text-dark fw-bolder">Хүснэгтийн багана</div>
                        </div>
                        <!--end::Header-->
                        <!--begin::Separator-->
                        <div class="separator border-gray-200"></div>
                        <!--end::Separator-->
                        <!--begin::Content-->
                        <div class="px-7 py-5" data-kt-product-table-filter="form">
                            <!--begin::Input group-->

                            
                            <div class="mb-5">
                                <!--begin::Switch-->
                                <div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                   <input class="form-check-input toggle-column" type="checkbox" value="3" name="" checked>
                                   <label class="form-check-label">Reference дугаар</label>
                                </div>
                                <!--end::Switch-->
                            </div>

                            <div class="mb-5">
                                <!--begin::Switch-->
                                <div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                <input class="form-check-input toggle-column" type="checkbox" value="4" name="" checked>
                                <label class="form-check-label">ID</label>
                                </div>
                                <!--end::Switch-->
                            </div>


                            <div class="mb-5">
                                 <!--begin::Switch-->
                                 <div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                    <input class="form-check-input toggle-column" type="checkbox" value="6" name="" checked>
                                    <label class="form-check-label">Карт</label>
                                </div>
                                <!--end::Switch-->
                            </div>

                            <div class="mb-5">
                                <!--begin::Switch-->
                                <div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                    <input class="form-check-input toggle-column" type="checkbox" value="7" name="">
                                    <label class="form-check-label">Хүргэлтийн хаяг</label>
                                </div>
                                <!--end::Switch-->
                            </div>

                            <div class="mb-5">
                                <!--begin::Switch-->
                                <div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                    <input class="form-check-input toggle-column" type="checkbox" value="8" name="">
                                    <label class="form-check-label">Гүйлгээ хийсэн</label>
                                </div>
                                <!--end::Switch-->
                            </div>

                            <div class="mb-5">
                                <!--begin::Switch-->
                                <div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                    <input class="form-check-input toggle-column" type="checkbox" value="9" name="" checked>
                                    <label class="form-check-label">Огноо</label>
                                </div>
                                <!--end::Switch-->
                            </div>

                            <div class="separator my-10"></div>

                            <div class="mb-5">
                                <a href="#" class="btn btn-primary d-block">
                                    <!--begin::Svg Icon | path: assets/media/icons/duotune/files/fil017.svg-->
                                    <span class="svg-icon svg-icon-muted"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path opacity="0.3" d="M10 4H21C21.6 4 22 4.4 22 5V7H10V4Z" fill="currentColor"/>
                                        <path opacity="0.3" d="M13 14.4V9C13 8.4 12.6 8 12 8C11.4 8 11 8.4 11 9V14.4H13Z" fill="currentColor"/>
                                        <path d="M10.4 3.60001L12 6H21C21.6 6 22 6.4 22 7V19C22 19.6 21.6 20 21 20H3C2.4 20 2 19.6 2 19V4C2 3.4 2.4 3 3 3H9.20001C9.70001 3 10.2 3.20001 10.4 3.60001ZM13 14.4V9C13 8.4 12.6 8 12 8C11.4 8 11 8.4 11 9V14.4H8L11.3 17.7C11.7 18.1 12.3 18.1 12.7 17.7L16 14.4H13Z" fill="currentColor"/>
                                        </svg></span>
                                        <!--end::Svg Icon-->
                                    .xlsx файл
                                </a>
                            </div>
                            
                            <!--end::Input group-->
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Menu 1-->
                    <!--end::Filter-->
                </div>
                <!--end::Toolbar-->

                <div class="d-flex justify-content-end" data-kt-product-table-toolbar="base">
                    <!--begin::Filter-->
                    <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
                    <!--begin::Svg Icon | path: icons/duotone/Text/Filter.svg-->
                    <span class="svg-icon svg-icon-2">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24" />
                                <path d="M5,4 L19,4 C19.2761424,4 19.5,4.22385763 19.5,4.5 C19.5,4.60818511 19.4649111,4.71345191 19.4,4.8 L14,12 L14,20.190983 C14,20.4671254 13.7761424,20.690983 13.5,20.690983 C13.4223775,20.690983 13.3458209,20.6729105 13.2763932,20.6381966 L10,19 L10,12 L4.6,4.8 C4.43431458,4.5790861 4.4790861,4.26568542 4.7,4.1 C4.78654809,4.03508894 4.89181489,4 5,4 Z" fill="#000000" />
                            </g>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->Шүүлт</button>
                    <!--begin::Menu 1-->
                    <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
                        <!--begin::Header-->
                        <div class="px-7 py-5">
                            <div class="fs-5 text-dark fw-bolder">Шүүх талбарууд</div>
                        </div>
                        <!--end::Header-->
                        <!--begin::Separator-->
                        <div class="separator border-gray-200"></div>
                        <!--end::Separator-->
                        <!--begin::Content-->
                        <div class="px-7 py-5" data-kt-product-table-filter="form">
                            <!--begin::Input group-->
                            <div class="mb-5">
                                <label class="form-label fs-6 fw-bold">Гүйлгээний төрөл:</label>
                                <select id="filter_type" class="form-select form-select-solid fw-bolder" data-kt-select2="true" data-placeholder="Төлөв сонгох" data-allow-clear="true" data-hide-search="true">
                                    <option value="">Бүгд</option>
                                    <option value="pre_purchase_subscription">Шууд татсан</option>
                                    <option value="subscribe_buyout">Хуваарьт төлөлт</option>
                                </select>
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="mb-10">
                                <label class="form-label fs-6 fw-bold">Үйлчилгээ:</label>
                                <select id="filter_plans" class="form-select form-select-solid fw-bolder" data-kt-select2="true" data-placeholder="Ангилал сонгох" data-allow-clear="true" data-hide-search="true" multiple >
                                    @if (!empty($plans))
                                        @foreach ($plans as $plan_id => $plan)
                                            <option value="{{ $plan_id }}">{{ $plan }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            
                            <!--end::Input group-->
                            <!--begin::Actions-->
                            <div class="d-flex justify-content-end">
                                <button type="reset" class="btn btn-light btn-active-light-primary fw-bold me-2 px-6" data-kt-menu-dismiss="true" data-kt-subscription-table-filter="reset">Цуцлах</button>
                                <button type="button" id="apply_filter" class="btn btn-primary fw-bold px-6" data-kt-menu-dismiss="true">Шүүж харах</button>
                            </div>
                            <!--end::Actions-->
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Menu 1-->
                    <!--end::Filter-->
                   
                </div>
            </div>
            <!--end::Card toolbar-->
        </div>
        <div class="card-body pt-0">
            <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer" id="transaction_table">
                <thead>
                    <tr class="fw-bold fs-6 text-muted">
                        <th></th>
                        <th>Үйлчилгээ</th>
                        <th>Төрөл</th>
                        <th>Reference</th>
                        <th>ID</th>
                        <th>Дүн</th>
                        <th>Карт</th>
                        <th>Хүргэх хаяг</th>
                        <th>Гүйлгээ хийсэн</th>
                        <th>Огноо</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 fw-bold"></tbody>
                
            </table>
            
        </div>
    </div>
    
@endsection

@section('styles')

@endsection

@section('scripts')
    <script>
        var transaction_table  = $("#transaction_table").DataTable({

            processing: true,
            serverSide: true,
            deferRender: true,
            ordering: false,
            scrollX: true,
            pageLength: 50,
            language: {
                search: "Хайлт:",
                infoFiltered: "",
                processing: "Түр хүлээнэ үү ...",
                info:           "Нийт: _TOTAL_ | _START_ - _END_ харуулж байна",
            },
            oLanguage: {
                sLengthMenu: "_MENU_",
                sLoadingRecords: "Түр хүлээнэ үү ...",
                sZeroRecords: "Тохирох хүсэлт олдсонгүй"
            },
            ajax: {
                url: "{{ route('transaction.json') }}",
                type: 'GET',
                dataType: "json",
                data: function(d) {  
                    /* FILTER BOX */    
                    d.search_key    = jQuery('#search_key').val();                     
                    d.type          = jQuery('#filter_type').val();                     
                    d.plans         = jQuery('#filter_plans').val();                     
                    d.date          = jQuery('#filter_daterange').val();                     
                },
            },
            columns: [
                { data: 'id' },
                { data: 'subscription_plan_id' },
                { data: 'type' },
                { data: 'reference_number' },
                { data: 'transaction_id' },
                { data: 'amount' },
                { data: 'card_id' },
                { data: null },
                { data: null },
                { data: 'created_at' },
            ],
            columnDefs: [
                {
                    orderable: false,
                    targets:   0,
                    render: function(data,type,full,meta) {
                        return '<div class="form-check form-check-sm form-check-custom form-check-solid"><input class="form-check-input" type="checkbox" value="'+data+'"></div>'
                    }
                },
                {
                    targets:1,
                    render: function(data, type, full, meta) {
                        return full.plan.name;
                    }
                },

                {
                    targets:2,
                    render: function(data, type, full, meta) {
                        if(data == 'pre_purchase_subscription') {
                            return '<div class="badge badge-light-success fw-bolder">Шууд татсан</div>';
                        }
                            
                        else if(data == 'subscribe_buyout') {
                            return '<div class="badge badge-light-success fw-bolder">Хуваарьт төлөлт</div>';
                        }
                        else {
                            return '';
                        }
                    }
                },
                {
                    targets:7,
                    visible:false,
                    render: function(data, type, full, meta) {
                        return full.subscription.address.full_address;
                    }
                },
                {
                    targets:8,
                    visible:false,
                    render: function(data, type, full, meta) {
                        return full.subscription.customer.email;
                    }
                }
            ]
        });

        $('#search_key').on( 'keyup', function () {
            transaction_table.search( this.value ).draw();
        } );


        $('.toggle-column').change(function(){
            var column = transaction_table.column( $(this).val() );
            column.visible( ! column.visible() );
        });

        jQuery('#apply_filter').click(function(){
            transaction_table.draw();
        });

        $("#filter_daterange").daterangepicker({
            locale: {
                format: "YYYY/MM/DD",
                cancelLabel: 'Цуцлах',
                applyLabel: 'Сонгох'
            },
            startDate: "{{ date('Y/m').'/01' }}",
            endDate: "{{ date('Y/m/t') }}"
        });
    </script>
@endsection
