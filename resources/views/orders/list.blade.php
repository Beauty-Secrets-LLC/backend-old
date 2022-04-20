@extends('layouts.admin')
@section('toolbar')
<!--begin::Container-->
<div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
    <!--begin::Page title-->
    <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
        <!--begin::Title-->
        <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">Онлайн дэлгүүрийн захиалга</h1>
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
            <li class="breadcrumb-item text-dark">Захиалгууд</li>
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
                    <input type="text" id="search_id" name="search_id" class="form-control form-control-solid w-250px ps-14" placeholder="Захиалгын дугаар" />
                </div>
                <!--end::Search-->
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
                        <!--begin::Export-->
                        <button type="button" class="btn btn-light-primary me-3" data-bs-toggle="modal" data-bs-target="#kt_subscriptions_export_modal">
                        <!--begin::Svg Icon | path: icons/duotone/Files/Export.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <path d="M17,8 C16.4477153,8 16,7.55228475 16,7 C16,6.44771525 16.4477153,6 17,6 L18,6 C20.209139,6 22,7.790861 22,10 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,9.99305689 C2,7.7839179 3.790861,5.99305689 6,5.99305689 L7.00000482,5.99305689 C7.55228957,5.99305689 8.00000482,6.44077214 8.00000482,6.99305689 C8.00000482,7.54534164 7.55228957,7.99305689 7.00000482,7.99305689 L6,7.99305689 C4.8954305,7.99305689 4,8.88848739 4,9.99305689 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,10 C20,8.8954305 19.1045695,8 18,8 L17,8 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                    <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 8.000000) scale(1, -1) rotate(-180.000000) translate(-12.000000, -8.000000)" x="11" y="2" width="2" height="12" rx="1" />
                                    <path d="M12,2.58578644 L14.2928932,0.292893219 C14.6834175,-0.0976310729 15.3165825,-0.0976310729 15.7071068,0.292893219 C16.0976311,0.683417511 16.0976311,1.31658249 15.7071068,1.70710678 L12.7071068,4.70710678 C12.3165825,5.09763107 11.6834175,5.09763107 11.2928932,4.70710678 L8.29289322,1.70710678 C7.90236893,1.31658249 7.90236893,0.683417511 8.29289322,0.292893219 C8.68341751,-0.0976310729 9.31658249,-0.0976310729 9.70710678,0.292893219 L12,2.58578644 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 2.500000) scale(1, -1) translate(-12.000000, -2.500000)" />
                                </g>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->Татаж авах</button>
                        <!--end::Export-->
                </div>
                <!--begin::Group actions-->
                <div class="d-flex justify-content-end align-items-center d-none" data-kt-order-table-toolbar="selected">
                    <div class="fw-bolder me-5">
                    <span class="me-2" data-kt-order-table-select="selected_count"></span>захиалга сонгогдсон</div>
                    <button type="button" class="btn btn-danger" onclick="">Устгах</button>
                </div>
                <!--end::Group actions-->
            </div>
        </div>
        <div class="card-body pt-0">
            <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer" id="order_table">
                <thead>
                    <tr class="fw-bold fs-6 text-muted">
                        <th></th>
                        <th>ID</th>
                        <th>Төлөв</th>
                        <th>Захиалагч</th>
                        
                        <th>Хаяг</th>
                        <th>Хүргэлт</th>
                        <th>Захиалгын дүн</th>
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
        var order_table  = $("#order_table").DataTable({
            processing: true,
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
                url: "{{ route('order.json') }}",
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
                { data: 'id' },
                { data: 'status' },
                { data: 'customer_id' },
                { data: 'address_id' },
                { data: 'delivery_id' },
                { data: 'total' },
                { data: 'created_at' },
            ],
            columnDefs: [
                {
                    targets:0,
                    render: function(data,type,full,meta) {
                        return '<div class="form-check form-check-sm form-check-custom form-check-solid"><input class="form-check-input" type="checkbox" value="'+data+'"></div>'
                    }
                },
                {
                    targets: 1,
                    render: function(data,type,full,meta) {
                        return '<a href="/shop/order/view/'+data+'" target="_blank" class="text-gray-800 text-hover-primary mb-1">#'+data+'</a>';
                    }
                },
                
                {
                    targets:2,
                    render: function(data, type, full, meta) {
                        var status = '';
                        if(data == 'processing') {
                            status = '<span class="badge badge-light-success">Бэлтгэж байгаа</span>';
                        }
                        else if(data == 'completed') {
                            status = '<span class="badge badge-light-primary">Гүйцэтгэж дууссан</span>';
                        }
                        else if(data == 'on-hold') {
                            status = '<span class="badge badge-light-warning">Төлбөр төлөгдөөгүй</span>';
                        }
                        else if(data == 'cancelled') {
                            status = '<span class="badge badge-light-danger">Цуцлагдсан</span>';
                        }
                        return status;
                    }
                },
                {
                    targets:3,
                    render: function(data, type, full, meta) {
                        return '<a target="_blank" class="text-gray-800 text-hover-primary mb-1" href="/customer/view/'+full.customer.id+'">'+full.customer.name + '</a>';
                    }
                },
                {
                    targets:4,
                    render: function(data, type, full, meta) {
                        return full.address.full_address;
                    }
                },
                {
                    targets:6,
                    render: function(data, type, full, meta) {
                        return addCommas(data)+'₮';
                    }
                }
            ]
        });


        function addCommas(nStr) {
            nStr += '';
            x = nStr.split('.');
            x1 = x[0];
            x2 = x.length > 1 ? '.' + x[1] : '';
            var rgx = /(\d+)(\d{3})/;
            while (rgx.test(x1)) {
                x1 = x1.replace(rgx, '$1' + ',' + '$2');
            }
            return x1 + x2;
        }

        // subscriptions_table.on( 'draw', function () {
        //     $('[data-toggle="tooltip"]').tooltip();
        // } );


        $('#search_id').change(function() {
            order_table.draw();
        } );

        $("#filter_daterange").daterangepicker({
            locale: {
                format: "YYYY/MM/DD",
                cancelLabel: 'Цуцлах',
                applyLabel: 'Сонгох'
            },
            startDate: "{{ date('Y/m').'/01' }}",
            endDate: "{{ date('Y/m/t') }}"
        }).on('apply.daterangepicker', function(ev, picker) {
            order_table.draw();
        });;
        
    </script>

    <script src="{{ asset('assets/js/custom/apps/orders/list.js') }}"></script>
@endsection
