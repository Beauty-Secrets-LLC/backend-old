@extends('layouts.admin')
@section('toolbar')
<!--begin::Container-->
<div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
    <!--begin::Page title-->
    <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
        <!--begin::Title-->
        <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">Шинэ загвар</h1>
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
            <li class="breadcrumb-item text-muted">
                <a href="/" class="text-muted text-hover-primary">Бэлгийн карт</a>
            </li>
            <!--end::Item-->
            <!--begin::Item-->
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-200 w-5px h-2px"></span>
            </li>
            <!--end::Item-->
            <!--begin::Item-->
            <li class="breadcrumb-item text-dark">Бэлгийн картын загвар бүтээх</li>
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

<div class="card mb-5 mb-xl-10">
    <!--begin::Card header-->
    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
        <!--begin::Card title-->
        <div class="card-title m-0">
            <h3 class="fw-bolder m-0">Бэлгийн картын мэдээлэл</h3>
        </div>
        <!--end::Card title-->
    </div>
    <!--begin::Card header-->
    <!--begin::Content-->
    <form  class="form" method="POST" action="{{ route('giftcardtemplate.store') }}" enctype="multipart/form-data">
        @csrf
        <!--begin::Card body-->
        <div class="card-body border-top p-9">
            <!--begin::Input group-->
            <div class="row mb-6">
                <!--begin::Label-->
                <label class="required col-lg-4 col-form-label fw-bold fs-6">Загвар</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8">
                    <!--begin::Image input-->
                    <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url({{ asset('assets/media/products/giftcard-placeholder.png') }})">
                        <!--begin::Preview existing avatar-->
                        <div class="image-input-wrapper w-500px h-300px" style="background-image: url({{$template->getFirstMedia('giftcard-image')->getUrl() }})"></div>
                        <!--end::Preview existing avatar-->
                        <!--begin::Label-->
                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Зураг шинэчлэх">
                            <i class="bi bi-pencil-fill fs-7"></i>
                            <!--begin::Inputs-->
                            <input required  type="file" name="template_image" accept=".png, .jpg, .jpeg" />
                            <input type="hidden" name="avatar_remove" />
                            <!--end::Inputs-->
                        </label>
                        <!--end::Label-->
                       
                    </div>
                    <!--end::Image input-->
                    <!--begin::Hint-->
                    <div class="form-text">Зөвшөөрөгдөх файлын төрлүүд: png, jpg, jpeg.</div>
                    <!--end::Hint-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="row mb-6">
                <!--begin::Label-->
                <label class="col-lg-4 col-form-label required fw-bold fs-6">Загварын нэр</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8 fv-row">
                    <input type="text" required name="template_name" class="form-control form-control-lg form-control-solid" placeholder="" value="{{ $template->template_name }}" />
                </div>
                <!--end::Col-->
            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="row mb-6">
                <!--begin::Label-->
                <label class="col-lg-4 col-form-label required fw-bold fs-6">Загварын нэр</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8 fv-row">
                    <div class="form-check form-switch form-check-custom form-check-solid">
                        <input class="form-check-input " type="checkbox" {{ ($template->status == 1) ? 'checked' : ''}} name="status" value="1" />
                        <label class="form-check-label" >
                            Идэвхитэй
                        </label>
                    </div>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Input group-->
        </div>
        <!--end::Card body-->
        <!--begin::Actions-->
        <div class="card-footer d-flex justify-content-end py-6 px-9">
            <button type="submit" class="btn btn-primary">Нэмэх</button>
            
            <button type="submit" class="btn btn-primary">Нэмэх</button>
        </div>
        <!--end::Actions-->
    </form>
    <!--end::Content-->
</div>
@endsection

@section('styles')

@endsection

@push('js')

@endpush