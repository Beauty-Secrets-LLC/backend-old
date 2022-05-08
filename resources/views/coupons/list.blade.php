@extends('layouts.admin')
@section('toolbar')
<!--begin::Container-->
<div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
    <!--begin::Page title-->
    <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
        <!--begin::Title-->
        <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">Купон код</h1>
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
            <li class="breadcrumb-item text-muted">
                <span class="text-muted">Маркетинг</span>
            </li>
            <!--end::Item-->
            <!--begin::Item-->
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-200 w-5px h-2px"></span>
            </li>
            <!--end::Item-->
            <!--begin::Item-->
            <li class="breadcrumb-item text-dark">Купон</li>
            <!--end::Item-->  
        </ul>
        <!--end::Breadcrumb-->
    </div>
    <!--end::Page title-->
</div>
<!--end::Container-->
@endsection
@section('content')
    @livewire('coupon.list-table')
@endsection

@section('styles')

@endsection

@push('js')
    <script>
        const toolbarBase       = $('[data-coupon-table-toolbar="base"]');
        const toolbarSelected   = $('[data-coupon-table-toolbar="selected"]');
        const selectedCount     = $('[data-coupon-table-select="selected_count"]');

        $('body').on('change', '#coupon_table tbody [type="checkbox"]', function(){
            var selected = $('#coupon_table tbody [type="checkbox"]:checked').map(function(){
                return $(this).val();
            }).get();
            if(selected.length) {
                selectedCount.html(selected.length);
                toolbarBase.addClass('d-none');
                toolbarSelected.removeClass('d-none');
            } else {
                toolbarBase.removeClass('d-none');
                toolbarSelected.addClass('d-none');
            }
        });

        function delete_coupon() {
            var selected = $('#coupon_table tbody [type="checkbox"]:checked').map(function(){
                return $(this).val();
            }).get();

            Swal.fire({
                title: 'Та итгэлтэй байна уу?',
                html: "Сонгогдсон купон кодыг устгах гэж байна уу?",
                icon: 'warning',
                showCancelButton: true,
                customClass: {
                    confirmButton: 'btn btn-primary',
                    cancelButton: 'btn btn-light',
                },
                cancelButtonText: 'Үгүй',
                confirmButtonText: 'Тийм'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('coupons:delete', selected );
                }
            })
        }
    </script>
@endpush