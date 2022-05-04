@extends('layouts.admin')
@section('toolbar')
<!--begin::Container-->
<div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
    <!--begin::Page title-->
    <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
        <!--begin::Title-->
        <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">Лог</h1>
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
            <li class="breadcrumb-item text-dark">Системийн лог</li>
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
                
            </div>
            <div class="card-toolbar">
                <div class="d-flex justify-content-end" data-kt-order-table-toolbar="base">
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
                                {{-- <div class="mb-10">
                                    <label class="form-label fs-6 fw-bold">Month:</label>
                                    <select class="form-select form-select-solid fw-bolder" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-kt-subscription-table-filter="month" data-hide-search="true">
                                        <option></option>
                                        <option value="jan">January</option>
                                        <option value="feb">February</option>
                                        <option value="mar">March</option>
                                        <option value="apr">April</option>
                                        <option value="may">May</option>
                                        <option value="jun">June</option>
                                        <option value="jul">July</option>
                                        <option value="aug">August</option>
                                        <option value="sep">September</option>
                                        <option value="oct">October</option>
                                        <option value="nov">November</option>
                                        <option value="dec">December</option>
                                    </select>
                                </div> --}}
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="mb-5">
                                    <label class="form-label fs-6 fw-bold">Төлөв:</label>
                                    <select id="filter_status" class="form-select form-select-solid fw-bolder" data-kt-select2="true" data-placeholder="Төлөв сонгох" data-allow-clear="true" data-hide-search="true">
                                        <option value="">Бүгд</option>
                                        <option value="completed">Гүйцэтгэж дууссан</option>
                                        <option value="processing">Бэлтгэж байгаа</option>
                                        <option value="on-hold">Төлбөр төлөгдөөгүй</option>
                                        <option value="cancelled">Цуцлагдсан</option>
                                        <option value="trashed">Устгагдсан</option>
                                    </select>
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="mb-5">
                                    <label class="form-label fs-6 fw-bold">Утас:</label>
                                    <input id="filter_customer_phone" type="tel" placeholder="Утасны дугаар" class="form-control form-control-solid fw-bolder">
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="mb-5">
                                    <label class="form-label fs-6 fw-bold">И-мэйл:</label>
                                    <input id="filter_customer_email" type="email" placeholder="И-мэйл хаяг" class="form-control form-control-solid fw-bolder">
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
        </div>
        <div class="card-body pt-0">
            <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer" id="activitylog_table">
                <thead>
                    <tr class="fw-bold fs-6 text-muted">
                        <th></th>
                        <th>Нэр</th>
                        <th>Модел</th>
                        <th>Үйлдэл</th>
                        <th>Тайлбар</th>
                        <th>Гүйцэтгэгч</th>
                        <th>Дэлгэрэнгүй</th>
                        <th>Огноо</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 fw-bold">
                </tbody> 
            </table>
            
        </div>
    </div>

  
@endsection

@section('styles')

@endsection

@section('scripts')
    <script>
        var log_table  = $("#activitylog_table").DataTable({
            processing: true,
            responsive: false,
            serverSide: true,
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
                url: "{{ route('activitylog.json') }}",
                type: 'GET',
                dataType: "json",
                data: function(d) {  
                    /* FILTER BOX */
                    d.id        = jQuery('#search_id').val();
                    d.date      = jQuery('#filter_daterange').val();
                },
            },
            columns: [
                { data: 'id' },
                { data: 'log_name' },
                { data: 'subject_type' },
                { data: 'event' },
                { data: 'description' },
                { data: 'causer_id' },
                { data: 'properties' },
                { data: 'created_at' }
            ],
            columnDefs: [
                {
                    targets:   0,
                    render: function(data,type,full,meta) {
                        return '<div class="form-check form-check-sm form-check-custom form-check-solid"><input class="form-check-input" type="checkbox" value="'+data+'"></div>';
                    }
                },
                {
                    targets:   1,
                    render: function(data,type,full,meta) {
                        return '<span class="badge badge-light">'+data+'</span>';
                    }
                },
                {
                    targets:   3,
                    render: function(data,type,full,meta) {
                        return '<span class="badge badge-light-primary">'+data+'</span>';
                    }
                },
                {
                    targets:   5,
                    render: function(data,type,full,meta) {
                        return full.causer_type + ': ' + data;
                    }
                },
                {
                    targets:   6,
                    render: function(data,type,full,meta) {
                       return null;
                    }
                }
            ]
        });

        
    </script>
@endsection
