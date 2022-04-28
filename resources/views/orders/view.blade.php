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

<div class="d-flex flex-column gap-7 gap-lg-10">
    <div class="d-flex flex-wrap flex-stack gap-5 gap-lg-10">
        <!--begin:::Tabs-->
        <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-lg-n2 me-auto">
            <!--begin:::Tab item-->
            <li class="nav-item">
                <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab" href="#summary">Захиалгын мэдээлэл</a>
            </li>
            <!--end:::Tab item-->
            <!--begin:::Tab item-->
            <li class="nav-item">
                <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#history">Захиалгын түүх</a>
            </li>
            <!--end:::Tab item-->
        </ul>
        <!--end:::Tabs-->
        <!--begin::Button-->
        <a href="{{ url()->previous() }}" class="btn btn-icon btn-light-primary btn-sm ms-auto me-lg-n7">
            <!--begin::Svg Icon | path: icons/duotune/arrows/arr074.svg-->
            <span class="svg-icon svg-icon-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M11.2657 11.4343L15.45 7.25C15.8642 6.83579 15.8642 6.16421 15.45 5.75C15.0358 5.33579 14.3642 5.33579 13.95 5.75L8.40712 11.2929C8.01659 11.6834 8.01659 12.3166 8.40712 12.7071L13.95 18.25C14.3642 18.6642 15.0358 18.6642 15.45 18.25C15.8642 17.8358 15.8642 17.1642 15.45 16.75L11.2657 12.5657C10.9533 12.2533 10.9533 11.7467 11.2657 11.4343Z" fill="currentColor"></path>
                </svg>
            </span>
            <!--end::Svg Icon-->
        </a>
        <!--end::Button-->
        <!--begin::Button-->
        <a href="#" class="btn btn-light-primary btn-sm">Засах</a>
        <!--end::Button-->
    </div>

    <div class="d-flex flex-column flex-xl-row gap-7 gap-lg-10">
        <!--begin::Order details-->
        <div class="card card-flush py-4 flex-row-fluid">
            <!--begin::Card header-->
            <div class="card-header">
                <div class="card-title">
                    <h2>Захиалга</h2>
                </div>
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-0">
                <div class="table-responsive">
                    <!--begin::Table-->
                    <table class="table align-middle table-row-bordered mb-0 fs-6 gy-5 min-w-300px">
                        <!--begin::Table body-->
                        <tbody class="fw-bold text-gray-600">
                            <!--begin::Date-->
                            <tr>
                                <td class="text-muted">
                                    <div class="d-flex align-items-center">
                                    <!--begin::Svg Icon | path: icons/duotune/files/fil002.svg-->
                                    <span class="svg-icon svg-icon-2 me-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3" d="M20 22H4C3.4 22 3 21.6 3 21V2H21V21C21 21.6 20.6 22 20 22Z" fill="currentColor"/>
                                            <path d="M12 14C9.2 14 7 11.8 7 9V5C7 4.4 7.4 4 8 4C8.6 4 9 4.4 9 5V9C9 10.7 10.3 12 12 12C13.7 12 15 10.7 15 9V5C15 4.4 15.4 4 16 4C16.6 4 17 4.4 17 5V9C17 11.8 14.8 14 12 14Z" fill="currentColor"/>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->Дугаар</div>
                                </td>
                                <td class="fw-bolder text-end">#{{ $order['id'] }}</td>
                            </tr>
                            <tr>
                                <td class="text-muted">
                                    <div class="d-flex align-items-center">
                                    <!--begin::Svg Icon | path: icons/duotune/files/fil002.svg-->
                                    <span class="svg-icon svg-icon-2 me-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21" fill="none">
                                            <path opacity="0.3" d="M19 3.40002C18.4 3.40002 18 3.80002 18 4.40002V8.40002H14V4.40002C14 3.80002 13.6 3.40002 13 3.40002C12.4 3.40002 12 3.80002 12 4.40002V8.40002H8V4.40002C8 3.80002 7.6 3.40002 7 3.40002C6.4 3.40002 6 3.80002 6 4.40002V8.40002H2V4.40002C2 3.80002 1.6 3.40002 1 3.40002C0.4 3.40002 0 3.80002 0 4.40002V19.4C0 20 0.4 20.4 1 20.4H19C19.6 20.4 20 20 20 19.4V4.40002C20 3.80002 19.6 3.40002 19 3.40002ZM18 10.4V13.4H14V10.4H18ZM12 10.4V13.4H8V10.4H12ZM12 15.4V18.4H8V15.4H12ZM6 10.4V13.4H2V10.4H6ZM2 15.4H6V18.4H2V15.4ZM14 18.4V15.4H18V18.4H14Z" fill="currentColor"></path>
                                            <path d="M19 0.400024H1C0.4 0.400024 0 0.800024 0 1.40002V4.40002C0 5.00002 0.4 5.40002 1 5.40002H19C19.6 5.40002 20 5.00002 20 4.40002V1.40002C20 0.800024 19.6 0.400024 19 0.400024Z" fill="currentColor"></path>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->Захиалга өгсөн</div>
                                </td>
                                <td class="fw-bolder text-end">{{ $order['created_at'] }}</td>
                            </tr>
                            <!--end::Date-->
                            <tr>
                                <td class="text-muted">
                                    <div class="d-flex align-items-center">
                                    <!--begin::Svg Icon | path: icons/duotune/files/fil002.svg-->
                                    <span class="svg-icon svg-icon-2 me-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="21" viewBox="0 0 14 21" fill="none">
                                            <path opacity="0.3" d="M12 6.20001V1.20001H2V6.20001C2 6.50001 2.1 6.70001 2.3 6.90001L5.6 10.2L2.3 13.5C2.1 13.7 2 13.9 2 14.2V19.2H12V14.2C12 13.9 11.9 13.7 11.7 13.5L8.4 10.2L11.7 6.90001C11.9 6.70001 12 6.50001 12 6.20001Z" fill="currentColor"/>
                                            <path d="M13 2.20001H1C0.4 2.20001 0 1.80001 0 1.20001C0 0.600012 0.4 0.200012 1 0.200012H13C13.6 0.200012 14 0.600012 14 1.20001C14 1.80001 13.6 2.20001 13 2.20001ZM13 18.2H10V16.2L7.7 13.9C7.3 13.5 6.7 13.5 6.3 13.9L4 16.2V18.2H1C0.4 18.2 0 18.6 0 19.2C0 19.8 0.4 20.2 1 20.2H13C13.6 20.2 14 19.8 14 19.2C14 18.6 13.6 18.2 13 18.2ZM4.4 6.20001L6.3 8.10001C6.7 8.50001 7.3 8.50001 7.7 8.10001L9.6 6.20001H4.4Z" fill="currentColor"/>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->Төлөв</div>
                                </td>
                                <td class="fw-bolder text-end">
                                    @if ($order['status'] == 'processing')
                                        <span class="badge badge-light-success">Бэлтгэж байгаа</span>
                                    @elseif($order['status'] == 'completed')
                                        <span class="badge badge-light-primary">Гүйцэтгэж дууссан</span>
                                    @elseif($order['status'] == 'on-hold')
                                        <span class="badge badge-light-warning">Төлбөр төлөгдөөгүй</span>
                                    @elseif($order['status'] == 'cancelled')
                                        <span class="badge badge-light-danger">Цуцлагдсан</span>
                                    @endif
                                    
                                </td>
                            </tr>
                            <!--begin::Payment method-->
                            <tr>
                                <td class="text-muted">
                                    <div class="d-flex align-items-center">
                                    <!--begin::Svg Icon | path: icons/duotune/finance/fin008.svg-->
                                    <span class="svg-icon svg-icon-2 me-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3" d="M3.20001 5.91897L16.9 3.01895C17.4 2.91895 18 3.219 18.1 3.819L19.2 9.01895L3.20001 5.91897Z" fill="currentColor"></path>
                                            <path opacity="0.3" d="M13 13.9189C13 12.2189 14.3 10.9189 16 10.9189H21C21.6 10.9189 22 11.3189 22 11.9189V15.9189C22 16.5189 21.6 16.9189 21 16.9189H16C14.3 16.9189 13 15.6189 13 13.9189ZM16 12.4189C15.2 12.4189 14.5 13.1189 14.5 13.9189C14.5 14.7189 15.2 15.4189 16 15.4189C16.8 15.4189 17.5 14.7189 17.5 13.9189C17.5 13.1189 16.8 12.4189 16 12.4189Z" fill="currentColor"></path>
                                            <path d="M13 13.9189C13 12.2189 14.3 10.9189 16 10.9189H21V7.91895C21 6.81895 20.1 5.91895 19 5.91895H3C2.4 5.91895 2 6.31895 2 6.91895V20.9189C2 21.5189 2.4 21.9189 3 21.9189H19C20.1 21.9189 21 21.0189 21 19.9189V16.9189H16C14.3 16.9189 13 15.6189 13 13.9189Z" fill="currentColor"></path>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->Төлбөр</div>
                                </td>
                                <td class="fw-bolder text-end">
                                    <span style="cursor:pointer" class="text-gray-800 text-hover-primary" data-bs-toggle="modal" data-bs-target="#payment_data">{{ $order['invoice']['payment_method']['name'] }}</span>
                                </td>
                            </tr>
                            <!--end::Payment method-->
                            <!--begin::Date-->
                            <tr>
                                <td class="text-muted">
                                    <div class="d-flex align-items-center">
                                    <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm006.svg-->
                                    <span class="svg-icon svg-icon-2 me-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M20 8H16C15.4 8 15 8.4 15 9V16H10V17C10 17.6 10.4 18 11 18H16C16 16.9 16.9 16 18 16C19.1 16 20 16.9 20 18H21C21.6 18 22 17.6 22 17V13L20 8Z" fill="currentColor"></path>
                                            <path opacity="0.3" d="M20 18C20 19.1 19.1 20 18 20C16.9 20 16 19.1 16 18C16 16.9 16.9 16 18 16C19.1 16 20 16.9 20 18ZM15 4C15 3.4 14.6 3 14 3H3C2.4 3 2 3.4 2 4V13C2 13.6 2.4 14 3 14H15V4ZM6 16C4.9 16 4 16.9 4 18C4 19.1 4.9 20 6 20C7.1 20 8 19.1 8 18C8 16.9 7.1 16 6 16Z" fill="currentColor"></path>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->Хүргэлт</div>
                                </td>
                                <td class="fw-bolder text-end">Flat Shipping Rate</td>
                            </tr>
                            <!--end::Date-->
                        </tbody>
                        <!--end::Table body-->
                    </table>
                    <!--end::Table-->
                </div>
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Order details-->
        <!--begin::Customer details-->
        <div class="card card-flush py-4 flex-row-fluid">
            <!--begin::Card header-->
            <div class="card-header">
                <div class="card-title">
                    <h2>Захиалагч</h2>
                </div>
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-0">
                <div class="table-responsive">
                    <!--begin::Table-->
                    <table class="table align-middle table-row-bordered mb-0 fs-6 gy-5 min-w-300px">
                        <!--begin::Table body-->
                        <tbody class="fw-bold text-gray-600">
                            <!--begin::Customer name-->
                            <tr>
                                <td class="text-muted">
                                    <div class="d-flex align-items-center">
                                    <!--begin::Svg Icon | path: icons/duotune/communication/com006.svg-->
                                    <span class="svg-icon svg-icon-2 me-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3" d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM12 7C10.3 7 9 8.3 9 10C9 11.7 10.3 13 12 13C13.7 13 15 11.7 15 10C15 8.3 13.7 7 12 7Z" fill="currentColor"></path>
                                            <path d="M12 22C14.6 22 17 21 18.7 19.4C17.9 16.9 15.2 15 12 15C8.8 15 6.09999 16.9 5.29999 19.4C6.99999 21 9.4 22 12 22Z" fill="currentColor"></path>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->Нэр</div>
                                </td>
                                <td class="fw-bolder text-end">
                                    <div class="d-flex align-items-center justify-content-end">
                                        <!--begin:: Avatar -->
                                        <div class="symbol symbol-circle symbol-25px overflow-hidden me-3">
                                            <a target="_blank" href="{{ route('customer.view', $order['customer']['id']) }}">
                                                <div class="symbol-label">
                                                    <img src="{{ asset('assets/media/avatars/blank.png') }}" class="w-100">
                                                </div>
                                            </a>
                                        </div>
                                        <!--end::Avatar-->
                                        <!--begin::Name-->
                                        <a target="_blank" href="{{ route('customer.view', $order['customer']['id']) }}" class="text-gray-600 text-hover-primary">{{ $order['customer']['name'] }}</a>
                                        <!--end::Name-->
                                    </div>
                                </td>
                            </tr>
                            <!--end::Customer name-->
                            <!--begin::Customer email-->
                            <tr>
                                <td class="text-muted">
                                    <div class="d-flex align-items-center">
                                    <!--begin::Svg Icon | path: icons/duotune/communication/com011.svg-->
                                    <span class="svg-icon svg-icon-2 me-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3" d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z" fill="currentColor"></path>
                                            <path d="M21 5H2.99999C2.69999 5 2.49999 5.10005 2.29999 5.30005L11.2 13.3C11.7 13.7 12.4 13.7 12.8 13.3L21.7 5.30005C21.5 5.10005 21.3 5 21 5Z" fill="currentColor"></path>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->И-мэйл</div>
                                </td>
                                <td class="fw-bolder text-end">
                                    <a href="mailto:{{ $order['customer_email'] }}" class="text-gray-600 text-hover-primary">{{ $order['customer_email'] }}</a>
                                </td>
                            </tr>
                            <!--end::Payment method-->
                            <!--begin::Date-->
                            <tr>
                                <td class="text-muted">
                                    <div class="d-flex align-items-center">
                                    <!--begin::Svg Icon | path: icons/duotune/electronics/elc003.svg-->
                                    <span class="svg-icon svg-icon-2 me-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M5 20H19V21C19 21.6 18.6 22 18 22H6C5.4 22 5 21.6 5 21V20ZM19 3C19 2.4 18.6 2 18 2H6C5.4 2 5 2.4 5 3V4H19V3Z" fill="currentColor"></path>
                                            <path opacity="0.3" d="M19 4H5V20H19V4Z" fill="currentColor"></path>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->Утас</div>
                                </td>
                                <td class="fw-bolder text-end"><a class="text-gray-600 text-hover-primary" href="tel:{{ $order['customer_phone'] }}">{{ $order['customer_phone'] }}</a></td>
                            </tr>
                            <!--end::Date-->
                            <tr>
                                <td class="text-muted">
                                    <div class="d-flex align-items-center">
                                    <!--begin::Svg Icon | path: icons/duotune/electronics/elc003.svg-->
                                    <span class="svg-icon svg-icon-2 me-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3" d="M6 22H4V3C4 2.4 4.4 2 5 2C5.6 2 6 2.4 6 3V22Z" fill="currentColor"/>
                                            <path d="M18 14H4V4H18C18.8 4 19.2 4.9 18.7 5.5L16 9L18.8 12.5C19.3 13.1 18.8 14 18 14Z" fill="currentColor"/>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->Аймаг / Хот</div>
                                </td>
                                <td class="fw-bolder text-end">{{ $order['address']['city'] }}</td>
                            </tr>
                            <tr>
                                <td class="text-muted">
                                    <div class="d-flex align-items-center">
                                    <!--begin::Svg Icon | path: icons/duotune/electronics/elc003.svg-->
                                    <span class="svg-icon svg-icon-2 me-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3" d="M6 22H4V3C4 2.4 4.4 2 5 2C5.6 2 6 2.4 6 3V22Z" fill="currentColor"/>
                                            <path d="M18 14H4V4H18C18.8 4 19.2 4.9 18.7 5.5L16 9L18.8 12.5C19.3 13.1 18.8 14 18 14Z" fill="currentColor"/>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->Сум / Дүүрэг</div>
                                </td>
                                <td class="fw-bolder text-end">{{ $order['address']['district'] }}</td>
                            </tr>
                            <tr>
                                <td class="text-muted">
                                    <div class="d-flex align-items-center">
                                    <!--begin::Svg Icon | path: icons/duotune/electronics/elc003.svg-->
                                    <span class="svg-icon svg-icon-2 me-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3" d="M6 22H4V3C4 2.4 4.4 2 5 2C5.6 2 6 2.4 6 3V22Z" fill="currentColor"/>
                                            <path d="M18 14H4V4H18C18.8 4 19.2 4.9 18.7 5.5L16 9L18.8 12.5C19.3 13.1 18.8 14 18 14Z" fill="currentColor"/>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->Баг / Хороо</div>
                                </td>
                                <td class="fw-bolder text-end">{{ $order['address']['khoroo'] }}</td>
                            </tr>
                            <tr>
                                <td class="text-muted">
                                    <div class="d-flex align-items-center">
                                    <!--begin::Svg Icon | path: icons/duotune/electronics/elc003.svg-->
                                    <span class="svg-icon svg-icon-2 me-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M11 2.375L2 9.575V20.575C2 21.175 2.4 21.575 3 21.575H9C9.6 21.575 10 21.175 10 20.575V14.575C10 13.975 10.4 13.575 11 13.575H13C13.6 13.575 14 13.975 14 14.575V20.575C14 21.175 14.4 21.575 15 21.575H21C21.6 21.575 22 21.175 22 20.575V9.575L13 2.375C12.4 1.875 11.6 1.875 11 2.375Z" fill="currentColor"/>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->Хаяг</div>
                                </td>
                                <td class="fw-bolder text-end">{{ $order['address']['address'] }}</td>
                            </tr>
                        </tbody>
                        <!--end::Table body-->
                    </table>
                    <!--end::Table-->
                </div>
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Customer details-->
        <!--begin::Documents-->
        <div class="card card-flush py-4 flex-row-fluid">
            <!--begin::Card header-->
            <div class="card-header">
                <div class="card-title">
                    <h2>Бусад баримт</h2>
                </div>
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-0">
                <div class="table-responsive">
                    <!--begin::Table-->
                    <table class="table align-middle table-row-bordered mb-0 fs-6 gy-5 min-w-300px">
                        <!--begin::Table body-->
                        <tbody class="fw-bold text-gray-600">
                            <!--begin::Invoice-->
                            <tr>
                                <td class="text-muted">
                                    <div class="d-flex align-items-center">
                                    <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm008.svg-->
                                    <span class="svg-icon svg-icon-2 me-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3" d="M18 21.6C16.3 21.6 15 20.3 15 18.6V2.50001C15 2.20001 14.6 1.99996 14.3 2.19996L13 3.59999L11.7 2.3C11.3 1.9 10.7 1.9 10.3 2.3L9 3.59999L7.70001 2.3C7.30001 1.9 6.69999 1.9 6.29999 2.3L5 3.59999L3.70001 2.3C3.50001 2.1 3 2.20001 3 3.50001V18.6C3 20.3 4.3 21.6 6 21.6H18Z" fill="currentColor"></path>
                                            <path d="M12 12.6H11C10.4 12.6 10 12.2 10 11.6C10 11 10.4 10.6 11 10.6H12C12.6 10.6 13 11 13 11.6C13 12.2 12.6 12.6 12 12.6ZM9 11.6C9 11 8.6 10.6 8 10.6H6C5.4 10.6 5 11 5 11.6C5 12.2 5.4 12.6 6 12.6H8C8.6 12.6 9 12.2 9 11.6ZM9 7.59998C9 6.99998 8.6 6.59998 8 6.59998H6C5.4 6.59998 5 6.99998 5 7.59998C5 8.19998 5.4 8.59998 6 8.59998H8C8.6 8.59998 9 8.19998 9 7.59998ZM13 7.59998C13 6.99998 12.6 6.59998 12 6.59998H11C10.4 6.59998 10 6.99998 10 7.59998C10 8.19998 10.4 8.59998 11 8.59998H12C12.6 8.59998 13 8.19998 13 7.59998ZM13 15.6C13 15 12.6 14.6 12 14.6H10C9.4 14.6 9 15 9 15.6C9 16.2 9.4 16.6 10 16.6H12C12.6 16.6 13 16.2 13 15.6Z" fill="currentColor"></path>
                                            <path d="M15 18.6C15 20.3 16.3 21.6 18 21.6C19.7 21.6 21 20.3 21 18.6V12.5C21 12.2 20.6 12 20.3 12.2L19 13.6L17.7 12.3C17.3 11.9 16.7 11.9 16.3 12.3L15 13.6V18.6Z" fill="currentColor"></path>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->Нэхэмжлэх 
                                    </div>
                                </td>
                                <td class="fw-bolder text-end">
                                    <a href="#" class="text-gray-600 text-hover-primary">#{{ $order['invoice']['id'] }}</a>
                                </td>
                            </tr>
                            <!--end::Invoice-->
                            <!--begin::Shipping-->
                            <tr>
                                <td class="text-muted">
                                    <div class="d-flex align-items-center">
                                    <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm006.svg-->
                                    <span class="svg-icon svg-icon-2 me-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M20 8H16C15.4 8 15 8.4 15 9V16H10V17C10 17.6 10.4 18 11 18H16C16 16.9 16.9 16 18 16C19.1 16 20 16.9 20 18H21C21.6 18 22 17.6 22 17V13L20 8Z" fill="currentColor"></path>
                                            <path opacity="0.3" d="M20 18C20 19.1 19.1 20 18 20C16.9 20 16 19.1 16 18C16 16.9 16.9 16 18 16C19.1 16 20 16.9 20 18ZM15 4C15 3.4 14.6 3 14 3H3C2.4 3 2 3.4 2 4V13C2 13.6 2.4 14 3 14H15V4ZM6 16C4.9 16 4 16.9 4 18C4 19.1 4.9 20 6 20C7.1 20 8 19.1 8 18C8 16.9 7.1 16 6 16Z" fill="currentColor"></path>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->Хүргэлтийн код
                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Хүртгэлтийн явцыг хянах код"></i></div>
                                </td>
                                <td class="fw-bolder text-end">
                                    <a href="#" class="text-gray-600 text-hover-primary">#SHP-0025410</a>
                                </td>
                            </tr>
                            <!--end::Shipping-->
                            <!--begin::Rewards-->
                            <tr>
                                <td class="text-muted">
                                    <div class="d-flex align-items-center">
                                    <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm011.svg-->
                                    <span class="svg-icon svg-icon-2 me-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3" d="M21.6 11.2L19.3 8.89998V5.59993C19.3 4.99993 18.9 4.59993 18.3 4.59993H14.9L12.6 2.3C12.2 1.9 11.6 1.9 11.2 2.3L8.9 4.59993H5.6C5 4.59993 4.6 4.99993 4.6 5.59993V8.89998L2.3 11.2C1.9 11.6 1.9 12.1999 2.3 12.5999L4.6 14.9V18.2C4.6 18.8 5 19.2 5.6 19.2H8.9L11.2 21.5C11.6 21.9 12.2 21.9 12.6 21.5L14.9 19.2H18.2C18.8 19.2 19.2 18.8 19.2 18.2V14.9L21.5 12.5999C22 12.1999 22 11.6 21.6 11.2Z" fill="currentColor"></path>
                                            <path d="M11.3 9.40002C11.3 10.2 11.1 10.9 10.7 11.3C10.3 11.7 9.8 11.9 9.2 11.9C8.8 11.9 8.40001 11.8 8.10001 11.6C7.80001 11.4 7.50001 11.2 7.40001 10.8C7.20001 10.4 7.10001 10 7.10001 9.40002C7.10001 8.80002 7.20001 8.4 7.30001 8C7.40001 7.6 7.7 7.29998 8 7.09998C8.3 6.89998 8.7 6.80005 9.2 6.80005C9.5 6.80005 9.80001 6.9 10.1 7C10.4 7.1 10.6 7.3 10.8 7.5C11 7.7 11.1 8.00005 11.2 8.30005C11.3 8.60005 11.3 9.00002 11.3 9.40002ZM10.1 9.40002C10.1 8.80002 10 8.39998 9.90001 8.09998C9.80001 7.79998 9.6 7.70007 9.2 7.70007C9 7.70007 8.8 7.80002 8.7 7.90002C8.6 8.00002 8.50001 8.2 8.40001 8.5C8.40001 8.7 8.30001 9.10002 8.30001 9.40002C8.30001 9.80002 8.30001 10.1 8.40001 10.4C8.40001 10.6 8.5 10.8 8.7 11C8.8 11.1 9 11.2001 9.2 11.2001C9.5 11.2001 9.70001 11.1 9.90001 10.8C10 10.4 10.1 10 10.1 9.40002ZM14.9 7.80005L9.40001 16.7001C9.30001 16.9001 9.10001 17.1 8.90001 17.1C8.80001 17.1 8.70001 17.1 8.60001 17C8.50001 16.9 8.40001 16.8001 8.40001 16.7001C8.40001 16.6001 8.4 16.5 8.5 16.4L14 7.5C14.1 7.3 14.2 7.19998 14.3 7.09998C14.4 6.99998 14.5 7 14.6 7C14.7 7 14.8 6.99998 14.9 7.09998C15 7.19998 15 7.30002 15 7.40002C15.2 7.30002 15.1 7.50005 14.9 7.80005ZM16.6 14.2001C16.6 15.0001 16.4 15.7 16 16.1C15.6 16.5 15.1 16.7001 14.5 16.7001C14.1 16.7001 13.7 16.6 13.4 16.4C13.1 16.2 12.8 16 12.7 15.6C12.5 15.2 12.4 14.8001 12.4 14.2001C12.4 13.3001 12.6 12.7 12.9 12.3C13.2 11.9 13.7 11.7001 14.5 11.7001C14.8 11.7001 15.1 11.8 15.4 11.9C15.7 12 15.9 12.2 16.1 12.4C16.3 12.6 16.4 12.9001 16.5 13.2001C16.6 13.4001 16.6 13.8001 16.6 14.2001ZM15.4 14.1C15.4 13.5 15.3 13.1 15.2 12.9C15.1 12.6 14.9 12.5 14.5 12.5C14.3 12.5 14.1 12.6001 14 12.7001C13.9 12.8001 13.8 13.0001 13.7 13.2001C13.6 13.4001 13.6 13.8 13.6 14.1C13.6 14.7 13.7 15.1 13.8 15.4C13.9 15.7 14.1 15.8 14.5 15.8C14.8 15.8 15 15.7 15.2 15.4C15.3 15.2 15.4 14.7 15.4 14.1Z" fill="currentColor"></path>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->Цуглуулсан оноо
                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Худалдан авалтын дүнгээс хамаарч хэрэгэлэгчийн цуглуулах оноо"></i></div>
                                </td>
                                <td class="fw-bolder text-end">600</td>
                            </tr>
                            <!--end::Rewards-->

                            @if (isset($order['vat']['billId']))
                                <tr>
                                    <td class="text-muted">
                                        <div class="d-flex align-items-center">
                                        <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm011.svg-->
                                        <span class="svg-icon svg-icon-2 me-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3" d="M21.6 11.2L19.3 8.89998V5.59993C19.3 4.99993 18.9 4.59993 18.3 4.59993H14.9L12.6 2.3C12.2 1.9 11.6 1.9 11.2 2.3L8.9 4.59993H5.6C5 4.59993 4.6 4.99993 4.6 5.59993V8.89998L2.3 11.2C1.9 11.6 1.9 12.1999 2.3 12.5999L4.6 14.9V18.2C4.6 18.8 5 19.2 5.6 19.2H8.9L11.2 21.5C11.6 21.9 12.2 21.9 12.6 21.5L14.9 19.2H18.2C18.8 19.2 19.2 18.8 19.2 18.2V14.9L21.5 12.5999C22 12.1999 22 11.6 21.6 11.2Z" fill="currentColor"/>
                                                <path d="M11.3 9.40002C11.3 10.2 11.1 10.9 10.7 11.3C10.3 11.7 9.8 11.9 9.2 11.9C8.8 11.9 8.40001 11.8 8.10001 11.6C7.80001 11.4 7.50001 11.2 7.40001 10.8C7.20001 10.4 7.10001 10 7.10001 9.40002C7.10001 8.80002 7.20001 8.4 7.30001 8C7.40001 7.6 7.7 7.29998 8 7.09998C8.3 6.89998 8.7 6.80005 9.2 6.80005C9.5 6.80005 9.80001 6.9 10.1 7C10.4 7.1 10.6 7.3 10.8 7.5C11 7.7 11.1 8.00005 11.2 8.30005C11.3 8.60005 11.3 9.00002 11.3 9.40002ZM10.1 9.40002C10.1 8.80002 10 8.39998 9.90001 8.09998C9.80001 7.79998 9.6 7.70007 9.2 7.70007C9 7.70007 8.8 7.80002 8.7 7.90002C8.6 8.00002 8.50001 8.2 8.40001 8.5C8.40001 8.7 8.30001 9.10002 8.30001 9.40002C8.30001 9.80002 8.30001 10.1 8.40001 10.4C8.40001 10.6 8.5 10.8 8.7 11C8.8 11.1 9 11.2001 9.2 11.2001C9.5 11.2001 9.70001 11.1 9.90001 10.8C10 10.4 10.1 10 10.1 9.40002ZM14.9 7.80005L9.40001 16.7001C9.30001 16.9001 9.10001 17.1 8.90001 17.1C8.80001 17.1 8.70001 17.1 8.60001 17C8.50001 16.9 8.40001 16.8001 8.40001 16.7001C8.40001 16.6001 8.4 16.5 8.5 16.4L14 7.5C14.1 7.3 14.2 7.19998 14.3 7.09998C14.4 6.99998 14.5 7 14.6 7C14.7 7 14.8 6.99998 14.9 7.09998C15 7.19998 15 7.30002 15 7.40002C15.2 7.30002 15.1 7.50005 14.9 7.80005ZM16.6 14.2001C16.6 15.0001 16.4 15.7 16 16.1C15.6 16.5 15.1 16.7001 14.5 16.7001C14.1 16.7001 13.7 16.6 13.4 16.4C13.1 16.2 12.8 16 12.7 15.6C12.5 15.2 12.4 14.8001 12.4 14.2001C12.4 13.3001 12.6 12.7 12.9 12.3C13.2 11.9 13.7 11.7001 14.5 11.7001C14.8 11.7001 15.1 11.8 15.4 11.9C15.7 12 15.9 12.2 16.1 12.4C16.3 12.6 16.4 12.9001 16.5 13.2001C16.6 13.4001 16.6 13.8001 16.6 14.2001ZM15.4 14.1C15.4 13.5 15.3 13.1 15.2 12.9C15.1 12.6 14.9 12.5 14.5 12.5C14.3 12.5 14.1 12.6001 14 12.7001C13.9 12.8001 13.8 13.0001 13.7 13.2001C13.6 13.4001 13.6 13.8 13.6 14.1C13.6 14.7 13.7 15.1 13.8 15.4C13.9 15.7 14.1 15.8 14.5 15.8C14.8 15.8 15 15.7 15.2 15.4C15.3 15.2 15.4 14.7 15.4 14.1Z" fill="currentColor"/>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->И-баримт
                                    </td>
                                    <td class="fw-bolder text-end">
                                        {{ $order['vat']['billId'] }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-muted">
                                        <div class="d-flex align-items-center">
                                        <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm011.svg-->
                                        <span class="svg-icon svg-icon-2 me-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path d="M6.28548 15.0861C7.34369 13.1814 9.35142 12 11.5304 12H12.4696C14.6486 12 16.6563 13.1814 17.7145 15.0861L19.3493 18.0287C20.0899 19.3618 19.1259 21 17.601 21H6.39903C4.87406 21 3.91012 19.3618 4.65071 18.0287L6.28548 15.0861Z" fill="currentColor"/>
                                                <rect opacity="0.3" x="8" y="3" width="8" height="8" rx="4" fill="currentColor"/>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->И-баримт төрөл
                                    </td>
                                    <td class="fw-bolder text-end">
                                        @if ($order['vat']['type'] == 1)
                                            Хувь хүн
                                        @else
                                            Байгууллага
                                        @endif
                                    </td>
                                </tr>
                                @if ($order['vat']['type'] == 2)
                                    <tr>
                                        <td class="text-muted">
                                            <div class="d-flex align-items-center">
                                            <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm011.svg-->
                                            <span class="svg-icon svg-icon-2 me-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path opacity="0.3" d="M21.6 11.2L19.3 8.89998V5.59993C19.3 4.99993 18.9 4.59993 18.3 4.59993H14.9L12.6 2.3C12.2 1.9 11.6 1.9 11.2 2.3L8.9 4.59993H5.6C5 4.59993 4.6 4.99993 4.6 5.59993V8.89998L2.3 11.2C1.9 11.6 1.9 12.1999 2.3 12.5999L4.6 14.9V18.2C4.6 18.8 5 19.2 5.6 19.2H8.9L11.2 21.5C11.6 21.9 12.2 21.9 12.6 21.5L14.9 19.2H18.2C18.8 19.2 19.2 18.8 19.2 18.2V14.9L21.5 12.5999C22 12.1999 22 11.6 21.6 11.2Z" fill="currentColor"></path>
                                                    <path d="M11.3 9.40002C11.3 10.2 11.1 10.9 10.7 11.3C10.3 11.7 9.8 11.9 9.2 11.9C8.8 11.9 8.40001 11.8 8.10001 11.6C7.80001 11.4 7.50001 11.2 7.40001 10.8C7.20001 10.4 7.10001 10 7.10001 9.40002C7.10001 8.80002 7.20001 8.4 7.30001 8C7.40001 7.6 7.7 7.29998 8 7.09998C8.3 6.89998 8.7 6.80005 9.2 6.80005C9.5 6.80005 9.80001 6.9 10.1 7C10.4 7.1 10.6 7.3 10.8 7.5C11 7.7 11.1 8.00005 11.2 8.30005C11.3 8.60005 11.3 9.00002 11.3 9.40002ZM10.1 9.40002C10.1 8.80002 10 8.39998 9.90001 8.09998C9.80001 7.79998 9.6 7.70007 9.2 7.70007C9 7.70007 8.8 7.80002 8.7 7.90002C8.6 8.00002 8.50001 8.2 8.40001 8.5C8.40001 8.7 8.30001 9.10002 8.30001 9.40002C8.30001 9.80002 8.30001 10.1 8.40001 10.4C8.40001 10.6 8.5 10.8 8.7 11C8.8 11.1 9 11.2001 9.2 11.2001C9.5 11.2001 9.70001 11.1 9.90001 10.8C10 10.4 10.1 10 10.1 9.40002ZM14.9 7.80005L9.40001 16.7001C9.30001 16.9001 9.10001 17.1 8.90001 17.1C8.80001 17.1 8.70001 17.1 8.60001 17C8.50001 16.9 8.40001 16.8001 8.40001 16.7001C8.40001 16.6001 8.4 16.5 8.5 16.4L14 7.5C14.1 7.3 14.2 7.19998 14.3 7.09998C14.4 6.99998 14.5 7 14.6 7C14.7 7 14.8 6.99998 14.9 7.09998C15 7.19998 15 7.30002 15 7.40002C15.2 7.30002 15.1 7.50005 14.9 7.80005ZM16.6 14.2001C16.6 15.0001 16.4 15.7 16 16.1C15.6 16.5 15.1 16.7001 14.5 16.7001C14.1 16.7001 13.7 16.6 13.4 16.4C13.1 16.2 12.8 16 12.7 15.6C12.5 15.2 12.4 14.8001 12.4 14.2001C12.4 13.3001 12.6 12.7 12.9 12.3C13.2 11.9 13.7 11.7001 14.5 11.7001C14.8 11.7001 15.1 11.8 15.4 11.9C15.7 12 15.9 12.2 16.1 12.4C16.3 12.6 16.4 12.9001 16.5 13.2001C16.6 13.4001 16.6 13.8001 16.6 14.2001ZM15.4 14.1C15.4 13.5 15.3 13.1 15.2 12.9C15.1 12.6 14.9 12.5 14.5 12.5C14.3 12.5 14.1 12.6001 14 12.7001C13.9 12.8001 13.8 13.0001 13.7 13.2001C13.6 13.4001 13.6 13.8 13.6 14.1C13.6 14.7 13.7 15.1 13.8 15.4C13.9 15.7 14.1 15.8 14.5 15.8C14.8 15.8 15 15.7 15.2 15.4C15.3 15.2 15.4 14.7 15.4 14.1Z" fill="currentColor"></path>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->Байгууллагын РД
                                        </td>
                                        <td class="fw-bolder text-end">{{ $order['vat']['register_number'] }}</td>
                                    </tr>
                                @endif
                               
                            @endif
                            
                        </tbody>
                        <!--end::Table body-->
                    </table>
                    <!--end::Table-->
                </div>
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Documents-->
    </div>


    <div class="tab-content">
        <!--begin::Tab pane-->
        <div class="tab-pane fade active show" id="summary" role="tab-panel">
            <div class="d-flex flex-column gap-7 gap-lg-10">
                <div class="card card-flush py-4 flex-row-fluid overflow-hidden">
                    <!--begin::Card header-->
                    <div class="card-header">
                        <div class="card-title">
                            <h2>Захиалсан бүтээгдэхүүн</h2>
                        </div>
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <div class="table-responsive">
                            <!--begin::Table-->

                            @if (!empty($order['items']))
                                <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0">
                                    <!--begin::Table head-->
                                    <thead>
                                        <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                            <th class="min-w-175px">Нэр</th>
                                            <th class="min-w-70px text-end">Тоо ширхэг</th>
                                            <th class="min-w-100px text-end">Ширхэгийн үнэ</th>
                                            <th class="min-w-100px text-end">Нийт үнэ</th>
                                        </tr>
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody class="fw-bold text-gray-600">
                                        @foreach ($order['items'] as $item)
                                            <!--begin::Products-->
                                            <tr>
                                                <!--begin::Product-->
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <!--begin::Thumbnail-->
                                                        <a href="#" class="symbol symbol-50px">
                                                            <span class="symbol-label" style="background-image:url({{ asset('assets/media//stock/ecommerce/1.gif') }};"></span>
                                                        </a>
                                                        <!--end::Thumbnail-->
                                                        <!--begin::Title-->
                                                        <div class="ms-5">
                                                            <a href="#" class="fw-bolder text-gray-600 text-hover-primary">{{ $item['product']['name']}}</a>

                                                            @if ($item['product']['type'] == 'variable' && !empty($item['variation']['attributes']))
                                                                <div class="fs-7 text-muted">
                                                                    @foreach ($item['variation']['attributes'] as $attr => $attr_value)
                                                                        {{ $attr }}
                                                                    @endforeach
                                                                </div> 
                                                            @endif
                                                            
                                                        </div>
                                                        <!--end::Title-->
                                                    </div>
                                                </td>
                                                <!--end::Product-->
                                                <!--begin::Quantity-->
                                                <td class="text-end">{{ number_format($item['subtotal']) }}₮</td>
                                                <!--end::Quantity-->
                                                <!--begin::Price-->
                                                <td class="text-end">{{ $item['quantity'] }}</td>
                                                <!--end::Price-->
                                                <!--begin::Total-->
                                                <td class="text-end">{{ number_format($item['total']) }}₮</td>
                                                <!--end::Total-->
                                            </tr>
                                            
                                            <!--end::Products-->
                                            
                                        @endforeach
                                        <!--begin::Subtotal-->
                                        <tr>
                                            <td colspan="3" class="text-end">Захиалгын дүн</td>
                                            <td class="text-end">{{ number_format($order['subtotal']) }}₮</td>
                                        </tr>
                                        <!--end::Subtotal-->
                                        <!--begin::Shipping-->
                                        <tr>
                                            <td colspan="3" class="text-end">Хүргэлтийн тариф</td>
                                            <td class="text-end">$5.00</td>
                                        </tr>
                                        <!--end::Shipping-->
                                        <!--begin::Grand total-->
                                        <tr>
                                            <td colspan="3" class="fs-3 text-dark text-end">Нийт дүн</td>
                                            <td class="text-dark fs-3 fw-boldest text-end">{{ number_format($order['total']) }}₮</td>
                                        </tr>
                                        <!--end::Grand total-->
                                    </tbody>
                                    <!--end::Table head-->
                                </table>
                                <!--end::Table-->
                            @endif
                            
                        </div>
                    </div>
                    <!--end::Card body-->
                </div>
            </div>
        </div>


        <div class="tab-pane fade" id="history" role="tab-panel">
            <div class="d-flex flex-column gap-7 gap-lg-10">
                <!--begin::Order history-->
                <div class="card card-flush py-4 flex-row-fluid">
                    <!--begin::Card header-->
                    <div class="card-header">
                        <div class="card-title">
                            <h2>Order History</h2>
                        </div>
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <div class="table-responsive">
                            <!--begin::Table-->
                            <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0">
                                <!--begin::Table head-->
                                <thead>
                                    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                        <th class="min-w-100px">Date Added</th>
                                        <th class="min-w-175px">Comment</th>
                                        <th class="min-w-70px">Order Status</th>
                                        <th class="min-w-100px">Customer Notifed</th>
                                    </tr>
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody class="fw-bold text-gray-600">
                                    <tr>
                                        <!--begin::Date-->
                                        <td>09/04/2022</td>
                                        <!--end::Date-->
                                        <!--begin::Comment-->
                                        <td>Order completed</td>
                                        <!--end::Comment-->
                                        <!--begin::Status-->
                                        <td>
                                            <!--begin::Badges-->
                                            <div class="badge badge-light-success">Completed</div>
                                            <!--end::Badges-->
                                        </td>
                                        <!--end::Status-->
                                        <!--begin::Customer Notified-->
                                        <td>No</td>
                                        <!--end::Customer Notified-->
                                    </tr>
                                    <tr>
                                        <!--begin::Date-->
                                        <td>08/04/2022</td>
                                        <!--end::Date-->
                                        <!--begin::Comment-->
                                        <td>Order received by customer</td>
                                        <!--end::Comment-->
                                        <!--begin::Status-->
                                        <td>
                                            <!--begin::Badges-->
                                            <div class="badge badge-light-success">Delivered</div>
                                            <!--end::Badges-->
                                        </td>
                                        <!--end::Status-->
                                        <!--begin::Customer Notified-->
                                        <td>Yes</td>
                                        <!--end::Customer Notified-->
                                    </tr>
                                    <tr>
                                        <!--begin::Date-->
                                        <td>07/04/2022</td>
                                        <!--end::Date-->
                                        <!--begin::Comment-->
                                        <td>Order shipped from warehouse</td>
                                        <!--end::Comment-->
                                        <!--begin::Status-->
                                        <td>
                                            <!--begin::Badges-->
                                            <div class="badge badge-light-primary">Delivering</div>
                                            <!--end::Badges-->
                                        </td>
                                        <!--end::Status-->
                                        <!--begin::Customer Notified-->
                                        <td>Yes</td>
                                        <!--end::Customer Notified-->
                                    </tr>
                                    <tr>
                                        <!--begin::Date-->
                                        <td>06/04/2022</td>
                                        <!--end::Date-->
                                        <!--begin::Comment-->
                                        <td>Payment received</td>
                                        <!--end::Comment-->
                                        <!--begin::Status-->
                                        <td>
                                            <!--begin::Badges-->
                                            <div class="badge badge-light-primary">Processing</div>
                                            <!--end::Badges-->
                                        </td>
                                        <!--end::Status-->
                                        <!--begin::Customer Notified-->
                                        <td>No</td>
                                        <!--end::Customer Notified-->
                                    </tr>
                                    <tr>
                                        <!--begin::Date-->
                                        <td>05/04/2022</td>
                                        <!--end::Date-->
                                        <!--begin::Comment-->
                                        <td>Pending payment</td>
                                        <!--end::Comment-->
                                        <!--begin::Status-->
                                        <td>
                                            <!--begin::Badges-->
                                            <div class="badge badge-light-warning">Pending</div>
                                            <!--end::Badges-->
                                        </td>
                                        <!--end::Status-->
                                        <!--begin::Customer Notified-->
                                        <td>No</td>
                                        <!--end::Customer Notified-->
                                    </tr>
                                    <tr>
                                        <!--begin::Date-->
                                        <td>04/04/2022</td>
                                        <!--end::Date-->
                                        <!--begin::Comment-->
                                        <td>Payment method updated</td>
                                        <!--end::Comment-->
                                        <!--begin::Status-->
                                        <td>
                                            <!--begin::Badges-->
                                            <div class="badge badge-light-warning">Pending</div>
                                            <!--end::Badges-->
                                        </td>
                                        <!--end::Status-->
                                        <!--begin::Customer Notified-->
                                        <td>No</td>
                                        <!--end::Customer Notified-->
                                    </tr>
                                    <tr>
                                        <!--begin::Date-->
                                        <td>03/04/2022</td>
                                        <!--end::Date-->
                                        <!--begin::Comment-->
                                        <td>Payment method expired</td>
                                        <!--end::Comment-->
                                        <!--begin::Status-->
                                        <td>
                                            <!--begin::Badges-->
                                            <div class="badge badge-light-danger">Failed</div>
                                            <!--end::Badges-->
                                        </td>
                                        <!--end::Status-->
                                        <!--begin::Customer Notified-->
                                        <td>Yes</td>
                                        <!--end::Customer Notified-->
                                    </tr>
                                    <tr>
                                        <!--begin::Date-->
                                        <td>02/04/2022</td>
                                        <!--end::Date-->
                                        <!--begin::Comment-->
                                        <td>Pending payment</td>
                                        <!--end::Comment-->
                                        <!--begin::Status-->
                                        <td>
                                            <!--begin::Badges-->
                                            <div class="badge badge-light-warning">Pending</div>
                                            <!--end::Badges-->
                                        </td>
                                        <!--end::Status-->
                                        <!--begin::Customer Notified-->
                                        <td>No</td>
                                        <!--end::Customer Notified-->
                                    </tr>
                                    <tr>
                                        <!--begin::Date-->
                                        <td>01/04/2022</td>
                                        <!--end::Date-->
                                        <!--begin::Comment-->
                                        <td>Order received</td>
                                        <!--end::Comment-->
                                        <!--begin::Status-->
                                        <td>
                                            <!--begin::Badges-->
                                            <div class="badge badge-light-warning">Pending</div>
                                            <!--end::Badges-->
                                        </td>
                                        <!--end::Status-->
                                        <!--begin::Customer Notified-->
                                        <td>Yes</td>
                                        <!--end::Customer Notified-->
                                    </tr>
                                </tbody>
                                <!--end::Table head-->
                            </table>
                            <!--end::Table-->
                        </div>
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Order history-->
                <!--begin::Order data-->
                <div class="card card-flush py-4 flex-row-fluid">
                    <!--begin::Card header-->
                    <div class="card-header">
                        <div class="card-title">
                            <h2>Order Data</h2>
                        </div>
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <div class="table-responsive">
                            <!--begin::Table-->
                            <table class="table align-middle table-row-bordered mb-0 fs-6 gy-5">
                                <!--begin::Table body-->
                                <tbody class="fw-bold text-gray-600">
                                    <!--begin::IP address-->
                                    <tr>
                                        <td class="text-muted">IP Address</td>
                                        <td class="fw-bolder text-end">172.68.221.26</td>
                                    </tr>
                                    <!--end::IP address-->
                                    <!--begin::Forwarded IP-->
                                    <tr>
                                        <td class="text-muted">Forwarded IP</td>
                                        <td class="fw-bolder text-end">89.201.163.49</td>
                                    </tr>
                                    <!--end::Forwarded IP-->
                                    <!--begin::User agent-->
                                    <tr>
                                        <td class="text-muted">User Agent</td>
                                        <td class="fw-bolder text-end">Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36</td>
                                    </tr>
                                    <!--end::User agent-->
                                    <!--begin::Accept language-->
                                    <tr>
                                        <td class="text-muted">Accept Language</td>
                                        <td class="fw-bolder text-end">en-GB,en-US;q=0.9,en;q=0.8</td>
                                    </tr>
                                    <!--end::Accept language-->
                                </tbody>
                                <!--end::Table body-->
                            </table>
                            <!--end::Table-->
                        </div>
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Order data-->
            </div>
        </div>
        
    </div>
        
    <div class="modal fade" tabindex="-1" id="payment_data">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content shadow-none">
                <div class="modal-header">
                    <!--begin::Modal title-->
                    <h3>Дэлгэрэнгүй мэдээлэл</h3>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor"></rect>
                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor"></rect>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Close-->
                </div>
    
                <div class="modal-body">
                    @if ($order['invoice']['payment_id'] == 1)

                        <div class="row mb-4">
                            <label class="col-md-4 fw-bold fs-6 mb-2">Нэхэмжлэхийн ID</label>
                            <div class="col-md-8">
                                {{ $order['invoice']['data']['invoice_id'] }}
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-md-4 fw-bold fs-6 mb-2">Нэхэмжлэх QR</label>
                            <div class="col-md-8">
                                <img width="200" src="data:image/png;base64, {{ $order['invoice']['data']['qr_image'] }}" alt="">
                            </div>
                        </div>

                        @if (isset($order['invoice']['data']['paidResponse']))
                            @foreach ($order['invoice']['data']['paidResponse'] as $response)
                                <div class="row mb-4">
                                    <label class="col-md-4 fw-bold fs-6 mb-2">Гүйлгээний дугаар</label>
                                    <div class="col-md-8">
                                        {{ $response['payment_id'] }}
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label class="col-md-4 fw-bold fs-6 mb-2">Гүйлгээний төлөв</label>
                                    <div class="col-md-8">
                                        @if ($response['payment_status'] == 'PAID')
                                            <div class="badge badge-light-success fw-bolder">{{ $response['payment_status'] }}</div>
                                        @else
                                            <div class="badge badge-light-danger fw-bolder">{{ $response['payment_status'] }}</div>
                                        @endif
                                        
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label class="col-md-4 fw-bold fs-6 mb-2">Төлбөр төлсөн</label>
                                    <div class="col-md-8">
                                        {{ $response['payment_wallet'] }}
                                    </div>
                                </div>
                            @endforeach
                           
                        @endif
    
                        
                    @else
                        
                    @endif
                </div>
    
            </div>
        </div>
    </div>
</div>

@dump($order)
@endsection