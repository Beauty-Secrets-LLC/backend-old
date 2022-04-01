@extends('layouts.admin')
@section('toolbar')
<!--begin::Container-->
<div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
    <!--begin::Page title-->
    <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
        <!--begin::Title-->
        <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">Системийн эрхүүд</h1>
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
            <li class="breadcrumb-item text-muted">Хэрэглэгчид</li>
            <!--end::Item-->
            <!--begin::Item-->
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-200 w-5px h-2px"></span>
            </li>
            <!--end::Item-->
            <!--begin::Item-->
            <li class="breadcrumb-item text-dark">Системийн эрхүүд</li>
            <!--end::Item-->
        </ul>
        <!--end::Breadcrumb-->
    </div>
    <!--end::Page title-->
</div>
<!--end::Container-->
@endsection
@section('content')
    <!--begin::Card-->
    <div class="card card-flush">
        <!--begin::Card header-->
        <div class="card-header mt-6">
            <!--begin::Card title-->
            <div class="card-title">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1 me-5">
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
                    <input type="text" id="search_key" class="form-control form-control-solid w-250px ps-15" placeholder="Системийн эрх хайх" />
                </div>
                <!--end::Search-->
            </div>
            <!--end::Card title-->
            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <div class="d-flex justify-content-end" data-kt-permissions-table-toolbar="base">
                    <!--begin::Button-->
                    <button type="button" class="btn btn-light-primary" data-bs-toggle="modal" data-bs-target="#add_permission">
                        <!--begin::Svg Icon | path: icons/duotone/Interface/Plus-Square.svg-->
                        <span class="svg-icon svg-icon-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path opacity="0.25" fill-rule="evenodd" clip-rule="evenodd" d="M6.54184 2.36899C4.34504 2.65912 2.65912 4.34504 2.36899 6.54184C2.16953 8.05208 2 9.94127 2 12C2 14.0587 2.16953 15.9479 2.36899 17.4582C2.65912 19.655 4.34504 21.3409 6.54184 21.631C8.05208 21.8305 9.94127 22 12 22C14.0587 22 15.9479 21.8305 17.4582 21.631C19.655 21.3409 21.3409 19.655 21.631 17.4582C21.8305 15.9479 22 14.0587 22 12C22 9.94127 21.8305 8.05208 21.631 6.54184C21.3409 4.34504 19.655 2.65912 17.4582 2.36899C15.9479 2.16953 14.0587 2 12 2C9.94127 2 8.05208 2.16953 6.54184 2.36899Z" fill="#12131A" />
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12 17C12.5523 17 13 16.5523 13 16V13H16C16.5523 13 17 12.5523 17 12C17 11.4477 16.5523 11 16 11H13V8C13 7.44772 12.5523 7 12 7C11.4477 7 11 7.44772 11 8V11H8C7.44772 11 7 11.4477 7 12C7 12.5523 7.44771 13 8 13H11V16C11 16.5523 11.4477 17 12 17Z" fill="#12131A" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->Шинээр эрх нэмэх</button>
                        <!--end::Button-->
                </div>
                <!--begin::Group actions-->
                <div class="d-flex justify-content-end align-items-center d-none" data-kt-permissions-table-toolbar="selected">
                    <div class="fw-bolder me-5">
                    <span class="me-2" data-kt-permissions-table-select="selected_count"></span>эрх сонгогдсон байна</div>
                    <button type="button" class="btn btn-danger" onclick="bulkDelete()">Устгах</button>
                </div>
                <!--end::Group actions-->
            </div>
            <!--end::Card toolbar-->
            
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-0">
            <!--begin::Table-->
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="permissions_table">
                <!--begin::Table head-->
                <thead>
                    <!--begin::Table row-->
                    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                        <th></th>
                        <th class="min-w-125px">Нэр</th>
                        {{-- <th class="min-w-250px">Холбосон</th> --}}
                        <th class="min-w-125px">Үүсгэсэн огноо</th>
                        <th class="text-end min-w-100px">Үйлдэл</th>
                    </tr>
                    <!--end::Table row-->
                </thead>
                <!--end::Table head-->
                <tbody>
                    
                </tbody>
            </table>
            <!--end::Table-->
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Card-->
    <!--begin::Modals-->
    @component('components.roles.permission_add_modal')@endcomponent
    <!--begin::Modal - Update permissions-->
    {{-- <div class="modal fade" id="kt_modal_update_permission" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header">
                    <!--begin::Modal title-->
                    <h2 class="fw-bolder">Update Permission</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-permissions-modal-action="close">
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
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                    <!--begin::Notice-->
                    <!--begin::Notice-->
                    <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed mb-9 p-6">
                        <!--begin::Icon-->
                        <!--begin::Svg Icon | path: icons/duotone/Code/Warning-1-circle.svg-->
                        <span class="svg-icon svg-icon-2tx svg-icon-warning me-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
                                <rect fill="#000000" x="11" y="7" width="2" height="8" rx="1" />
                                <rect fill="#000000" x="11" y="16" width="2" height="2" rx="1" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                        <!--end::Icon-->
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-stack flex-grow-1">
                            <!--begin::Content-->
                            <div class="fw-bold">
                                <div class="fs-6 text-gray-700">
                                <strong class="me-1">Warning!</strong>By editing the permission name, you might break the system permissions functionality. Please ensure you're absolutely certain before proceeding.</div>
                            </div>
                            <!--end::Content-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Notice-->
                    <!--end::Notice-->
                    <!--begin::Form-->
                    <form id="kt_modal_update_permission_form" class="form" action="#">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="fs-6 fw-bold form-label mb-2">
                                <span class="required">Permission Name</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-html="true" data-bs-content="Permission names is required to be unique."></i>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input class="form-control form-control-solid" placeholder="Enter a permission name" name="permission_name" />
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Actions-->
                        <div class="text-center pt-15">
                            <button type="reset" class="btn btn-light me-3" data-kt-permissions-modal-action="cancel">Discard</button>
                            <button type="submit" class="btn btn-primary" data-kt-permissions-modal-action="submit">
                                <span class="indicator-label">Submit</span>
                                <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div> --}}
    <!--end::Modal - Update permissions-->
    <!--end::Modals-->
