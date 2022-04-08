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
                    d.id    = jQuery('#search_id').val();                                      
                },
            },
            columns: [
                { data: 'id' },
                { data: 'id' },
                { data: 'status' },
                { data: 'customer_id' },
                { data: 'address_id' },
                { data: 'shipping_id' },
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
                        return '#'+data;
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
            subscriptions_table.draw();
        } );
        
    </script>
@endsection
