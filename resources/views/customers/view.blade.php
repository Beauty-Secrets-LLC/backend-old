@extends('layouts.admin')
@section('toolbar')
<!--begin::Container-->
<div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
    <!--begin::Page title-->
    <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
        <!--begin::Title-->
        <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">Гишүүд</h1>
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
            <li class="breadcrumb-item text-muted">Гишүүд</li>
            <!--end::Item-->
            <!--begin::Item-->
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-200 w-5px h-2px"></span>
            </li>
            <!--end::Item-->
            <!--begin::Item-->
            <li class="breadcrumb-item text-dark">Жагсаалт</li>
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
    
    
    <!--begin::Layout-->
    <div class="d-flex flex-column flex-xl-row">
        <!--begin::Sidebar-->
        <div class="flex-column flex-lg-row-auto w-100 w-xl-400px mb-10">
            <!--begin::Card-->
            @component('components.customers.customer-card', ['customer'=>$customer])@endcomponent
            
            <!--end::Card-->
            <!--begin::Connected Accounts-->
            <div class="card mb-5 mb-xl-8">
                <!--begin::Card header-->
                <div class="card-header border-0">
                    <div class="card-title">
                        <h3 class="fw-bolder m-0">Холбогдсон бүртгэлүүд</h3>
                    </div>
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-2">
                    <!--begin::Notice-->
                    <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed mb-9 p-6">
                        <!--begin::Icon-->
                        <!--begin::Svg Icon | path: icons/duotone/Design/Select.svg-->
                        <span class="svg-icon svg-icon-2tx svg-icon-primary me-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <path d="M18.5,8 C17.1192881,8 16,6.88071187 16,5.5 C16,4.11928813 17.1192881,3 18.5,3 C19.8807119,3 21,4.11928813 21,5.5 C21,6.88071187 19.8807119,8 18.5,8 Z M18.5,21 C17.1192881,21 16,19.8807119 16,18.5 C16,17.1192881 17.1192881,16 18.5,16 C19.8807119,16 21,17.1192881 21,18.5 C21,19.8807119 19.8807119,21 18.5,21 Z M5.5,21 C4.11928813,21 3,19.8807119 3,18.5 C3,17.1192881 4.11928813,16 5.5,16 C6.88071187,16 8,17.1192881 8,18.5 C8,19.8807119 6.88071187,21 5.5,21 Z" fill="#000000" opacity="0.3" />
                                <path d="M5.5,8 C4.11928813,8 3,6.88071187 3,5.5 C3,4.11928813 4.11928813,3 5.5,3 C6.88071187,3 8,4.11928813 8,5.5 C8,6.88071187 6.88071187,8 5.5,8 Z M11,4 L13,4 C13.5522847,4 14,4.44771525 14,5 C14,5.55228475 13.5522847,6 13,6 L11,6 C10.4477153,6 10,5.55228475 10,5 C10,4.44771525 10.4477153,4 11,4 Z M11,18 L13,18 C13.5522847,18 14,18.4477153 14,19 C14,19.5522847 13.5522847,20 13,20 L11,20 C10.4477153,20 10,19.5522847 10,19 C10,18.4477153 10.4477153,18 11,18 Z M5,10 C5.55228475,10 6,10.4477153 6,11 L6,13 C6,13.5522847 5.55228475,14 5,14 C4.44771525,14 4,13.5522847 4,13 L4,11 C4,10.4477153 4.44771525,10 5,10 Z M19,10 C19.5522847,10 20,10.4477153 20,11 L20,13 C20,13.5522847 19.5522847,14 19,14 C18.4477153,14 18,13.5522847 18,13 L18,11 C18,10.4477153 18.4477153,10 19,10 Z" fill="#000000" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                        <!--end::Icon-->
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-stack flex-grow-1">
                            <!--begin::Content-->
                            <div class="fw-bold">
                                <div class="fs-6 text-gray-700">By connecting an account, you hereby agree to our
                                <a href="#" class="me-1">privacy policy</a>and
                                <a href="#">terms of use</a>.</div>
                            </div>
                            <!--end::Content-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Notice-->
                    <!--begin::Items-->
                    <div class="py-2">
                        <!--begin::Item-->
                        <div class="d-flex flex-stack">
                            <div class="d-flex">
                                <img src="{{ asset('assets/media/svg/brand-logos/google-icon.svg') }}" class="w-30px me-6" alt="" />
                                <div class="d-flex flex-column">
                                    <a href="#" class="fs-5 text-dark text-hover-primary fw-bolder">Google</a>
                                    <div class="fs-6 fw-bold text-muted">Plan properly your workflow</div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <!--begin::Switch-->
                                <label class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                    <!--begin::Input-->
                                    <input class="form-check-input" name="google" type="checkbox" value="1" id="kt_modal_connected_accounts_google" checked="checked" />
                                    <!--end::Input-->
                                    <!--begin::Label-->
                                    <span class="form-check-label fw-bold text-muted" for="kt_modal_connected_accounts_google"></span>
                                    <!--end::Label-->
                                </label>
                                <!--end::Switch-->
                            </div>
                        </div>
                        <!--end::Item-->
                        <div class="separator separator-dashed my-5"></div>
                        <!--begin::Item-->
                        <div class="d-flex flex-stack">
                            <div class="d-flex">
                                <img src="{{ asset('assets/media/svg/brand-logos/facebook-3.svg') }}" class="w-30px me-6" alt="" />
                                <div class="d-flex flex-column">
                                    <a href="#" class="fs-5 text-dark text-hover-primary fw-bolder">Facebook</a>
                                    <div class="fs-6 fw-bold text-muted">Keep eye on on your Repositories</div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <!--begin::Switch-->
                                <label class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                    <!--begin::Input-->
                                    <input class="form-check-input" name="github" type="checkbox" value="1" id="kt_modal_connected_accounts_github" checked="checked" />
                                    <!--end::Input-->
                                    <!--begin::Label-->
                                    <span class="form-check-label fw-bold text-muted" for="kt_modal_connected_accounts_github"></span>
                                    <!--end::Label-->
                                </label>
                                <!--end::Switch-->
                            </div>
                        </div>
                        <!--end::Item-->
                    </div>
                    <!--end::Items-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Connected Accounts-->
        </div>
        <!--end::Sidebar-->
        <!--begin::Content-->
        <div class="flex-lg-row-fluid ms-lg-15">
            <!--begin:::Tabs-->
            <ul class="nav nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-8">
                <!--begin:::Tab item-->
                <li class="nav-item">
                    <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab" href="#customer_orders">Захиалга</a>
                </li>
                <!--end:::Tab item-->
                <!--begin:::Tab item-->
                <li class="nav-item">
                    <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#customer_subscription">Subscription</a>
                </li>
                <!--end:::Tab item-->
                <!--begin:::Tab item-->
                <li class="nav-item">
                    <a class="nav-link text-active-primary pb-4" data-kt-countup-tabs="true" data-bs-toggle="tab" href="#customer_payments">Төлбөр</a>
                </li>
                <!--end:::Tab item-->
                <!--begin:::Tab item-->
                <li class="nav-item">
                    <a class="nav-link text-active-primary pb-4" data-kt-countup-tabs="true" data-bs-toggle="tab" href="#customer_points">Оноо</a>
                </li>
                <!--end:::Tab item-->
                <!--begin:::Tab item-->
                <li class="nav-item ms-auto">
                    <!--begin::Action menu-->
                    <a href="#" class="btn btn-primary ps-7" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end" data-kt-menu-flip="bottom">Actions
                    <!--begin::Svg Icon | path: icons/duotone/Navigation/Angle-down.svg-->
                    <span class="svg-icon svg-icon-2 me-0">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <polygon points="0 0 24 0 24 24 0 24" />
                                <path d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000003, 11.999999) rotate(-180.000000) translate(-12.000003, -11.999999)" />
                            </g>
                        </svg>
                    </span>
                    <!--end::Svg Icon--></a>
                    <!--begin::Menu-->
                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold py-4 w-250px fs-6" data-kt-menu="true">
                        <!--begin::Menu item-->
                        <div class="menu-item px-5">
                            <div class="menu-content text-muted pb-2 px-5 fs-7 text-uppercase">Payments</div>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-5">
                            <a href="#" class="menu-link px-5">Create invoice</a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-5">
                            <a href="#" class="menu-link flex-stack px-5">Create payments
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a target name for future usage and reference"></i></a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-5" data-kt-menu-trigger="hover" data-kt-menu-placement="left-start" data-kt-menu-flip="center, top">
                            <a href="#" class="menu-link px-5">
                                <span class="menu-title">Subscription</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <!--begin::Menu sub-->
                            <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-5">Apps</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-5">Billing</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-5">Statements</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu separator-->
                                <div class="separator my-2"></div>
                                <!--end::Menu separator-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <div class="menu-content px-3">
                                        <label class="form-check form-switch form-check-custom form-check-solid">
                                            <input class="form-check-input w-30px h-20px" type="checkbox" value="" name="notifications" checked="checked" id="kt_user_menu_notifications" />
                                            <span class="form-check-label text-muted fs-6" for="kt_user_menu_notifications">Notifications</span>
                                        </label>
                                    </div>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu sub-->
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu separator-->
                        <div class="separator my-3"></div>
                        <!--end::Menu separator-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-5">
                            <div class="menu-content text-muted pb-2 px-5 fs-7 text-uppercase">Account</div>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-5">
                            <a href="#" class="menu-link px-5">Reports</a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-5 my-1">
                            <a href="#" class="menu-link px-5">Account Settings</a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-5">
                            <a href="#" class="menu-link text-danger px-5">Delete customer</a>
                        </div>
                        <!--end::Menu item-->
                    </div>
                    <!--end::Menu-->
                    <!--end::Menu-->
                </li>
                <!--end:::Tab item-->
            </ul>
            <!--end:::Tabs-->
            <!--begin:::Tab content-->
            <div class="tab-content" id="myTabContent">
                <!--begin:::Tab pane-->
                <div class="tab-pane fade show active" id="customer_orders" role="tabpanel">
                    <!--begin::Card-->
                    <div class="card pt-4 mb-6 mb-xl-9">
                        <!--begin::Card header-->
                        <div class="card-header border-0">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2>Захиалгууд</h2>
                            </div>
                            <!--end::Card title-->
                            <!--begin::Card toolbar-->
                            <div class="card-toolbar">
                                <!--begin::Filter-->
                                <button type="button" class="btn btn-sm btn-flex btn-light-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_payment">
                                <!--begin::Svg Icon | path: icons/duotone/Interface/Plus-Square.svg-->
                                <span class="svg-icon svg-icon-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path opacity="0.25" fill-rule="evenodd" clip-rule="evenodd" d="M6.54184 2.36899C4.34504 2.65912 2.65912 4.34504 2.36899 6.54184C2.16953 8.05208 2 9.94127 2 12C2 14.0587 2.16953 15.9479 2.36899 17.4582C2.65912 19.655 4.34504 21.3409 6.54184 21.631C8.05208 21.8305 9.94127 22 12 22C14.0587 22 15.9479 21.8305 17.4582 21.631C19.655 21.3409 21.3409 19.655 21.631 17.4582C21.8305 15.9479 22 14.0587 22 12C22 9.94127 21.8305 8.05208 21.631 6.54184C21.3409 4.34504 19.655 2.65912 17.4582 2.36899C15.9479 2.16953 14.0587 2 12 2C9.94127 2 8.05208 2.16953 6.54184 2.36899Z" fill="#12131A" />
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12 17C12.5523 17 13 16.5523 13 16V13H16C16.5523 13 17 12.5523 17 12C17 11.4477 16.5523 11 16 11H13V8C13 7.44772 12.5523 7 12 7C11.4477 7 11 7.44772 11 8V11H8C7.44772 11 7 11.4477 7 12C7 12.5523 7.44771 13 8 13H11V16C11 16.5523 11.4477 17 12 17Z" fill="#12131A" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->Add payment</button>
                                <!--end::Filter-->
                            </div>
                            <!--end::Card toolbar-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0 pb-5">
                            @component('components.customers.orders-table', ['orders' => $customer['orders']])@endcomponent
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                    <!--begin::Card-->
                    <div class="card pt-4 mb-6 mb-xl-9">
                        <!--begin::Card header-->
                        <div class="card-header border-0">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2 class="fw-bolder mb-0">Payment Methods</h2>
                            </div>
                            <!--end::Card title-->
                            <!--begin::Card toolbar-->
                            <div class="card-toolbar">
                                <a href="#" class="btn btn-sm btn-flex btn-light-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_new_card">
                                <!--begin::Svg Icon | path: icons/duotone/Interface/Plus-Square.svg-->
                                <span class="svg-icon svg-icon-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path opacity="0.25" fill-rule="evenodd" clip-rule="evenodd" d="M6.54184 2.36899C4.34504 2.65912 2.65912 4.34504 2.36899 6.54184C2.16953 8.05208 2 9.94127 2 12C2 14.0587 2.16953 15.9479 2.36899 17.4582C2.65912 19.655 4.34504 21.3409 6.54184 21.631C8.05208 21.8305 9.94127 22 12 22C14.0587 22 15.9479 21.8305 17.4582 21.631C19.655 21.3409 21.3409 19.655 21.631 17.4582C21.8305 15.9479 22 14.0587 22 12C22 9.94127 21.8305 8.05208 21.631 6.54184C21.3409 4.34504 19.655 2.65912 17.4582 2.36899C15.9479 2.16953 14.0587 2 12 2C9.94127 2 8.05208 2.16953 6.54184 2.36899Z" fill="#12131A" />
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12 17C12.5523 17 13 16.5523 13 16V13H16C16.5523 13 17 12.5523 17 12C17 11.4477 16.5523 11 16 11H13V8C13 7.44772 12.5523 7 12 7C11.4477 7 11 7.44772 11 8V11H8C7.44772 11 7 11.4477 7 12C7 12.5523 7.44771 13 8 13H11V16C11 16.5523 11.4477 17 12 17Z" fill="#12131A" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->Add new method</a>
                            </div>
                            <!--end::Card toolbar-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div id="kt_customer_view_payment_method" class="card-body pt-0">
                            <!--begin::Option-->
                            <div class="py-0" data-kt-customer-payment-method="row">
                                <!--begin::Header-->
                                <div class="py-3 d-flex flex-stack flex-wrap">
                                    <!--begin::Toggle-->
                                    <div class="d-flex align-items-center collapsible rotate" data-bs-toggle="collapse" href="#kt_customer_view_payment_method_1" role="button" aria-expanded="false" aria-controls="kt_customer_view_payment_method_1">
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
                                        <img src="assets/media/svg/card-logos/mastercard.svg" class="w-40px me-3" alt="" />
                                        <!--end::Logo-->
                                        <!--begin::Summary-->
                                        <div class="me-3">
                                            <div class="d-flex align-items-center">
                                                <div class="text-gray-800 fw-bolder">Mastercard</div>
                                                <div class="badge badge-light-primary ms-5">Primary</div>
                                            </div>
                                            <div class="text-muted">Expires Dec 2024</div>
                                        </div>
                                        <!--end::Summary-->
                                    </div>
                                    <!--end::Toggle-->
                                    <!--begin::Toolbar-->
                                    <div class="d-flex my-3 ms-9">
                                        <!--begin::Edit-->
                                        <a href="#" class="btn btn-icon btn-active-light-primary w-30px h-30px me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_new_card">
                                            <span data-bs-toggle="tooltip" data-bs-trigger="hover" title="Edit">
                                                <!--begin::Svg Icon | path: icons/duotone/Communication/Write.svg-->
                                                <span class="svg-icon svg-icon-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
                                                        <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </span>
                                        </a>
                                        <!--end::Edit-->
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
                                        <!--begin::More-->
                                        <a href="#" class="btn btn-icon btn-active-light-primary w-30px h-30px" data-bs-toggle="tooltip" title="More Options" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
                                            <!--begin::Svg Icon | path: icons/duotone/General/Settings-1.svg-->
                                            <span class="svg-icon svg-icon-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24" />
                                                        <path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000" />
                                                        <path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3" />
                                                    </g>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </a>
                                        <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold w-150px py-3" data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3" data-kt-payment-mehtod-action="set_as_primary">Set as Primary</a>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu-->
                                        <!--end::More-->
                                    </div>
                                    <!--end::Toolbar-->
                                </div>
                                <!--end::Header-->
                                <!--begin::Body-->
                                <div id="kt_customer_view_payment_method_1" class="collapse show fs-6 ps-10" data-bs-parent="#kt_customer_view_payment_method">
                                    <!--begin::Details-->
                                    <div class="d-flex flex-wrap py-5">
                                        <!--begin::Col-->
                                        <div class="flex-equal me-5">
                                            <table class="table table-flush fw-bold gy-1">
                                                <tr>
                                                    <td class="text-muted min-w-125px w-125px">Name</td>
                                                    <td class="text-gray-800">Emma Smith</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-muted min-w-125px w-125px">Number</td>
                                                    <td class="text-gray-800">**** 9370</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-muted min-w-125px w-125px">Expires</td>
                                                    <td class="text-gray-800">12/2024</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-muted min-w-125px w-125px">Type</td>
                                                    <td class="text-gray-800">Mastercard credit card</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-muted min-w-125px w-125px">Issuer</td>
                                                    <td class="text-gray-800">VICBANK</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-muted min-w-125px w-125px">ID</td>
                                                    <td class="text-gray-800">id_4325df90sdf8</td>
                                                </tr>
                                            </table>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="flex-equal">
                                            <table class="table table-flush fw-bold gy-1">
                                                <tr>
                                                    <td class="text-muted min-w-125px w-125px">Billing address</td>
                                                    <td class="text-gray-800">AU</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-muted min-w-125px w-125px">Phone</td>
                                                    <td class="text-gray-800">No phone provided</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-muted min-w-125px w-125px">Email</td>
                                                    <td class="text-gray-800">
                                                        <a href="#" class="text-gray-900 text-hover-primary">e.smith@kpmg.com.au</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-muted min-w-125px w-125px">Origin</td>
                                                    <td class="text-gray-800">Australia
                                                    <div class="symbol symbol-20px symbol-circle ms-2">
                                                        <img src="assets/media/flags/australia.svg" />
                                                    </div></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-muted min-w-125px w-125px">CVC check</td>
                                                    <td class="text-gray-800">Passed
                                                    <!--begin::Svg Icon | path: icons/duotone/Navigation/Double-check.svg-->
                                                    <span class="svg-icon svg-icon-2 svg-icon-success">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <polygon points="0 0 24 0 24 24 0 24" />
                                                                <path d="M9.26193932,16.6476484 C8.90425297,17.0684559 8.27315905,17.1196257 7.85235158,16.7619393 C7.43154411,16.404253 7.38037434,15.773159 7.73806068,15.3523516 L16.2380607,5.35235158 C16.6013618,4.92493855 17.2451015,4.87991302 17.6643638,5.25259068 L22.1643638,9.25259068 C22.5771466,9.6195087 22.6143273,10.2515811 22.2474093,10.6643638 C21.8804913,11.0771466 21.2484189,11.1143273 20.8356362,10.7474093 L17.0997854,7.42665306 L9.26193932,16.6476484 Z" fill="#000000" fill-rule="nonzero" opacity="0.5" transform="translate(14.999995, 11.000002) rotate(-180.000000) translate(-14.999995, -11.000002)" />
                                                                <path d="M4.26193932,17.6476484 C3.90425297,18.0684559 3.27315905,18.1196257 2.85235158,17.7619393 C2.43154411,17.404253 2.38037434,16.773159 2.73806068,16.3523516 L11.2380607,6.35235158 C11.6013618,5.92493855 12.2451015,5.87991302 12.6643638,6.25259068 L17.1643638,10.2525907 C17.5771466,10.6195087 17.6143273,11.2515811 17.2474093,11.6643638 C16.8804913,12.0771466 16.2484189,12.1143273 15.8356362,11.7474093 L12.0997854,8.42665306 L4.26193932,17.6476484 Z" fill="#000000" fill-rule="nonzero" transform="translate(9.999995, 12.000002) rotate(-180.000000) translate(-9.999995, -12.000002)" />
                                                            </g>
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon--></td>
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
                            <!--begin::Option-->
                            <div class="py-0" data-kt-customer-payment-method="row">
                                <!--begin::Header-->
                                <div class="py-3 d-flex flex-stack flex-wrap">
                                    <!--begin::Toggle-->
                                    <div class="d-flex align-items-center collapsible collapsed rotate" data-bs-toggle="collapse" href="#kt_customer_view_payment_method_2" role="button" aria-expanded="false" aria-controls="kt_customer_view_payment_method_2">
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
                                        <img src="assets/media/svg/card-logos/visa.svg" class="w-40px me-3" alt="" />
                                        <!--end::Logo-->
                                        <!--begin::Summary-->
                                        <div class="me-3">
                                            <div class="d-flex align-items-center">
                                                <div class="text-gray-800 fw-bolder">Visa</div>
                                            </div>
                                            <div class="text-muted">Expires Feb 2022</div>
                                        </div>
                                        <!--end::Summary-->
                                    </div>
                                    <!--end::Toggle-->
                                    <!--begin::Toolbar-->
                                    <div class="d-flex my-3 ms-9">
                                        <!--begin::Edit-->
                                        <a href="#" class="btn btn-icon btn-active-light-primary w-30px h-30px me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_new_card">
                                            <span data-bs-toggle="tooltip" data-bs-trigger="hover" title="Edit">
                                                <!--begin::Svg Icon | path: icons/duotone/Communication/Write.svg-->
                                                <span class="svg-icon svg-icon-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
                                                        <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </span>
                                        </a>
                                        <!--end::Edit-->
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
                                        <!--begin::More-->
                                        <a href="#" class="btn btn-icon btn-active-light-primary w-30px h-30px" data-bs-toggle="tooltip" title="More Options" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
                                            <!--begin::Svg Icon | path: icons/duotone/General/Settings-1.svg-->
                                            <span class="svg-icon svg-icon-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24" />
                                                        <path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000" />
                                                        <path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3" />
                                                    </g>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </a>
                                        <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold w-150px py-3" data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3" data-kt-payment-mehtod-action="set_as_primary">Set as Primary</a>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu-->
                                        <!--end::More-->
                                    </div>
                                    <!--end::Toolbar-->
                                </div>
                                <!--end::Header-->
                                <!--begin::Body-->
                                <div id="kt_customer_view_payment_method_2" class="collapse fs-6 ps-10" data-bs-parent="#kt_customer_view_payment_method">
                                    <!--begin::Details-->
                                    <div class="d-flex flex-wrap py-5">
                                        <!--begin::Col-->
                                        <div class="flex-equal me-5">
                                            <table class="table table-flush fw-bold gy-1">
                                                <tr>
                                                    <td class="text-muted min-w-125px w-125px">Name</td>
                                                    <td class="text-gray-800">Melody Macy</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-muted min-w-125px w-125px">Number</td>
                                                    <td class="text-gray-800">**** 2314</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-muted min-w-125px w-125px">Expires</td>
                                                    <td class="text-gray-800">02/2022</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-muted min-w-125px w-125px">Type</td>
                                                    <td class="text-gray-800">Visa credit card</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-muted min-w-125px w-125px">Issuer</td>
                                                    <td class="text-gray-800">ENBANK</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-muted min-w-125px w-125px">ID</td>
                                                    <td class="text-gray-800">id_w2r84jdy723</td>
                                                </tr>
                                            </table>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="flex-equal">
                                            <table class="table table-flush fw-bold gy-1">
                                                <tr>
                                                    <td class="text-muted min-w-125px w-125px">Billing address</td>
                                                    <td class="text-gray-800">UK</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-muted min-w-125px w-125px">Phone</td>
                                                    <td class="text-gray-800">No phone provided</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-muted min-w-125px w-125px">Email</td>
                                                    <td class="text-gray-800">
                                                        <a href="#" class="text-gray-900 text-hover-primary">melody@altbox.com</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-muted min-w-125px w-125px">Origin</td>
                                                    <td class="text-gray-800">United Kingdom
                                                    <div class="symbol symbol-20px symbol-circle ms-2">
                                                        <img src="assets/media/flags/united-kingdom.svg" />
                                                    </div></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-muted min-w-125px w-125px">CVC check</td>
                                                    <td class="text-gray-800">Passed
                                                    <!--begin::Svg Icon | path: icons/duotone/Navigation/Double-check.svg-->
                                                    <span class="svg-icon svg-icon-2 svg-icon-success">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <polygon points="0 0 24 0 24 24 0 24" />
                                                                <path d="M9.26193932,16.6476484 C8.90425297,17.0684559 8.27315905,17.1196257 7.85235158,16.7619393 C7.43154411,16.404253 7.38037434,15.773159 7.73806068,15.3523516 L16.2380607,5.35235158 C16.6013618,4.92493855 17.2451015,4.87991302 17.6643638,5.25259068 L22.1643638,9.25259068 C22.5771466,9.6195087 22.6143273,10.2515811 22.2474093,10.6643638 C21.8804913,11.0771466 21.2484189,11.1143273 20.8356362,10.7474093 L17.0997854,7.42665306 L9.26193932,16.6476484 Z" fill="#000000" fill-rule="nonzero" opacity="0.5" transform="translate(14.999995, 11.000002) rotate(-180.000000) translate(-14.999995, -11.000002)" />
                                                                <path d="M4.26193932,17.6476484 C3.90425297,18.0684559 3.27315905,18.1196257 2.85235158,17.7619393 C2.43154411,17.404253 2.38037434,16.773159 2.73806068,16.3523516 L11.2380607,6.35235158 C11.6013618,5.92493855 12.2451015,5.87991302 12.6643638,6.25259068 L17.1643638,10.2525907 C17.5771466,10.6195087 17.6143273,11.2515811 17.2474093,11.6643638 C16.8804913,12.0771466 16.2484189,12.1143273 15.8356362,11.7474093 L12.0997854,8.42665306 L4.26193932,17.6476484 Z" fill="#000000" fill-rule="nonzero" transform="translate(9.999995, 12.000002) rotate(-180.000000) translate(-9.999995, -12.000002)" />
                                                            </g>
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon--></td>
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
                            <!--begin::Option-->
                            <div class="py-0" data-kt-customer-payment-method="row">
                                <!--begin::Header-->
                                <div class="py-3 d-flex flex-stack flex-wrap">
                                    <!--begin::Toggle-->
                                    <div class="d-flex align-items-center collapsible collapsed rotate" data-bs-toggle="collapse" href="#kt_customer_view_payment_method_3" role="button" aria-expanded="false" aria-controls="kt_customer_view_payment_method_3">
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
                                        <img src="assets/media/svg/card-logos/american-express.svg" class="w-40px me-3" alt="" />
                                        <!--end::Logo-->
                                        <!--begin::Summary-->
                                        <div class="me-3">
                                            <div class="d-flex align-items-center">
                                                <div class="text-gray-800 fw-bolder">American Express</div>
                                                <div class="badge badge-light-danger ms-5">Expired</div>
                                            </div>
                                            <div class="text-muted">Expires Aug 2021</div>
                                        </div>
                                        <!--end::Summary-->
                                    </div>
                                    <!--end::Toggle-->
                                    <!--begin::Toolbar-->
                                    <div class="d-flex my-3 ms-9">
                                        <!--begin::Edit-->
                                        <a href="#" class="btn btn-icon btn-active-light-primary w-30px h-30px me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_new_card">
                                            <span data-bs-toggle="tooltip" data-bs-trigger="hover" title="Edit">
                                                <!--begin::Svg Icon | path: icons/duotone/Communication/Write.svg-->
                                                <span class="svg-icon svg-icon-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
                                                        <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </span>
                                        </a>
                                        <!--end::Edit-->
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
                                        <!--begin::More-->
                                        <a href="#" class="btn btn-icon btn-active-light-primary w-30px h-30px" data-bs-toggle="tooltip" title="More Options" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
                                            <!--begin::Svg Icon | path: icons/duotone/General/Settings-1.svg-->
                                            <span class="svg-icon svg-icon-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24" />
                                                        <path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000" />
                                                        <path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3" />
                                                    </g>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </a>
                                        <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold w-150px py-3" data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3" data-kt-payment-mehtod-action="set_as_primary">Set as Primary</a>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu-->
                                        <!--end::More-->
                                    </div>
                                    <!--end::Toolbar-->
                                </div>
                                <!--end::Header-->
                                <!--begin::Body-->
                                <div id="kt_customer_view_payment_method_3" class="collapse fs-6 ps-10" data-bs-parent="#kt_customer_view_payment_method">
                                    <!--begin::Details-->
                                    <div class="d-flex flex-wrap py-5">
                                        <!--begin::Col-->
                                        <div class="flex-equal me-5">
                                            <table class="table table-flush fw-bold gy-1">
                                                <tr>
                                                    <td class="text-muted min-w-125px w-125px">Name</td>
                                                    <td class="text-gray-800">Max Smith</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-muted min-w-125px w-125px">Number</td>
                                                    <td class="text-gray-800">**** 7767</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-muted min-w-125px w-125px">Expires</td>
                                                    <td class="text-gray-800">08/2021</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-muted min-w-125px w-125px">Type</td>
                                                    <td class="text-gray-800">American express credit card</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-muted min-w-125px w-125px">Issuer</td>
                                                    <td class="text-gray-800">USABANK</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-muted min-w-125px w-125px">ID</td>
                                                    <td class="text-gray-800">id_89457jcje63</td>
                                                </tr>
                                            </table>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="flex-equal">
                                            <table class="table table-flush fw-bold gy-1">
                                                <tr>
                                                    <td class="text-muted min-w-125px w-125px">Billing address</td>
                                                    <td class="text-gray-800">US</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-muted min-w-125px w-125px">Phone</td>
                                                    <td class="text-gray-800">No phone provided</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-muted min-w-125px w-125px">Email</td>
                                                    <td class="text-gray-800">
                                                        <a href="#" class="text-gray-900 text-hover-primary">max@kt.com</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-muted min-w-125px w-125px">Origin</td>
                                                    <td class="text-gray-800">United States of America
                                                    <div class="symbol symbol-20px symbol-circle ms-2">
                                                        <img src="assets/media/flags/united-states.svg" />
                                                    </div></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-muted min-w-125px w-125px">CVC check</td>
                                                    <td class="text-gray-800">Failed
                                                    <!--begin::Svg Icon | path: icons/duotone/Navigation/Close.svg-->
                                                    <span class="svg-icon svg-icon-2 svg-icon-danger">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)" fill="#000000">
                                                                <rect fill="#000000" x="0" y="7" width="16" height="2" rx="1" />
                                                                <rect fill="#000000" opacity="0.5" transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)" x="0" y="7" width="16" height="2" rx="1" />
                                                            </g>
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon--></td>
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
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                    <!--begin::Card-->
                    <div class="card pt-4 mb-6 mb-xl-9">
                        <!--begin::Card header-->
                        <div class="card-header border-0">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2 class="fw-bolder">Credit Balance</h2>
                            </div>
                            <!--end::Card title-->
                            <!--begin::Card toolbar-->
                            <div class="card-toolbar">
                                <a href="#" class="btn btn-sm btn-flex btn-light-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_adjust_balance">
                                <!--begin::Svg Icon | path: icons/duotone/General/Edit.svg-->
                                <span class="svg-icon svg-icon-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <path d="M7.10343995,21.9419885 L6.71653855,8.03551821 C6.70507204,7.62337518 6.86375628,7.22468355 7.15529818,6.93314165 L10.2341093,3.85433055 C10.8198957,3.26854411 11.7696432,3.26854411 12.3554296,3.85433055 L15.4614112,6.9603121 C15.7369117,7.23581259 15.8944065,7.6076995 15.9005637,7.99726737 L16.1199293,21.8765672 C16.1330212,22.7048909 15.4721452,23.3869929 14.6438216,23.4000848 C14.6359205,23.4002097 14.6280187,23.4002721 14.6201167,23.4002721 L8.60285976,23.4002721 C7.79067946,23.4002721 7.12602744,22.7538546 7.10343995,21.9419885 Z" fill="#000000" fill-rule="nonzero" transform="translate(11.418039, 13.407631) rotate(-135.000000) translate(-11.418039, -13.407631)" />
                                        </g>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->Adjust Balance</a>
                            </div>
                            <!--end::Card toolbar-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <div class="fw-bolder fs-2">$32,487.57
                            <span class="text-muted fs-4 fw-bold">USD</span>
                            <div class="fs-7 fw-normal text-muted">Balance will increase the amount due on the customer's next invoice.</div></div>
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                    <!--begin::Card-->
                    <div class="card pt-2 mb-6 mb-xl-9">
                        <!--begin::Card header-->
                        <div class="card-header border-0">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2>Invoices</h2>
                            </div>
                            <!--end::Card title-->
                            <!--begin::Toolbar-->
                            <div class="card-toolbar m-0">
                                <!--begin::Tab nav-->
                                <ul class="nav nav-stretch fs-5 fw-bold nav-line-tabs nav-line-tabs-2x border-transparent" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a id="kt_referrals_year_tab" class="nav-link text-active-primary active" data-bs-toggle="tab" role="tab" href="#kt_customer_details_invoices_1">This Year</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a id="kt_referrals_2019_tab" class="nav-link text-active-primary ms-3" data-bs-toggle="tab" role="tab" href="#kt_customer_details_invoices_2">2020</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a id="kt_referrals_2018_tab" class="nav-link text-active-primary ms-3" data-bs-toggle="tab" role="tab" href="#kt_customer_details_invoices_3">2019</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a id="kt_referrals_2017_tab" class="nav-link text-active-primary ms-3" data-bs-toggle="tab" role="tab" href="#kt_customer_details_invoices_4">2018</a>
                                    </li>
                                </ul>
                                <!--end::Tab nav-->
                            </div>
                            <!--end::Toolbar-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Tab Content-->
                            <div id="kt_referred_users_tab_content" class="tab-content">
                                <!--begin::Tab panel-->
                                <div id="kt_customer_details_invoices_1" class="py-0 tab-pane fade show active" role="tabpanel">
                                    <!--begin::Table-->
                                    <table id="kt_customer_details_invoices_table_1" class="table align-middle table-row-dashed fs-6 fw-bolder gy-5">
                                        <!--begin::Thead-->
                                        <thead class="border-bottom border-gray-200 fs-7 text-uppercase fw-bolder">
                                            <tr class="text-start text-muted gs-0">
                                                <th class="min-w-100px">Order ID</th>
                                                <th class="min-w-100px">Amount</th>
                                                <th class="min-w-100px">Status</th>
                                                <th class="min-w-125px">Date</th>
                                                <th class="min-w-100px text-end pe-7">Invoice</th>
                                            </tr>
                                        </thead>
                                        <!--end::Thead-->
                                        <!--begin::Tbody-->
                                        <tbody class="fs-6 fw-bold text-gray-600">
                                            <tr>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">102445788</a>
                                                </td>
                                                <td class="text-success">$38.00</td>
                                                <td>
                                                    <span class="badge badge-light-success">Approved</span>
                                                </td>
                                                <td>Nov 01, 2020</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">423445721</a>
                                                </td>
                                                <td class="text-danger">$-2.60</td>
                                                <td>
                                                    <span class="badge badge-light-success">Approved</span>
                                                </td>
                                                <td>Oct 24, 2020</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">312445984</a>
                                                </td>
                                                <td class="text-success">$76.00</td>
                                                <td>
                                                    <span class="badge badge-light-info">In progress</span>
                                                </td>
                                                <td>Oct 08, 2020</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">312445984</a>
                                                </td>
                                                <td class="text-success">$5.00</td>
                                                <td>
                                                    <span class="badge badge-light-success">Approved</span>
                                                </td>
                                                <td>Sep 15, 2020</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">523445943</a>
                                                </td>
                                                <td class="text-danger">$-1.30</td>
                                                <td>
                                                    <span class="badge badge-light-success">Approved</span>
                                                </td>
                                                <td>May 30, 2020</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">231445943</a>
                                                </td>
                                                <td class="text-success">$204.00</td>
                                                <td>
                                                    <span class="badge badge-light-info">In progress</span>
                                                </td>
                                                <td>Apr 22, 2020</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">426445943</a>
                                                </td>
                                                <td class="text-success">$31.00</td>
                                                <td>
                                                    <span class="badge badge-light-info">In progress</span>
                                                </td>
                                                <td>Feb 09, 2020</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">984445943</a>
                                                </td>
                                                <td class="text-success">$52.00</td>
                                                <td>
                                                    <span class="badge badge-light-success">Approved</span>
                                                </td>
                                                <td>Nov 01, 2020</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">324442313</a>
                                                </td>
                                                <td class="text-danger">$-0.80</td>
                                                <td>
                                                    <span class="badge badge-light-info">In progress</span>
                                                </td>
                                                <td>Jan 04, 2020</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <!--end::Tbody-->
                                    </table>
                                    <!--end::Table-->
                                </div>
                                <!--end::Tab panel-->
                                <!--begin::Tab panel-->
                                <div id="kt_customer_details_invoices_2" class="py-0 tab-pane fade" role="tabpanel">
                                    <!--begin::Table-->
                                    <table id="kt_customer_details_invoices_table_2" class="table align-middle table-row-dashed fs-6 fw-bolder gy-5">
                                        <!--begin::Thead-->
                                        <thead class="border-bottom border-gray-200 fs-7 text-uppercase fw-bolder">
                                            <tr class="text-start text-muted gs-0">
                                                <th class="min-w-100px">Order ID</th>
                                                <th class="min-w-100px">Amount</th>
                                                <th class="min-w-100px">Status</th>
                                                <th class="min-w-125px">Date</th>
                                                <th class="min-w-100px text-end pe-7">Invoice</th>
                                            </tr>
                                        </thead>
                                        <!--end::Thead-->
                                        <!--begin::Tbody-->
                                        <tbody class="fs-6 fw-bold text-gray-600">
                                            <tr>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">523445943</a>
                                                </td>
                                                <td class="text-danger">$-1.30</td>
                                                <td>
                                                    <span class="badge badge-light-success">Approved</span>
                                                </td>
                                                <td>May 30, 2020</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">231445943</a>
                                                </td>
                                                <td class="text-success">$204.00</td>
                                                <td>
                                                    <span class="badge badge-light-success">Approved</span>
                                                </td>
                                                <td>Apr 22, 2020</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">426445943</a>
                                                </td>
                                                <td class="text-success">$31.00</td>
                                                <td>
                                                    <span class="badge badge-light-warning">Pending</span>
                                                </td>
                                                <td>Feb 09, 2020</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">984445943</a>
                                                </td>
                                                <td class="text-success">$52.00</td>
                                                <td>
                                                    <span class="badge badge-light-warning">Pending</span>
                                                </td>
                                                <td>Nov 01, 2020</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">324442313</a>
                                                </td>
                                                <td class="text-danger">$-0.80</td>
                                                <td>
                                                    <span class="badge badge-light-info">In progress</span>
                                                </td>
                                                <td>Jan 04, 2020</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">102445788</a>
                                                </td>
                                                <td class="text-success">$38.00</td>
                                                <td>
                                                    <span class="badge badge-light-danger">Rejected</span>
                                                </td>
                                                <td>Nov 01, 2020</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">423445721</a>
                                                </td>
                                                <td class="text-danger">$-2.60</td>
                                                <td>
                                                    <span class="badge badge-light-danger">Rejected</span>
                                                </td>
                                                <td>Oct 24, 2020</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">312445984</a>
                                                </td>
                                                <td class="text-success">$76.00</td>
                                                <td>
                                                    <span class="badge badge-light-success">Approved</span>
                                                </td>
                                                <td>Oct 08, 2020</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">312445984</a>
                                                </td>
                                                <td class="text-success">$5.00</td>
                                                <td>
                                                    <span class="badge badge-light-danger">Rejected</span>
                                                </td>
                                                <td>Sep 15, 2020</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <!--end::Tbody-->
                                    </table>
                                    <!--end::Table-->
                                </div>
                                <!--end::Tab panel-->
                                <!--begin::Tab panel-->
                                <div id="kt_customer_details_invoices_3" class="py-0 tab-pane fade" role="tabpanel">
                                    <!--begin::Table-->
                                    <table id="kt_customer_details_invoices_table_3" class="table align-middle table-row-dashed fs-6 fw-bolder gy-5">
                                        <!--begin::Thead-->
                                        <thead class="border-bottom border-gray-200 fs-7 text-uppercase fw-bolder">
                                            <tr class="text-start text-muted gs-0">
                                                <th class="min-w-100px">Order ID</th>
                                                <th class="min-w-100px">Amount</th>
                                                <th class="min-w-100px">Status</th>
                                                <th class="min-w-125px">Date</th>
                                                <th class="min-w-100px text-end pe-7">Invoice</th>
                                            </tr>
                                        </thead>
                                        <!--end::Thead-->
                                        <!--begin::Tbody-->
                                        <tbody class="fs-6 fw-bold text-gray-600">
                                            <tr>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">426445943</a>
                                                </td>
                                                <td class="text-success">$31.00</td>
                                                <td>
                                                    <span class="badge badge-light-warning">Pending</span>
                                                </td>
                                                <td>Feb 09, 2020</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">984445943</a>
                                                </td>
                                                <td class="text-success">$52.00</td>
                                                <td>
                                                    <span class="badge badge-light-success">Approved</span>
                                                </td>
                                                <td>Nov 01, 2020</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">324442313</a>
                                                </td>
                                                <td class="text-danger">$-0.80</td>
                                                <td>
                                                    <span class="badge badge-light-success">Approved</span>
                                                </td>
                                                <td>Jan 04, 2020</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">312445984</a>
                                                </td>
                                                <td class="text-success">$5.00</td>
                                                <td>
                                                    <span class="badge badge-light-success">Approved</span>
                                                </td>
                                                <td>Sep 15, 2020</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">102445788</a>
                                                </td>
                                                <td class="text-success">$38.00</td>
                                                <td>
                                                    <span class="badge badge-light-danger">Rejected</span>
                                                </td>
                                                <td>Nov 01, 2020</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">423445721</a>
                                                </td>
                                                <td class="text-danger">$-2.60</td>
                                                <td>
                                                    <span class="badge badge-light-danger">Rejected</span>
                                                </td>
                                                <td>Oct 24, 2020</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">312445984</a>
                                                </td>
                                                <td class="text-success">$76.00</td>
                                                <td>
                                                    <span class="badge badge-light-success">Approved</span>
                                                </td>
                                                <td>Oct 08, 2020</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">523445943</a>
                                                </td>
                                                <td class="text-danger">$-1.30</td>
                                                <td>
                                                    <span class="badge badge-light-success">Approved</span>
                                                </td>
                                                <td>May 30, 2020</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">231445943</a>
                                                </td>
                                                <td class="text-success">$204.00</td>
                                                <td>
                                                    <span class="badge badge-light-info">In progress</span>
                                                </td>
                                                <td>Apr 22, 2020</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <!--end::Tbody-->
                                    </table>
                                    <!--end::Table-->
                                </div>
                                <!--end::Tab panel-->
                                <!--begin::Tab panel-->
                                <div id="kt_customer_details_invoices_4" class="py-0 tab-pane fade" role="tabpanel">
                                    <!--begin::Table-->
                                    <table id="kt_customer_details_invoices_table_4" class="table align-middle table-row-dashed fs-6 fw-bolder gy-5">
                                        <!--begin::Thead-->
                                        <thead class="border-bottom border-gray-200 fs-7 text-uppercase fw-bolder">
                                            <tr class="text-start text-muted gs-0">
                                                <th class="min-w-100px">Order ID</th>
                                                <th class="min-w-100px">Amount</th>
                                                <th class="min-w-100px">Status</th>
                                                <th class="min-w-125px">Date</th>
                                                <th class="min-w-100px text-end pe-7">Invoice</th>
                                            </tr>
                                        </thead>
                                        <!--end::Thead-->
                                        <!--begin::Tbody-->
                                        <tbody class="fs-6 fw-bold text-gray-600">
                                            <tr>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">102445788</a>
                                                </td>
                                                <td class="text-success">$38.00</td>
                                                <td>
                                                    <span class="badge badge-light-info">In progress</span>
                                                </td>
                                                <td>Nov 01, 2020</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">423445721</a>
                                                </td>
                                                <td class="text-danger">$-2.60</td>
                                                <td>
                                                    <span class="badge badge-light-info">In progress</span>
                                                </td>
                                                <td>Oct 24, 2020</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">102445788</a>
                                                </td>
                                                <td class="text-success">$38.00</td>
                                                <td>
                                                    <span class="badge badge-light-info">In progress</span>
                                                </td>
                                                <td>Nov 01, 2020</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">423445721</a>
                                                </td>
                                                <td class="text-danger">$-2.60</td>
                                                <td>
                                                    <span class="badge badge-light-danger">Rejected</span>
                                                </td>
                                                <td>Oct 24, 2020</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">426445943</a>
                                                </td>
                                                <td class="text-success">$31.00</td>
                                                <td>
                                                    <span class="badge badge-light-danger">Rejected</span>
                                                </td>
                                                <td>Feb 09, 2020</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">984445943</a>
                                                </td>
                                                <td class="text-success">$52.00</td>
                                                <td>
                                                    <span class="badge badge-light-info">In progress</span>
                                                </td>
                                                <td>Nov 01, 2020</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">324442313</a>
                                                </td>
                                                <td class="text-danger">$-0.80</td>
                                                <td>
                                                    <span class="badge badge-light-warning">Pending</span>
                                                </td>
                                                <td>Jan 04, 2020</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">312445984</a>
                                                </td>
                                                <td class="text-success">$76.00</td>
                                                <td>
                                                    <span class="badge badge-light-warning">Pending</span>
                                                </td>
                                                <td>Oct 08, 2020</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">312445984</a>
                                                </td>
                                                <td class="text-success">$76.00</td>
                                                <td>
                                                    <span class="badge badge-light-warning">Pending</span>
                                                </td>
                                                <td>Oct 08, 2020</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <!--end::Tbody-->
                                    </table>
                                    <!--end::Table-->
                                </div>
                                <!--end::Tab panel-->
                            </div>
                            <!--end::Tab Content-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end:::Tab pane-->
                <!--begin:::Tab pane-->
                <div class="tab-pane fade" id="customer_subscription" role="tabpanel">
                    <!--begin::Card-->
                    <div class="card pt-4 mb-6 mb-xl-9">
                        <!--begin::Card header-->
                        <div class="card-header border-0">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2>Logs</h2>
                            </div>
                            <!--end::Card title-->
                            <!--begin::Card toolbar-->
                            <div class="card-toolbar">
                                <!--begin::Button-->
                                <button type="button" class="btn btn-sm btn-light-primary">
                                <!--begin::Svg Icon | path: icons/duotone/Files/Download.svg-->
                                <span class="svg-icon svg-icon-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <path d="M2,13 C2,12.5 2.5,12 3,12 C3.5,12 4,12.5 4,13 C4,13.3333333 4,15 4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 C2,15 2,13.3333333 2,13 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                            <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 8.000000) rotate(-180.000000) translate(-12.000000, -8.000000)" x="11" y="1" width="2" height="14" rx="1" />
                                            <path d="M7.70710678,15.7071068 C7.31658249,16.0976311 6.68341751,16.0976311 6.29289322,15.7071068 C5.90236893,15.3165825 5.90236893,14.6834175 6.29289322,14.2928932 L11.2928932,9.29289322 C11.6689749,8.91681153 12.2736364,8.90091039 12.6689647,9.25670585 L17.6689647,13.7567059 C18.0794748,14.1261649 18.1127532,14.7584547 17.7432941,15.1689647 C17.3738351,15.5794748 16.7415453,15.6127532 16.3310353,15.2432941 L12.0362375,11.3779761 L7.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000004, 12.499999) rotate(-180.000000) translate(-12.000004, -12.499999)" />
                                        </g>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->Download Report</button>
                                <!--end::Button-->
                            </div>
                            <!--end::Card toolbar-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body py-0">
                            <!--begin::Table wrapper-->
                            <div class="table-responsive">
                                <!--begin::Table-->
                                <table class="table align-middle table-row-dashed fw-bold text-gray-600 fs-6 gy-5" id="kt_table_customers_logs">
                                    <!--begin::Table body-->
                                    <tbody>
                                        <!--begin::Table row-->
                                        <tr>
                                            <!--begin::Badge=-->
                                            <td class="min-w-70px">
                                                <div class="badge badge-light-warning">404 WRN</div>
                                            </td>
                                            <!--end::Badge=-->
                                            <!--begin::Status=-->
                                            <td>POST /v1/customer/c_60f19304be7cd/not_found</td>
                                            <!--end::Status=-->
                                            <!--begin::Timestamp=-->
                                            <td class="pe-0 text-end min-w-200px">20 Dec 2021, 10:30 am</td>
                                            <!--end::Timestamp=-->
                                        </tr>
                                        <!--end::Table row-->
                                        <!--begin::Table row-->
                                        <tr>
                                            <!--begin::Badge=-->
                                            <td class="min-w-70px">
                                                <div class="badge badge-light-danger">500 ERR</div>
                                            </td>
                                            <!--end::Badge=-->
                                            <!--begin::Status=-->
                                            <td>POST /v1/invoice/in_3292_7847/invalid</td>
                                            <!--end::Status=-->
                                            <!--begin::Timestamp=-->
                                            <td class="pe-0 text-end min-w-200px">21 Feb 2021, 9:23 pm</td>
                                            <!--end::Timestamp=-->
                                        </tr>
                                        <!--end::Table row-->
                                        <!--begin::Table row-->
                                        <tr>
                                            <!--begin::Badge=-->
                                            <td class="min-w-70px">
                                                <div class="badge badge-light-danger">500 ERR</div>
                                            </td>
                                            <!--end::Badge=-->
                                            <!--begin::Status=-->
                                            <td>POST /v1/invoice/in_4644_8284/invalid</td>
                                            <!--end::Status=-->
                                            <!--begin::Timestamp=-->
                                            <td class="pe-0 text-end min-w-200px">22 Sep 2021, 8:43 pm</td>
                                            <!--end::Timestamp=-->
                                        </tr>
                                        <!--end::Table row-->
                                        <!--begin::Table row-->
                                        <tr>
                                            <!--begin::Badge=-->
                                            <td class="min-w-70px">
                                                <div class="badge badge-light-success">200 OK</div>
                                            </td>
                                            <!--end::Badge=-->
                                            <!--begin::Status=-->
                                            <td>POST /v1/invoices/in_8061_2184/payment</td>
                                            <!--end::Status=-->
                                            <!--begin::Timestamp=-->
                                            <td class="pe-0 text-end min-w-200px">20 Jun 2021, 2:40 pm</td>
                                            <!--end::Timestamp=-->
                                        </tr>
                                        <!--end::Table row-->
                                        <!--begin::Table row-->
                                        <tr>
                                            <!--begin::Badge=-->
                                            <td class="min-w-70px">
                                                <div class="badge badge-light-success">200 OK</div>
                                            </td>
                                            <!--end::Badge=-->
                                            <!--begin::Status=-->
                                            <td>POST /v1/invoices/in_6950_4356/payment</td>
                                            <!--end::Status=-->
                                            <!--begin::Timestamp=-->
                                            <td class="pe-0 text-end min-w-200px">05 May 2021, 6:05 pm</td>
                                            <!--end::Timestamp=-->
                                        </tr>
                                        <!--end::Table row-->
                                        <!--begin::Table row-->
                                        <tr>
                                            <!--begin::Badge=-->
                                            <td class="min-w-70px">
                                                <div class="badge badge-light-warning">404 WRN</div>
                                            </td>
                                            <!--end::Badge=-->
                                            <!--begin::Status=-->
                                            <td>POST /v1/customer/c_60f19304be7cd/not_found</td>
                                            <!--end::Status=-->
                                            <!--begin::Timestamp=-->
                                            <td class="pe-0 text-end min-w-200px">21 Feb 2021, 5:20 pm</td>
                                            <!--end::Timestamp=-->
                                        </tr>
                                        <!--end::Table row-->
                                        <!--begin::Table row-->
                                        <tr>
                                            <!--begin::Badge=-->
                                            <td class="min-w-70px">
                                                <div class="badge badge-light-danger">500 ERR</div>
                                            </td>
                                            <!--end::Badge=-->
                                            <!--begin::Status=-->
                                            <td>POST /v1/invoice/in_3292_7847/invalid</td>
                                            <!--end::Status=-->
                                            <!--begin::Timestamp=-->
                                            <td class="pe-0 text-end min-w-200px">05 May 2021, 5:30 pm</td>
                                            <!--end::Timestamp=-->
                                        </tr>
                                        <!--end::Table row-->
                                        <!--begin::Table row-->
                                        <tr>
                                            <!--begin::Badge=-->
                                            <td class="min-w-70px">
                                                <div class="badge badge-light-success">200 OK</div>
                                            </td>
                                            <!--end::Badge=-->
                                            <!--begin::Status=-->
                                            <td>POST /v1/invoices/in_9280_2266/payment</td>
                                            <!--end::Status=-->
                                            <!--begin::Timestamp=-->
                                            <td class="pe-0 text-end min-w-200px">10 Mar 2021, 5:20 pm</td>
                                            <!--end::Timestamp=-->
                                        </tr>
                                        <!--end::Table row-->
                                        <!--begin::Table row-->
                                        <tr>
                                            <!--begin::Badge=-->
                                            <td class="min-w-70px">
                                                <div class="badge badge-light-success">200 OK</div>
                                            </td>
                                            <!--end::Badge=-->
                                            <!--begin::Status=-->
                                            <td>POST /v1/invoices/in_5940_8947/payment</td>
                                            <!--end::Status=-->
                                            <!--begin::Timestamp=-->
                                            <td class="pe-0 text-end min-w-200px">20 Dec 2021, 11:05 am</td>
                                            <!--end::Timestamp=-->
                                        </tr>
                                        <!--end::Table row-->
                                        <!--begin::Table row-->
                                        <tr>
                                            <!--begin::Badge=-->
                                            <td class="min-w-70px">
                                                <div class="badge badge-light-success">200 OK</div>
                                            </td>
                                            <!--end::Badge=-->
                                            <!--begin::Status=-->
                                            <td>POST /v1/invoices/in_5786_9244/payment</td>
                                            <!--end::Status=-->
                                            <!--begin::Timestamp=-->
                                            <td class="pe-0 text-end min-w-200px">25 Oct 2021, 6:05 pm</td>
                                            <!--end::Timestamp=-->
                                        </tr>
                                        <!--end::Table row-->
                                    </tbody>
                                    <!--end::Table body-->
                                </table>
                                <!--end::Table-->
                            </div>
                            <!--end::Table wrapper-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                    <!--begin::Card-->
                    <div class="card pt-4 mb-6 mb-xl-9">
                        <!--begin::Card header-->
                        <div class="card-header border-0">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2>Events</h2>
                            </div>
                            <!--end::Card title-->
                            <!--begin::Card toolbar-->
                            <div class="card-toolbar">
                                <!--begin::Button-->
                                <button type="button" class="btn btn-sm btn-light-primary">
                                <!--begin::Svg Icon | path: icons/duotone/Files/Download.svg-->
                                <span class="svg-icon svg-icon-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <path d="M2,13 C2,12.5 2.5,12 3,12 C3.5,12 4,12.5 4,13 C4,13.3333333 4,15 4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 C2,15 2,13.3333333 2,13 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                            <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 8.000000) rotate(-180.000000) translate(-12.000000, -8.000000)" x="11" y="1" width="2" height="14" rx="1" />
                                            <path d="M7.70710678,15.7071068 C7.31658249,16.0976311 6.68341751,16.0976311 6.29289322,15.7071068 C5.90236893,15.3165825 5.90236893,14.6834175 6.29289322,14.2928932 L11.2928932,9.29289322 C11.6689749,8.91681153 12.2736364,8.90091039 12.6689647,9.25670585 L17.6689647,13.7567059 C18.0794748,14.1261649 18.1127532,14.7584547 17.7432941,15.1689647 C17.3738351,15.5794748 16.7415453,15.6127532 16.3310353,15.2432941 L12.0362375,11.3779761 L7.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000004, 12.499999) rotate(-180.000000) translate(-12.000004, -12.499999)" />
                                        </g>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->Download Report</button>
                                <!--end::Button-->
                            </div>
                            <!--end::Card toolbar-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body py-0">
                            <!--begin::Table-->
                            <table class="table align-middle table-row-dashed fs-6 text-gray-600 fw-bold gy-5" id="kt_table_customers_events">
                                <!--begin::Table body-->
                                <tbody>
                                    <!--begin::Table row-->
                                    <tr>
                                        <!--begin::Event=-->
                                        <td class="min-w-400px">
                                        <a href="#" class="text-gray-600 text-hover-primary me-1">Sean Bean</a>has made payment to
                                        <a href="#" class="fw-bolder text-gray-900 text-hover-primary">#XRS-45670</a></td>
                                        <!--end::Event=-->
                                        <!--begin::Timestamp=-->
                                        <td class="pe-0 text-gray-600 text-end min-w-200px">10 Mar 2021, 8:43 pm</td>
                                        <!--end::Timestamp=-->
                                    </tr>
                                    <!--end::Table row-->
                                    <!--begin::Table row-->
                                    <tr>
                                        <!--begin::Event=-->
                                        <td class="min-w-400px">Invoice
                                        <a href="#" class="fw-bolder text-gray-900 text-hover-primary me-1">#WER-45670</a>is
                                        <span class="badge badge-light-info">In Progress</span></td>
                                        <!--end::Event=-->
                                        <!--begin::Timestamp=-->
                                        <td class="pe-0 text-gray-600 text-end min-w-200px">25 Jul 2021, 10:30 am</td>
                                        <!--end::Timestamp=-->
                                    </tr>
                                    <!--end::Table row-->
                                    <!--begin::Table row-->
                                    <tr>
                                        <!--begin::Event=-->
                                        <td class="min-w-400px">Invoice
                                        <a href="#" class="fw-bolder text-gray-900 text-hover-primary me-1">#KIO-45656</a>status has changed from
                                        <span class="badge badge-light-succees me-1">In Transit</span>to
                                        <span class="badge badge-light-success">Approved</span></td>
                                        <!--end::Event=-->
                                        <!--begin::Timestamp=-->
                                        <td class="pe-0 text-gray-600 text-end min-w-200px">25 Oct 2021, 5:30 pm</td>
                                        <!--end::Timestamp=-->
                                    </tr>
                                    <!--end::Table row-->
                                    <!--begin::Table row-->
                                    <tr>
                                        <!--begin::Event=-->
                                        <td class="min-w-400px">Invoice
                                        <a href="#" class="fw-bolder text-gray-900 text-hover-primary me-1">#WER-45670</a>is
                                        <span class="badge badge-light-info">In Progress</span></td>
                                        <!--end::Event=-->
                                        <!--begin::Timestamp=-->
                                        <td class="pe-0 text-gray-600 text-end min-w-200px">10 Mar 2021, 10:30 am</td>
                                        <!--end::Timestamp=-->
                                    </tr>
                                    <!--end::Table row-->
                                    <!--begin::Table row-->
                                    <tr>
                                        <!--begin::Event=-->
                                        <td class="min-w-400px">
                                        <a href="#" class="text-gray-600 text-hover-primary me-1">Emma Smith</a>has made payment to
                                        <a href="#" class="fw-bolder text-gray-900 text-hover-primary">#XRS-45670</a></td>
                                        <!--end::Event=-->
                                        <!--begin::Timestamp=-->
                                        <td class="pe-0 text-gray-600 text-end min-w-200px">10 Nov 2021, 9:23 pm</td>
                                        <!--end::Timestamp=-->
                                    </tr>
                                    <!--end::Table row-->
                                    <!--begin::Table row-->
                                    <tr>
                                        <!--begin::Event=-->
                                        <td class="min-w-400px">Invoice
                                        <a href="#" class="fw-bolder text-gray-900 text-hover-primary me-1">#KIO-45656</a>status has changed from
                                        <span class="badge badge-light-succees me-1">In Transit</span>to
                                        <span class="badge badge-light-success">Approved</span></td>
                                        <!--end::Event=-->
                                        <!--begin::Timestamp=-->
                                        <td class="pe-0 text-gray-600 text-end min-w-200px">19 Aug 2021, 6:43 am</td>
                                        <!--end::Timestamp=-->
                                    </tr>
                                    <!--end::Table row-->
                                    <!--begin::Table row-->
                                    <tr>
                                        <!--begin::Event=-->
                                        <td class="min-w-400px">
                                        <a href="#" class="text-gray-600 text-hover-primary me-1">Melody Macy</a>has made payment to
                                        <a href="#" class="fw-bolder text-gray-900 text-hover-primary">#XRS-45670</a></td>
                                        <!--end::Event=-->
                                        <!--begin::Timestamp=-->
                                        <td class="pe-0 text-gray-600 text-end min-w-200px">25 Oct 2021, 6:43 am</td>
                                        <!--end::Timestamp=-->
                                    </tr>
                                    <!--end::Table row-->
                                    <!--begin::Table row-->
                                    <tr>
                                        <!--begin::Event=-->
                                        <td class="min-w-400px">
                                        <a href="#" class="text-gray-600 text-hover-primary me-1">Max Smith</a>has made payment to
                                        <a href="#" class="fw-bolder text-gray-900 text-hover-primary">#SDK-45670</a></td>
                                        <!--end::Event=-->
                                        <!--begin::Timestamp=-->
                                        <td class="pe-0 text-gray-600 text-end min-w-200px">20 Jun 2021, 2:40 pm</td>
                                        <!--end::Timestamp=-->
                                    </tr>
                                    <!--end::Table row-->
                                    <!--begin::Table row-->
                                    <tr>
                                        <!--begin::Event=-->
                                        <td class="min-w-400px">Invoice
                                        <a href="#" class="fw-bolder text-gray-900 text-hover-primary me-1">#LOP-45640</a>has been
                                        <span class="badge badge-light-danger">Declined</span></td>
                                        <!--end::Event=-->
                                        <!--begin::Timestamp=-->
                                        <td class="pe-0 text-gray-600 text-end min-w-200px">19 Aug 2021, 6:05 pm</td>
                                        <!--end::Timestamp=-->
                                    </tr>
                                    <!--end::Table row-->
                                    <!--begin::Table row-->
                                    <tr>
                                        <!--begin::Event=-->
                                        <td class="min-w-400px">Invoice
                                        <a href="#" class="fw-bolder text-gray-900 text-hover-primary me-1">#WER-45670</a>is
                                        <span class="badge badge-light-info">In Progress</span></td>
                                        <!--end::Event=-->
                                        <!--begin::Timestamp=-->
                                        <td class="pe-0 text-gray-600 text-end min-w-200px">21 Feb 2021, 2:40 pm</td>
                                        <!--end::Timestamp=-->
                                    </tr>
                                    <!--end::Table row-->
                                </tbody>
                                <!--end::Table body-->
                            </table>
                            <!--end::Table-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end:::Tab pane-->
                <!--begin:::Tab pane-->
                <div class="tab-pane fade" id="customer_payments" role="tabpanel">
                    <!--begin::Earnings-->
                    <div class="card mb-6 mb-xl-9">
                        <!--begin::Header-->
                        <div class="card-header border-0">
                            <div class="card-title">
                                <h2>Earnings</h2>
                            </div>
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body py-0">
                            <div class="fs-5 fw-bold text-gray-500 mb-4">Last 30 day earnings calculated. Apart from arranging the order of topics.</div>
                            <!--begin::Left Section-->
                            <div class="d-flex flex-wrap flex-stack mb-5">
                                <!--begin::Row-->
                                <div class="d-flex flex-wrap">
                                    <!--begin::Col-->
                                    <div class="border border-dashed border-gray-300 w-150px rounded my-3 p-4 me-6">
                                        <span class="fs-1 fw-bolder text-gray-800 lh-1">
                                            <span data-kt-countup="true" data-kt-countup-value="6,840" data-kt-countup-prefix="$">0</span>
                                            <!--begin::Svg Icon | path: icons/duotone/Navigation/Arrow-up.svg-->
                                            <span class="svg-icon svg-icon-1 svg-icon-success">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <polygon points="0 0 24 0 24 24 0 24" />
                                                        <rect fill="#000000" opacity="0.5" x="11" y="5" width="2" height="14" rx="1" />
                                                        <path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z" fill="#000000" fill-rule="nonzero" />
                                                    </g>
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <span class="fs-6 fw-bold text-muted d-block lh-1 pt-2">Net Earnings</span>
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="border border-dashed border-gray-300 w-125px rounded my-3 p-4 me-6">
                                        <span class="fs-1 fw-bolder text-gray-800 lh-1">
                                        <span class="" data-kt-countup="true" data-kt-countup-value="16">0</span>%
                                        <!--begin::Svg Icon | path: icons/duotone/Navigation/Arrow-down.svg-->
                                        <span class="svg-icon svg-icon-1 svg-icon-danger">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24" />
                                                    <rect fill="#000000" opacity="0.5" x="11" y="5" width="2" height="14" rx="1" />
                                                    <path d="M6.70710678,18.7071068 C6.31658249,19.0976311 5.68341751,19.0976311 5.29289322,18.7071068 C4.90236893,18.3165825 4.90236893,17.6834175 5.29289322,17.2928932 L11.2928932,11.2928932 C11.6714722,10.9143143 12.2810586,10.9010687 12.6757246,11.2628459 L18.6757246,16.7628459 C19.0828436,17.1360383 19.1103465,17.7686056 18.7371541,18.1757246 C18.3639617,18.5828436 17.7313944,18.6103465 17.3242754,18.2371541 L12.0300757,13.3841378 L6.70710678,18.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000003, 14.999999) scale(1, -1) translate(-12.000003, -14.999999)" />
                                                </g>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon--></span>
                                        <span class="fs-6 fw-bold text-muted d-block lh-1 pt-2">Change</span>
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="border border-dashed border-gray-300 w-150px rounded my-3 p-4 me-6">
                                        <span class="fs-1 fw-bolder text-gray-800 lh-1">
                                            <span data-kt-countup="true" data-kt-countup-value="1,240" data-kt-countup-prefix="$">0</span>
                                            <span class="text-primary">--</span>
                                        </span>
                                        <span class="fs-6 fw-bold text-muted d-block lh-1 pt-2">Fees</span>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Row-->
                                <a href="#" class="btn btn-sm btn-light-primary flex-shrink-0">Withdraw Earnings</a>
                            </div>
                            <!--end::Left Section-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Earnings-->
                    <!--begin::Statements-->
                    <div class="card mb-6 mb-xl-9">
                        <!--begin::Header-->
                        <div class="card-header">
                            <!--begin::Title-->
                            <div class="card-title">
                                <h2>Statement</h2>
                            </div>
                            <!--end::Title-->
                            <!--begin::Toolbar-->
                            <div class="card-toolbar">
                                <!--begin::Tab nav-->
                                <ul class="nav nav-stretch fs-5 fw-bold nav-line-tabs nav-line-tabs-2x border-transparent" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link text-active-primary active" data-bs-toggle="tab" role="tab" href="#kt_customer_view_statement_1">This Year</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link text-active-primary ms-3" data-bs-toggle="tab" role="tab" href="#kt_customer_view_statement_2">2020</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link text-active-primary ms-3" data-bs-toggle="tab" role="tab" href="#kt_customer_view_statement_3">2019</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link text-active-primary ms-3" data-bs-toggle="tab" role="tab" href="#kt_customer_view_statement_4">2018</a>
                                    </li>
                                </ul>
                                <!--end::Tab nav-->
                            </div>
                            <!--end::Toolbar-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Card body-->
                        <div class="card-body pb-5">
                            <!--begin::Tab Content-->
                            <div id="kt_customer_view_statement_tab_content" class="tab-content">
                                <!--begin::Tab panel-->
                                <div id="kt_customer_view_statement_1" class="py-0 tab-pane fade show active" role="tabpanel">
                                    <!--begin::Table-->
                                    <table id="kt_customer_view_statement_table_1" class="table align-middle table-row-dashed fs-6 text-gray-600 fw-bold gy-4">
                                        <!--begin::Table head-->
                                        <thead class="border-bottom border-gray-200">
                                            <!--begin::Table row-->
                                            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                                <th class="w-125px">Date</th>
                                                <th class="w-100px">Order ID</th>
                                                <th class="w-300px">Details</th>
                                                <th class="w-100px">Amount</th>
                                                <th class="w-100px text-end pe-7">Invoice</th>
                                            </tr>
                                            <!--end::Table row-->
                                        </thead>
                                        <!--end::Table head-->
                                        <!--begin::Table body-->
                                        <tbody>
                                            <tr>
                                                <td>Nov 01, 2021</td>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">102445788</a>
                                                </td>
                                                <td>Darknight transparency 36 Icons Pack</td>
                                                <td class="text-success">$38.00</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Oct 24, 2021</td>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">423445721</a>
                                                </td>
                                                <td>Seller Fee</td>
                                                <td class="text-danger">$-2.60</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Oct 08, 2021</td>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">312445984</a>
                                                </td>
                                                <td>Cartoon Mobile Emoji Phone Pack</td>
                                                <td class="text-success">$76.00</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Sep 15, 2021</td>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">312445984</a>
                                                </td>
                                                <td>Iphone 12 Pro Mockup Mega Bundle</td>
                                                <td class="text-success">$5.00</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>May 30, 2021</td>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">523445943</a>
                                                </td>
                                                <td>Seller Fee</td>
                                                <td class="text-danger">$-1.30</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Apr 22, 2021</td>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">231445943</a>
                                                </td>
                                                <td>Parcel Shipping / Delivery Service App</td>
                                                <td class="text-success">$204.00</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Feb 09, 2021</td>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">426445943</a>
                                                </td>
                                                <td>Visual Design Illustration</td>
                                                <td class="text-success">$31.00</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Nov 01, 2021</td>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">984445943</a>
                                                </td>
                                                <td>Abstract Vusial Pack</td>
                                                <td class="text-success">$52.00</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Jan 04, 2021</td>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">324442313</a>
                                                </td>
                                                <td>Seller Fee</td>
                                                <td class="text-danger">$-0.80</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Nov 01, 2021</td>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">102445788</a>
                                                </td>
                                                <td>Darknight transparency 36 Icons Pack</td>
                                                <td class="text-success">$38.00</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Oct 24, 2021</td>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">423445721</a>
                                                </td>
                                                <td>Seller Fee</td>
                                                <td class="text-danger">$-2.60</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Oct 08, 2021</td>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">312445984</a>
                                                </td>
                                                <td>Cartoon Mobile Emoji Phone Pack</td>
                                                <td class="text-success">$76.00</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Sep 15, 2021</td>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">312445984</a>
                                                </td>
                                                <td>Iphone 12 Pro Mockup Mega Bundle</td>
                                                <td class="text-success">$5.00</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>May 30, 2021</td>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">523445943</a>
                                                </td>
                                                <td>Seller Fee</td>
                                                <td class="text-danger">$-1.30</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Apr 22, 2021</td>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">231445943</a>
                                                </td>
                                                <td>Parcel Shipping / Delivery Service App</td>
                                                <td class="text-success">$204.00</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Feb 09, 2021</td>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">426445943</a>
                                                </td>
                                                <td>Visual Design Illustration</td>
                                                <td class="text-success">$31.00</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Nov 01, 2021</td>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">984445943</a>
                                                </td>
                                                <td>Abstract Vusial Pack</td>
                                                <td class="text-success">$52.00</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Jan 04, 2021</td>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">324442313</a>
                                                </td>
                                                <td>Seller Fee</td>
                                                <td class="text-danger">$-0.80</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <!--end::Table body-->
                                    </table>
                                    <!--end::Table-->
                                </div>
                                <!--end::Tab panel-->
                                <!--begin::Tab panel-->
                                <div id="kt_customer_view_statement_2" class="py-0 tab-pane fade" role="tabpanel">
                                    <!--begin::Table-->
                                    <table id="kt_customer_view_statement_table_2" class="table align-middle table-row-dashed fs-6 text-gray-600 fw-bold gy-4">
                                        <!--begin::Table head-->
                                        <thead class="border-bottom border-gray-200">
                                            <!--begin::Table row-->
                                            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                                <th class="w-125px">Date</th>
                                                <th class="w-100px">Order ID</th>
                                                <th class="w-300px">Details</th>
                                                <th class="w-100px">Amount</th>
                                                <th class="w-100px text-end pe-7">Invoice</th>
                                            </tr>
                                            <!--end::Table row-->
                                        </thead>
                                        <!--end::Table head-->
                                        <!--begin::Table body-->
                                        <tbody>
                                            <tr>
                                                <td>May 30, 2020</td>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">523445943</a>
                                                </td>
                                                <td>Seller Fee</td>
                                                <td class="text-danger">$-1.30</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Apr 22, 2020</td>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">231445943</a>
                                                </td>
                                                <td>Parcel Shipping / Delivery Service App</td>
                                                <td class="text-success">$204.00</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Feb 09, 2020</td>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">426445943</a>
                                                </td>
                                                <td>Visual Design Illustration</td>
                                                <td class="text-success">$31.00</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Nov 01, 2020</td>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">984445943</a>
                                                </td>
                                                <td>Abstract Vusial Pack</td>
                                                <td class="text-success">$52.00</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Jan 04, 2020</td>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">324442313</a>
                                                </td>
                                                <td>Seller Fee</td>
                                                <td class="text-danger">$-0.80</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Nov 01, 2020</td>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">102445788</a>
                                                </td>
                                                <td>Darknight transparency 36 Icons Pack</td>
                                                <td class="text-success">$38.00</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Oct 24, 2020</td>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">423445721</a>
                                                </td>
                                                <td>Seller Fee</td>
                                                <td class="text-danger">$-2.60</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Oct 08, 2020</td>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">312445984</a>
                                                </td>
                                                <td>Cartoon Mobile Emoji Phone Pack</td>
                                                <td class="text-success">$76.00</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Sep 15, 2020</td>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">312445984</a>
                                                </td>
                                                <td>Iphone 12 Pro Mockup Mega Bundle</td>
                                                <td class="text-success">$5.00</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>May 30, 2020</td>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">523445943</a>
                                                </td>
                                                <td>Seller Fee</td>
                                                <td class="text-danger">$-1.30</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Apr 22, 2020</td>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">231445943</a>
                                                </td>
                                                <td>Parcel Shipping / Delivery Service App</td>
                                                <td class="text-success">$204.00</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Feb 09, 2020</td>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">426445943</a>
                                                </td>
                                                <td>Visual Design Illustration</td>
                                                <td class="text-success">$31.00</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Nov 01, 2020</td>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">984445943</a>
                                                </td>
                                                <td>Abstract Vusial Pack</td>
                                                <td class="text-success">$52.00</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Jan 04, 2020</td>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">324442313</a>
                                                </td>
                                                <td>Seller Fee</td>
                                                <td class="text-danger">$-0.80</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Nov 01, 2020</td>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">102445788</a>
                                                </td>
                                                <td>Darknight transparency 36 Icons Pack</td>
                                                <td class="text-success">$38.00</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Oct 24, 2020</td>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">423445721</a>
                                                </td>
                                                <td>Seller Fee</td>
                                                <td class="text-danger">$-2.60</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Oct 08, 2020</td>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">312445984</a>
                                                </td>
                                                <td>Cartoon Mobile Emoji Phone Pack</td>
                                                <td class="text-success">$76.00</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Sep 15, 2020</td>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">312445984</a>
                                                </td>
                                                <td>Iphone 12 Pro Mockup Mega Bundle</td>
                                                <td class="text-success">$5.00</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <!--end::Table body-->
                                    </table>
                                    <!--end::Table-->
                                </div>
                                <!--end::Tab panel-->
                                <!--begin::Tab panel-->
                                <div id="kt_customer_view_statement_3" class="py-0 tab-pane fade" role="tabpanel">
                                    <!--begin::Table-->
                                    <table id="kt_customer_view_statement_table_3" class="table align-middle table-row-dashed fs-6 text-gray-600 fw-bold gy-4">
                                        <!--begin::Table head-->
                                        <thead class="border-bottom border-gray-200">
                                            <!--begin::Table row-->
                                            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                                <th class="w-125px">Date</th>
                                                <th class="w-100px">Order ID</th>
                                                <th class="w-300px">Details</th>
                                                <th class="w-100px">Amount</th>
                                                <th class="w-100px text-end pe-7">Invoice</th>
                                            </tr>
                                            <!--end::Table row-->
                                        </thead>
                                        <!--end::Table head-->
                                        <!--begin::Table body-->
                                        <tbody>
                                            <tr>
                                                <td>Feb 09, 2019</td>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">426445943</a>
                                                </td>
                                                <td>Visual Design Illustration</td>
                                                <td class="text-success">$31.00</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Nov 01, 2019</td>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">984445943</a>
                                                </td>
                                                <td>Abstract Vusial Pack</td>
                                                <td class="text-success">$52.00</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Jan 04, 2019</td>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">324442313</a>
                                                </td>
                                                <td>Seller Fee</td>
                                                <td class="text-danger">$-0.80</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Sep 15, 2019</td>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">312445984</a>
                                                </td>
                                                <td>Iphone 12 Pro Mockup Mega Bundle</td>
                                                <td class="text-success">$5.00</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Nov 01, 2019</td>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">102445788</a>
                                                </td>
                                                <td>Darknight transparency 36 Icons Pack</td>
                                                <td class="text-success">$38.00</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Oct 24, 2019</td>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">423445721</a>
                                                </td>
                                                <td>Seller Fee</td>
                                                <td class="text-danger">$-2.60</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Oct 08, 2019</td>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">312445984</a>
                                                </td>
                                                <td>Cartoon Mobile Emoji Phone Pack</td>
                                                <td class="text-success">$76.00</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>May 30, 2019</td>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">523445943</a>
                                                </td>
                                                <td>Seller Fee</td>
                                                <td class="text-danger">$-1.30</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Apr 22, 2019</td>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">231445943</a>
                                                </td>
                                                <td>Parcel Shipping / Delivery Service App</td>
                                                <td class="text-success">$204.00</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Feb 09, 2019</td>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">426445943</a>
                                                </td>
                                                <td>Visual Design Illustration</td>
                                                <td class="text-success">$31.00</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Nov 01, 2019</td>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">984445943</a>
                                                </td>
                                                <td>Abstract Vusial Pack</td>
                                                <td class="text-success">$52.00</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Jan 04, 2019</td>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">324442313</a>
                                                </td>
                                                <td>Seller Fee</td>
                                                <td class="text-danger">$-0.80</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Sep 15, 2019</td>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">312445984</a>
                                                </td>
                                                <td>Iphone 12 Pro Mockup Mega Bundle</td>
                                                <td class="text-success">$5.00</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Nov 01, 2019</td>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">102445788</a>
                                                </td>
                                                <td>Darknight transparency 36 Icons Pack</td>
                                                <td class="text-success">$38.00</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Oct 24, 2019</td>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">423445721</a>
                                                </td>
                                                <td>Seller Fee</td>
                                                <td class="text-danger">$-2.60</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Oct 08, 2019</td>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">312445984</a>
                                                </td>
                                                <td>Cartoon Mobile Emoji Phone Pack</td>
                                                <td class="text-success">$76.00</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>May 30, 2019</td>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">523445943</a>
                                                </td>
                                                <td>Seller Fee</td>
                                                <td class="text-danger">$-1.30</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Apr 22, 2019</td>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">231445943</a>
                                                </td>
                                                <td>Parcel Shipping / Delivery Service App</td>
                                                <td class="text-success">$204.00</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <!--end::Table body-->
                                    </table>
                                    <!--end::Table-->
                                </div>
                                <!--end::Tab panel-->
                                <!--begin::Tab panel-->
                                <div id="kt_customer_view_statement_4" class="py-0 tab-pane fade" role="tabpanel">
                                    <!--begin::Table-->
                                    <table id="kt_customer_view_statement_table_4" class="table align-middle table-row-dashed fs-6 text-gray-600 fw-bold gy-4">
                                        <!--begin::Table head-->
                                        <thead class="border-bottom border-gray-200">
                                            <!--begin::Table row-->
                                            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                                <th class="w-125px">Date</th>
                                                <th class="w-100px">Order ID</th>
                                                <th class="w-300px">Details</th>
                                                <th class="w-100px">Amount</th>
                                                <th class="w-100px text-end pe-7">Invoice</th>
                                            </tr>
                                            <!--end::Table row-->
                                        </thead>
                                        <!--end::Table head-->
                                        <!--begin::Table body-->
                                        <tbody>
                                            <tr>
                                                <td>Nov 01, 2018</td>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">102445788</a>
                                                </td>
                                                <td>Darknight transparency 36 Icons Pack</td>
                                                <td class="text-success">$38.00</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Oct 24, 2018</td>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">423445721</a>
                                                </td>
                                                <td>Seller Fee</td>
                                                <td class="text-danger">$-2.60</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Nov 01, 2018</td>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">102445788</a>
                                                </td>
                                                <td>Darknight transparency 36 Icons Pack</td>
                                                <td class="text-success">$38.00</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Oct 24, 2018</td>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">423445721</a>
                                                </td>
                                                <td>Seller Fee</td>
                                                <td class="text-danger">$-2.60</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Feb 09, 2018</td>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">426445943</a>
                                                </td>
                                                <td>Visual Design Illustration</td>
                                                <td class="text-success">$31.00</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Nov 01, 2018</td>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">984445943</a>
                                                </td>
                                                <td>Abstract Vusial Pack</td>
                                                <td class="text-success">$52.00</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Jan 04, 2018</td>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">324442313</a>
                                                </td>
                                                <td>Seller Fee</td>
                                                <td class="text-danger">$-0.80</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Oct 08, 2018</td>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">312445984</a>
                                                </td>
                                                <td>Cartoon Mobile Emoji Phone Pack</td>
                                                <td class="text-success">$76.00</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Oct 08, 2018</td>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">312445984</a>
                                                </td>
                                                <td>Cartoon Mobile Emoji Phone Pack</td>
                                                <td class="text-success">$76.00</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Feb 09, 2019</td>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">426445943</a>
                                                </td>
                                                <td>Visual Design Illustration</td>
                                                <td class="text-success">$31.00</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Nov 01, 2019</td>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">984445943</a>
                                                </td>
                                                <td>Abstract Vusial Pack</td>
                                                <td class="text-success">$52.00</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Jan 04, 2019</td>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">324442313</a>
                                                </td>
                                                <td>Seller Fee</td>
                                                <td class="text-danger">$-0.80</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Sep 15, 2019</td>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">312445984</a>
                                                </td>
                                                <td>Iphone 12 Pro Mockup Mega Bundle</td>
                                                <td class="text-success">$5.00</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Nov 01, 2019</td>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">102445788</a>
                                                </td>
                                                <td>Darknight transparency 36 Icons Pack</td>
                                                <td class="text-success">$38.00</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Oct 24, 2019</td>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">423445721</a>
                                                </td>
                                                <td>Seller Fee</td>
                                                <td class="text-danger">$-2.60</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Oct 08, 2019</td>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">312445984</a>
                                                </td>
                                                <td>Cartoon Mobile Emoji Phone Pack</td>
                                                <td class="text-success">$76.00</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>May 30, 2019</td>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">523445943</a>
                                                </td>
                                                <td>Seller Fee</td>
                                                <td class="text-danger">$-1.30</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Apr 22, 2019</td>
                                                <td>
                                                    <a href="#" class="text-gray-600 text-hover-primary">231445943</a>
                                                </td>
                                                <td>Parcel Shipping / Delivery Service App</td>
                                                <td class="text-success">$204.00</td>
                                                <td class="text-end">
                                                    <button class="btn btn-sm btn-light btn-active-light-primary">Download</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <!--end::Table body-->
                                    </table>
                                    <!--end::Table-->
                                </div>
                                <!--end::Tab panel-->
                            </div>
                            <!--end::Tab Content-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Statements-->
                </div>
                <!--end:::Tab pane-->
            </div>
            <!--end:::Tab content-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Layout-->
    <!--begin::Modals-->
    <!--begin::Modal - Add Payment-->
    <div class="modal fade" id="kt_modal_add_payment" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header">
                    <!--begin::Modal title-->
                    <h2 class="fw-bolder">Add a Payment Record</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div id="kt_modal_add_payment_close" class="btn btn-icon btn-sm btn-active-icon-primary">
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
                    <!--begin::Form-->
                    <form id="kt_modal_add_payment_form" class="form" action="#">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="fs-6 fw-bold form-label mb-2">
                                <span class="required">Invoice Number</span>
                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="The invoice number must be unique."></i>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-solid" name="invoice" value="" />
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fs-6 fw-bold form-label mb-2">Status</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <select class="form-select form-select-solid fw-bolder" name="status" data-control="select2" data-placeholder="Select an option" data-hide-search="true">
                                <option></option>
                                <option value="0">Approved</option>
                                <option value="1">Pending</option>
                                <option value="2">Rejected</option>
                                <option value="3">In progress</option>
                                <option value="4">Completed</option>
                            </select>
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fs-6 fw-bold form-label mb-2">Invoice Amount</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-solid" name="amount" value="" />
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-15">
                            <!--begin::Label-->
                            <label class="fs-6 fw-bold form-label mb-2">
                                <span class="required">Additional Information</span>
                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Information such as description of invoice or product purchased."></i>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <textarea class="form-control form-control-solid rounded-3" name="additional_info"></textarea>
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Actions-->
                        <div class="text-center">
                            <button type="reset" id="kt_modal_add_payment_cancel" class="btn btn-light me-3">Discard</button>
                            <button type="submit" id="kt_modal_add_payment_submit" class="btn btn-primary">
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
    </div>
    <!--end::Modal - New Card-->
    <!--begin::Modal - Adjust Balance-->
    <div class="modal fade" id="kt_modal_adjust_balance" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header">
                    <!--begin::Modal title-->
                    <h2 class="fw-bolder">Adjust Balance</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div id="kt_modal_adjust_balance_close" class="btn btn-icon btn-sm btn-active-icon-primary">
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
                    <!--begin::Balance preview-->
                    <div class="d-flex text-center mb-9">
                        <div class="w-50 border border-dashed border-gray-300 rounded mx-2 p-4">
                            <div class="fs-6 fw-bold mb-2 text-muted">Current Balance</div>
                            <div class="fs-2 fw-bolder" kt-modal-adjust-balance="current_balance">US$ 32,487.57</div>
                        </div>
                        <div class="w-50 border border-dashed border-gray-300 rounded mx-2 p-4">
                            <div class="fs-6 fw-bold mb-2 text-muted">New Balance
                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Enter an amount to preview the new balance."></i></div>
                            <div class="fs-2 fw-bolder" kt-modal-adjust-balance="new_balance">--</div>
                        </div>
                    </div>
                    <!--end::Balance preview-->
                    <!--begin::Form-->
                    <form id="kt_modal_adjust_balance_form" class="form" action="#">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fs-6 fw-bold form-label mb-2">Adjustment type</label>
                            <!--end::Label-->
                            <!--begin::Dropdown-->
                            <select class="form-select form-select-solid fw-bolder" name="adjustment" aria-label="Select an option" data-control="select2" data-dropdown-parent="#kt_modal_adjust_balance" data-placeholder="Select an option" data-hide-search="true">
                                <option></option>
                                <option value="1">Credit</option>
                                <option value="2">Debit</option>
                            </select>
                            <!--end::Dropdown-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fs-6 fw-bold form-label mb-2">Amount</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input id="kt_modal_inputmask" type="text" class="form-control form-control-solid" name="amount" value="" />
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="fs-6 fw-bold form-label mb-2">Add adjustment note</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <textarea class="form-control form-control-solid rounded-3 mb-5"></textarea>
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Disclaimer-->
                        <div class="fs-7 text-muted mb-15">Please be aware that all manual balance changes will be audited by the financial team every fortnight. Please maintain your invoices and receipts until then. Thank you.</div>
                        <!--end::Disclaimer-->
                        <!--begin::Actions-->
                        <div class="text-center">
                            <button type="reset" id="kt_modal_adjust_balance_cancel" class="btn btn-light me-3">Discard</button>
                            <button type="submit" id="kt_modal_adjust_balance_submit" class="btn btn-primary">
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
    </div>
    <!--end::Modal - New Card-->
    
    <!--begin::Modal - New Card-->
    <div class="modal fade" id="kt_modal_new_card" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header">
                    <!--begin::Modal title-->
                    <h2>Add New Card</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
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
                    <!--begin::Form-->
                    <form id="kt_modal_new_card_form" class="form" action="#">
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-7 fv-row">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                <span class="required">Name On Card</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify a card holder's name"></i>
                            </label>
                            <!--end::Label-->
                            <input type="text" class="form-control form-control-solid" placeholder="" name="card_name" value="Max Doe" />
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-7 fv-row">
                            <!--begin::Label-->
                            <label class="required fs-6 fw-bold form-label mb-2">Card Number</label>
                            <!--end::Label-->
                            <!--begin::Input wrapper-->
                            <div class="position-relative">
                                <!--begin::Input-->
                                <input type="text" class="form-control form-control-solid" placeholder="Enter card number" name="card_number" value="4111 1111 1111 1111" />
                                <!--end::Input-->
                                <!--begin::Card logos-->
                                <div class="position-absolute translate-middle-y top-50 end-0 me-5">
                                    <img src="assets/media/svg/card-logos/visa.svg" alt="" class="h-25px" />
                                    <img src="assets/media/svg/card-logos/mastercard.svg" alt="" class="h-25px" />
                                    <img src="assets/media/svg/card-logos/american-express.svg" alt="" class="h-25px" />
                                </div>
                                <!--end::Card logos-->
                            </div>
                            <!--end::Input wrapper-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-10">
                            <!--begin::Col-->
                            <div class="col-md-8 fv-row">
                                <!--begin::Label-->
                                <label class="required fs-6 fw-bold form-label mb-2">Expiration Date</label>
                                <!--end::Label-->
                                <!--begin::Row-->
                                <div class="row fv-row">
                                    <!--begin::Col-->
                                    <div class="col-6">
                                        <select name="card_expiry_month" class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Month">
                                            <option></option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                        </select>
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-6">
                                        <select name="card_expiry_year" class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Year">
                                            <option></option>
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                            <option value="2025">2025</option>
                                            <option value="2026">2026</option>
                                            <option value="2027">2027</option>
                                            <option value="2028">2028</option>
                                            <option value="2029">2029</option>
                                            <option value="2030">2030</option>
                                            <option value="2031">2031</option>
                                        </select>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Row-->
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-md-4 fv-row">
                                <!--begin::Label-->
                                <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                    <span class="required">CVV</span>
                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Enter a card CVV code"></i>
                                </label>
                                <!--end::Label-->
                                <!--begin::Input wrapper-->
                                <div class="position-relative">
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid" minlength="3" maxlength="4" placeholder="CVV" name="card_cvv" />
                                    <!--end::Input-->
                                    <!--begin::CVV icon-->
                                    <div class="position-absolute translate-middle-y top-50 end-0 me-3">
                                        <!--begin::Svg Icon | path: icons/duotone/Shopping/Credit-card.svg-->
                                        <span class="svg-icon svg-icon-2hx">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <rect fill="#000000" opacity="0.3" x="2" y="5" width="20" height="14" rx="2" />
                                                    <rect fill="#000000" x="2" y="8" width="20" height="3" />
                                                    <rect fill="#000000" opacity="0.3" x="16" y="14" width="4" height="2" rx="1" />
                                                </g>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </div>
                                    <!--end::CVV icon-->
                                </div>
                                <!--end::Input wrapper-->
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="d-flex flex-stack">
                            <!--begin::Label-->
                            <div class="me-5">
                                <label class="fs-6 fw-bold form-label">Save Card for further billing?</label>
                                <div class="fs-7 fw-bold text-muted">If you need more info, please check budget planning</div>
                            </div>
                            <!--end::Label-->
                            <!--begin::Switch-->
                            <label class="form-check form-switch form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="1" checked="checked" />
                                <span class="form-check-label fw-bold text-muted">Save Card</span>
                            </label>
                            <!--end::Switch-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Actions-->
                        <div class="text-center pt-15">
                            <button type="reset" id="kt_modal_new_card_cancel" class="btn btn-light me-3">Discard</button>
                            <button type="submit" id="kt_modal_new_card_submit" class="btn btn-primary">
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
    </div>
    <!--end::Modal - New Card-->
    <!--end::Modals-->
@endsection

@section('styles')
    <meta name="_token" content="{{ csrf_token() }}">
@endsection

@section('scripts')
    <script>
    </script>
@endsection