@endsection

@section('styles')
    <meta name="_token" content="{{ csrf_token() }}">
@endsection

@section('scripts')
    <script>
        var permission_table  = $("#permissions_table").DataTable({
            language: {
                search: "Хайлт:",
                infoFiltered: "",
                processing: "Түр хүлээнэ үү ...",
                info:           "Нийт: _TOTAL_ | _START_ - _END_ харуулж байна",
            },
            oLanguage: {
                sLengthMenu: "_MENU_",
                sLoadingRecords: "Түр хүлээнэ үү ...",
                sZeroRecords: "Тохирох эрх олдсонгүй"
            },
            pageLength: 25,
            responsive: true,
            processing: true,
            serverSide: true,
            deferRender: true,
            ajax: {
                url: "{{ route('permissions.json') }}",
                type: 'GET',
                dataType: "json",
                data: function(d) {  
                    d.search_key    = jQuery('#search_key').val();                  
                },
            },
            columns: [
                { data: 'id' },
                { data: 'name' },
                { data: 'created_at' },
                { data: null },
            ],
            columnDefs: [
                {
                    orderable: false,
                    targets:   0,
                    render: function(data,type,full,meta) {
                        return '<div class="form-check form-check-sm form-check-custom form-check-solid"><input class="form-check-input" type="checkbox" value="'+data+'"></div>';
                    }
                },
                {
                    targets: 1,
                    render: function(data, type, full, meta) {
                        return '<span class="badge badge-light-primary">'+data+'</span>';
                    }
                },

                {
                    targets: 3,
                    className: "text-end",
                    render: function(data, type, full, meta) {
                        return '<button value="'+full.id+'" data-action="delete" class="btn btn-icon btn-active-light-primary w-30px h-30px" data-kt-permissions-table-filter="delete_row"><span class="svg-icon svg-icon-3"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"></path><path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"></path><path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"></path></svg></span></button>';
                    }
                },
            ]
        });


        jQuery('#search_key').change(function(){
            permission_table.draw();
        });

        $('#add_permission_form button[type=submit]').click(function(e) {
            e.preventDefault();
            var button = $(this);
            var modal = $('#add_permission');
            button.attr('data-kt-indicator', 'on');
            jQuery.ajax({
                type: "POST",
                url: '/user/permissions/add',
                data: {
                    "_token"        : "{{ csrf_token() }}",
                    permission_name : $('#add_permission_form input[name="permission_name"]').val(),
                },
                dataType:"json",
                success: function(response){
                   
                    if(response) {
                        permission_table.draw();
                        button.removeAttr('data-kt-indicator');
                        Swal.fire({ 
                            text: "Эрхийг амжилттай үүсгэлээ!", 
                            icon: "success", 
                            buttonsStyling: !1, 
                            confirmButtonText: "Ok", 
                            customClass: { confirmButton: "btn btn-primary" } 
                        })
                        .then(function (t) {
                            modal.modal('hide');
                        });
                    }
                }
            })
           
        });
    </script>
    <script src="{{ asset('assets/js/custom/apps/user-management/permissions/list.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/custom/apps/user-management/permissions/add-permission.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/js/custom/apps/user-management/permissions/update-permission.js') }}"></script> --}}
@endsection