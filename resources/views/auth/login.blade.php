<!DOCTYPE html>
<!--
Author: Keenthemes
Product Name: Metronic - #1 Selling Bootstrap 5 HTML Multi-demo Admin Dashboard Theme
Purchase: https://1.envato.market/EA4JP
Website: http://www.keenthemes.com
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="en">
	<!--begin::Head-->
	<head><base href="../../../">
		<meta charset="utf-8" />
		<title>Админ удирдлагад нэвтрэх | BeautyApps</title>
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link rel="canonical" href="" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="shortcut icon" href="{{ asset('assets/media/logos/favicon.ico') }}" />
		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="bg-body">
		<!--begin::Main-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Authentication - Sign-in -->
			<div class="d-flex flex-column flex-lg-row flex-column-fluid">
				<!--begin::Aside-->
				<div id="animate" class="d-flex flex-column flex-lg-row-auto w-xl-700px positon-xl-relative overflow-hidden" style="background-color: #1e1e2d">
					<!--begin::Wrapper-->
					{{-- <div class="d-flex flex-column position-xl-fixed top-0 bottom-0 w-xl-600px scroll-y">
						<!--begin::Content-->
						<div class="d-flex flex-row-fluid flex-column text-center p-10 pt-lg-20">
							<!--begin::Logo-->
							<a href="index.html" class="py-9">
								<img alt="Logo" src="{{ asset('assets/media/logos/beautysecrets.svg') }}" class="h-70px" />
							</a>
							<!--end::Logo-->
						</div>
						<!--end::Content-->
						<!--begin::Illustration-->
						<div class="d-flex flex-row-auto bgi-no-repeat bgi-position-x-center bgi-size-contain bgi-position-y-bottom min-h-100px min-h-lg-350px" style="background-image: url(assets/media/illustrations/checkout.png)"></div>
						<!--end::Illustration-->
					</div> --}}
					<!--end::Wrapper-->
				</div>
				<!--end::Aside-->
				<!--begin::Body-->
				<div class="d-flex flex-column flex-lg-row-fluid py-10">
					<!--begin::Content-->
					<div class="d-flex flex-center flex-column flex-column-fluid">
						<!--begin::Wrapper-->
						<div class="w-lg-500px p-10 p-lg-15 mx-auto">
							<!--begin::Form-->
							<form class="form w-100" novalidate="novalidate" method="POST" action="{{ route('login') }}">
                                @csrf
								<!--begin::Heading-->
								<div class="text-center mb-10">
									<!--begin::Title-->
									<img alt="Logo" src="{{ asset('assets/media/logos/beautysecrets.png') }}" class="h-70px" />
									<!--end::Title-->
								</div>
								<!--begin::Heading-->

                                <x-jet-validation-errors class="alert alert-danger mb-4" />
                                
                                @if (session('status'))
                                    <div class="mb-4 font-medium text-sm text-green-600">
                                        {{ session('status') }}
                                    </div>
                                @endif

								test  test test test
								<!--begin::Input group-->
								<div class="fv-row mb-10">
                                    <!--begin::Label-->
                                    <x-jet-label class="form-label fs-6 fw-bolder text-dark" for="email" value="И-мэйл" />
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <x-jet-input id="email" class="form-control form-control-lg form-control-solid" type="email" name="email" :value="old('email')" required autofocus />
                                    <!--end::Input-->
                                </div>
								<!--end::Input group-->
								<!--begin::Input group-->
								<div class="fv-row mb-10">
                                    <!--begin::Wrapper-->
                                    <div class="d-flex flex-stack mb-2">
                                        <!--begin::Label-->
                                        <x-jet-label class="form-label fw-bolder text-dark fs-6 mb-0" for="password" value="Нууц үг" />
                                        <!--end::Label-->
                                        <!--begin::Link-->
                                        @if (Route::has('password.request'))
                                            <a class="link-primary fs-6 fw-bolder" href="{{ route('password.request') }}">
                                                Нууц үг сэргээх
                                            </a>
                                        @endif
                                        <!--end::Link-->
                                    </div>
                                    <!--end::Wrapper-->
                                    <!--begin::Input-->
                                    <x-jet-input id="password" class="form-control form-control-lg form-control-solid" type="password" name="password" required autocomplete="current-password" />
                                    <!--end::Input-->
                                </div>
								<!--end::Input group-->
								<!--begin::Actions-->

								<div class="text-center">
									<!--begin::Submit button-->
									<button type="submit" class="btn btn-lg btn-primary w-100 mb-5 text-uppercase">
                                        <span class="indicator-label">Нэвтрэх</span>
                                    </button>
									<!--end::Submit button-->
									<!--begin::Separator-->
									<div class="text-center text-muted text-uppercase fw-bolder mb-5">эсвэл</div>
									<!--end::Separator-->
									<!--begin::Google link-->
									<a href="#" class="btn btn-flex flex-center btn-light btn-lg w-100 mb-5">
									<img alt="Logo" src="assets/media/svg/brand-logos/google-icon.svg" class="h-20px me-3" />Google хаягаараа нэвтрэх</a>
									<!--end::Google link-->
									<!--begin::Google link-->
									<a href="#" class="btn btn-flex flex-center btn-light btn-lg w-100 mb-5">
									<img alt="Logo" src="assets/media/svg/brand-logos/facebook-4.svg" class="h-20px me-3" />Facebook хаягаараа нэвтрэх</a>
									<!--end::Google link-->
									{{-- <!--begin::Google link-->
									<a href="#" class="btn btn-flex flex-center btn-light btn-lg w-100">
									<img alt="Logo" src="assets/media/svg/brand-logos/apple-black.svg" class="h-20px me-3" />Continue with Apple</a>
									<!--end::Google link--> --}}
								</div>
								<!--end::Actions-->
							</form>
							<!--end::Form-->
						</div>
						<!--end::Wrapper-->
					</div>
					<!--end::Content-->
				</div>
				<!--end::Body-->
			</div>
			<!--end::Authentication - Sign-in-->
		</div>
		<!--end::Main-->
		<!--begin::Javascript-->
		<!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
		<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
		<!--end::Global Javascript Bundle-->
		<!--end::Javascript-->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r121/three.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/vanta@0.5.22/dist/vanta.birds.min.js"></script>
		<script>
			VANTA.BIRDS({
			el: "#animate",
			mouseControls: true,
			touchControls: true,
			gyroControls: false,
			minHeight: 200.00,
			minWidth: 200.00,
			scale: 1.00,
			scaleMobile: 1.00,
  			backgroundColor: 0x1d171d
			})
		</script>
	</body>
	<!--end::Body-->
</html>