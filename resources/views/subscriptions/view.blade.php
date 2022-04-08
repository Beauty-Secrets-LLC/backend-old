@extends('layouts.admin')
@section('toolbar')
<!--begin::Container-->
<div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
    <!--begin::Page title-->
    <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
        <!--begin::Title-->
        <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">Subscription #{{ $subscription['id'] }}</h1>
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
            <li class="breadcrumb-item text-muted">Жагсаалт</li>
            <!--end::Item-->
            <!--begin::Item-->
            <li class="breadcrumb-item">
               <span class="bullet bg-gray-200 w-5px h-2px"></span>
            </li>
            <!--end::Item--> 
            <!--begin::Item-->
            <li class="breadcrumb-item text-dark">Subscription #{{ $subscription['id'] }}</li>
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
    <div class="d-flex flex-column flex-lg-row">
        <!--begin::Content-->
        <div class="flex-lg-row-fluid me-lg-15 order-2 order-lg-1 mb-10 mb-lg-0">
            <!--begin::Card-->
            @livewire('subscription.detail', ['subscription' => $subscription])
            <!--end::Card-->
            <!--begin::Card-->
            @livewire('transaction.card-transaction', ['card_id' => $subscription['card_id'], 'local_transactions' => $subscription['transactions']])
            <!--end::Card-->
        </div>
        <!--end::Content-->
        <!--begin::Sidebar-->
        <div class="flex-column flex-lg-row-auto w-lg-250px w-xl-300px mb-10 order-1 order-lg-2">
            <!--begin::Card-->
            <div class="card card-flush mb-0" data-kt-sticky="true" data-kt-sticky-name="subscription-summary" data-kt-sticky-offset="{default: false, lg: '200px'}" data-kt-sticky-width="{lg: '250px', xl: '300px'}" data-kt-sticky-left="auto" data-kt-sticky-top="150px" data-kt-sticky-animation="false" data-kt-sticky-zindex="95">
                <!--begin::Card header-->
                <div class="card-header">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <h2>Хураангуй</h2>
                    </div>
                    <!--end::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <!--begin::More options-->
                        <a href="#" class="btn btn-sm btn-light btn-icon" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen052.svg-->
                            <span class="svg-icon svg-icon-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect x="10" y="10" width="4" height="4" rx="2" fill="currentColor"></rect>
                                    <rect x="17" y="10" width="4" height="4" rx="2" fill="currentColor"></rect>
                                    <rect x="3" y="10" width="4" height="4" rx="2" fill="currentColor"></rect>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </a>
                        <!--begin::Menu-->
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-6 w-200px py-4" data-kt-menu="true">
                           
                            <!--begin::Menu item-->
                            @if ($subscription['status'] == 1)
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link text-danger px-3">Цуцлах</a>
                                </div>
                            @endif
                            <!--end::Menu item-->
                        </div>
                        <!--end::Menu-->
                        <!--end::More options-->
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0 fs-6">
                    <!--begin::Section-->
                    <div class="mb-7">
                        <!--begin::Details-->
                        <div class="d-flex align-items-center">
                            <!--begin::Avatar-->
                            <div class="symbol symbol-60px symbol-circle me-3">
                                <img alt="Pic" src="{{ asset('assets/media/avatars/150-2.jpg') }}">
                            </div>
                            <!--end::Avatar-->
                            <!--begin::Info-->
                            <div class="d-flex flex-column">
                                <!--begin::Name-->
                                <a href="#" class="fs-4 fw-bolder text-gray-900 text-hover-primary me-2">{{ $subscription['customer']['name'] }}</a>
                                <!--end::Name-->
                                <!--begin::Email-->
                                <a href="#" class="fw-bold text-gray-600 text-hover-primary">{{ $subscription['customer']['email'] }}</a>
                                <!--end::Email-->
                            </div>
                            <!--end::Info-->
                        </div>
                        <!--end::Details-->
                    </div>
                    <!--end::Section-->
                    <!--begin::Seperator-->
                    <div class="separator separator-dashed mb-7"></div>
                    <!--end::Seperator-->
                    <!--begin::Section-->
                    <div class="mb-7">
                        <!--begin::Title-->
                        <h5 class="mb-4">Бүтээгдэхүүн / Үйлчилгээ</h5>
                        <!--end::Title-->
                        <!--begin::Details-->
                        <div class="mb-0">
                            <!--begin::Plan-->
                            <span class="badge badge-light-info me-2">{{ $subscription['plan']['name'] }}</span>
                            <!--end::Plan-->
                            <!--begin::Price-->
                            <span class="fw-bold text-gray-600">{{ number_format($subscription['plan']['amount']) }}₮ / {{$subscription['plan']['sub_type'] }}</span>
                            <!--end::Price-->
                        </div>
                        <!--end::Details-->
                    </div>
                    <!--end::Section-->
                    <!--begin::Seperator-->
                    <div class="separator separator-dashed mb-7"></div>
                    <!--end::Seperator-->
                    <!--begin::Section-->
                    <div class="mb-10">
                        <!--begin::Title-->
                        <h5 class="mb-4">Төлбөр</h5>
                        <!--end::Title-->
                        <!--begin::Details-->
                        <div class="mb-0">
                            <!--begin::Card info-->
                            <div class="fw-bold text-gray-600 d-flex align-items-center">
                                <span class="svg-icon svg-icon-muted svg-icon-2hx" style="margin-right:5px"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M22 7H2V11H22V7Z" fill="currentColor"/>
                                    <path opacity="0.3" d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19ZM14 14C14 13.4 13.6 13 13 13H5C4.4 13 4 13.4 4 14C4 14.6 4.4 15 5 15H13C13.6 15 14 14.6 14 14ZM16 15.5C16 16.3 16.7 17 17.5 17H18.5C19.3 17 20 16.3 20 15.5C20 14.7 19.3 14 18.5 14H17.5C16.7 14 16 14.7 16 15.5Z" fill="currentColor"/>
                                    </svg>
                                </span>
                                <span data-bs-toggle="tooltip" data-bs-custom-class="tooltip-dark" data-bs-placement="bottom" title="{{ $subscription['card_id'] }}">{{ bs_card_format($subscription['card_id']) }}</span>
                            </div>
                            <!--end::Card info-->
                            <!--begin::Card expiry-->
                            <div class="fw-bold text-gray-600">
                                
                                <span class="badge badge-light"></span>
                            </div>
                            <!--end::Card expiry-->
                        </div>
                        <!--end::Details-->
                    </div>
                    <!--end::Section-->
                    <!--begin::Seperator-->
                    <div class="separator separator-dashed mb-7"></div>
                    <!--end::Seperator-->
                    <!--begin::Section-->
                    <div class="mb-10">
                        <!--begin::Title-->
                        <h5 class="mb-4">Бусад мэдээлэл</h5>
                        <!--end::Title-->
                        <!--begin::Details-->
                        <table class="table fs-6 fw-bold gs-0 gy-2 gx-2">
                            <!--begin::Row-->
                            <tbody><tr class="">
                                <td class="text-gray-400">ID:</td>
                                <td class="text-gray-800">BS-{{ $subscription['card_subscribe_id'] }}</td>
                            </tr>
                            <!--end::Row-->
                            <!--begin::Row-->
                            <tr class="">
                                <td class="text-gray-400">Эхэлсэн огноо:</td>
                                <td class="text-gray-800">{{ $subscription['created_at'] }}</td>
                            </tr>
                            <!--end::Row-->
                            <!--begin::Row-->
                            <tr class="">
                                <td class="text-gray-400">Төлөв:</td>
                                <td>
                                    @if ($subscription['status'] == 1)
                                        <span class="badge badge-light-success">Идэвхитэй</span>
                                    @else
                                        <span class="badge badge-light-success">Идэвхигүй</span>
                                    @endif
                                    
                                </td>
                            </tr>
                            <!--end::Row-->
                        </tbody></table>
                        <!--end::Details-->
                    </div>
                    <!--end::Section-->

                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Sidebar-->
    </div>
    
@endsection

@section('styles')

@endsection

@section('scripts')

@endsection
