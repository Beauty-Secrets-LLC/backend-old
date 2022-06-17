<div class="card">
    <!-- begin::Body-->
    <div class="card-body py-20">
        <!-- begin::Wrapper-->
        <div class="mw-lg-950px mx-auto w-100">
            <!-- begin::Header-->
            <div class="d-flex justify-content-between flex-column flex-sm-row mb-19">
                <h4 class="fw-boldest text-gray-800 fs-2qx pe-5 pb-7">НЭХЭМЖЛЭЛ</h4>
                <!--end::Logo-->
                <div class="text-sm-end">
                    <!--begin::Logo-->
                    <a href="#">
                        <img alt="Logo" src="{{ asset('assets/media/logos/beautysecrets.png') }}" height="50">
                    </a>
                    <!--end::Logo-->
                    <!--begin::Text-->
                    <div class="text-sm-end fw-bold fs-4 text-muted mt-7">
                        <div>Ayud Tower, 14th Floor, 1401 Olymp Street 5, Sukhbaatar District,</div>
                        <div>Ulaanbaatar 14220, Mongolia  </div>
                    </div>
                    <!--end::Text-->
                </div>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="border-bottom">
                <!--begin::Image-->
                <div class="d-flex flex-row-fluid bgi-no-repeat bgi-position-x-center bgi-size-cover card-rounded h-150px h-lg-250px mb-lg-20" style="background-image: url({{ asset('assets/media/misc/invoice.jpg') }})"></div>
                <!--end::Image-->
                <!--begin::Wrapper-->
                <div class="d-flex justify-content-between flex-column flex-md-row">
                    <!--begin::Content-->
                    <div class="flex-grow-1 pt-8 mb-13">
                        <!--begin::Table-->
                        <div class="table-responsive border-bottom mb-14">
                            <table class="table">
                                <thead>
                                    <tr class="border-bottom fs-6 fw-bolder text-muted text-uppercase">
                                        <th class="min-w-175px pb-9">Бүтээгдэхүүн / Үйлчилгээ</th>
                                        <th class="min-w-70px pb-9 text-end">Үнэ</th>
                                        <th class="min-w-80px pb-9 text-end">Ширхэг</th>
                                        <th class="min-w-100px pe-lg-6 pb-9 text-end">Нийт</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($order['items'] as $item)
                                        <tr class="fw-bolder text-gray-700 fs-5 text-end">
                                            <td class="d-flex align-items-center pt-11">
                                                {{ $item['product']['name'] }}
                                            </td>
                                            <td class="pt-11">{{ price($item['subtotal']) }}</td>
                                            <td class="pt-11">{{ $item['quantity'] }}</td>
                                            <td class="pt-11 fs-5 pe-lg-6 text-dark fw-boldest">{{ price($item['total']) }}</td>
                                        </tr>
                                    @empty
                                        
                                    @endforelse
                                    
                                    
                                </tbody>
                            </table>
                        </div>
                        <!--end::Table-->
                        <!--begin::Section-->
                        <div class="d-flex ">
                            <div class="flex-fill">
                                <!--begin::Label-->
                                <div class="fw-bold fs-5 mb-3 text-dark00">ДАНСААР ШИЛЖҮҮЛЭХ</div>
                                <!--end::Label-->
                                <!--begin::Item-->
                                <div class="d-flex flex-stack text-gray-800 mb-3 fs-6">
                                    <!--begin::Accountname-->
                                    <div class="fw-bold pe-5">Банк:</div>
                                    <!--end::Accountname-->
                                    <!--begin::Label-->
                                    <div class="text-end fw-norma">Хаан банк</div>
                                    <!--end::Label-->
                                </div>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <div class="d-flex flex-stack text-gray-800 mb-3 fs-6">
                                    <!--begin::Accountnumber-->
                                    <div class="fw-bold pe-5">Дансны дугаар:</div>
                                    <!--end::Accountnumber-->
                                    <!--begin::Number-->
                                    <div class="text-end fw-norma">5111434801</div>
                                    <!--end::Number-->
                                </div>
                                <!--end::Item-->
                                <!--begin::Item-->
                                <div class="d-flex flex-stack text-gray-800 fs-6">
                                    <!--begin::Code-->
                                    <div class="fw-bold pe-5">Хүлээн авагч:</div>
                                    <!--end::Code-->
                                    <!--begin::Label-->
                                    <div class="text-end fw-norma">БЮТИ СЕКРЕТС</div>
                                    <!--end::Label-->
                                </div>
                                <!--end::Item-->
                            </div>

                            @if ($order['invoice']['payment_id'] == 1)
                                <div class="flex-fill align-items-end text-end">
                                    <img  width="200" src="data:image/png;base64, {{ $order['invoice']['data']['qr_image'] }}" alt="">
                                </div>
                            @endif

                           
                        </div>

        
                        <!--end::Section-->
                    </div>
                    <!--end::Content-->
                    <!--begin::Separator-->
                    <div class="border-end d-none d-md-block mh-450px mx-9"></div>
                    <!--end::Separator-->
                    <!--begin::Content-->
                    <div class="text-end pt-10">
                        <!--begin::Total Amount-->
                        <div class="fs-3 fw-bolder text-muted mb-3">НИЙТ ДҮН</div>
                        <div class="fs-xl-2x fs-2 fw-boldest">{{ price($order['invoice']['amount']) }}</div>
                        <div class="text-muted fw-bold">НӨАТ багтсан</div>
                        <!--end::Total Amount-->
                        <div class="border-bottom w-100 my-7 my-lg-16"></div>
                        <!--begin::Invoice To-->
                        <div class="text-gray-600 fs-6 fw-bold mb-3">ТӨЛӨГЧ</div>
                        <div class="fs-6 text-gray-800 fw-bold mb-8">{{ $order['customer']['name'] }}
                        <br>{{ $order['customer']['phone_primary'] }}</div>
                        <!--end::Invoice To-->
                        <!--begin::Invoice No-->
                        <div class="text-gray-600 fs-6 fw-bold mb-3">НЭХ/ДУГААР</div>
                        <div class="fs-6 text-gray-800 fw-bold mb-8">#{{ $order['invoice']['id'] }}</div>
                        <!--end::Invoice No-->
                        <!--begin::Invoice Date-->
                        <div class="text-gray-600 fs-6 fw-bold mb-3">ОГНОО</div>
                        <div class="fs-6 text-gray-800 fw-bold">{{ $order['invoice']['created_at'] }}</div>
                        <!--end::Invoice Date-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Body-->
            <!-- begin::Footer-->
            <div class="d-flex flex-stack flex-wrap pt-13">
                <!-- begin::Actions-->
                <div class="my-1 me-5">
                    <!-- begin::Pint-->
                    <button type="button" class="btn btn-success my-1 me-5" onclick="window.print();">Хэвлэх</button>
                    <!-- end::Pint-->
                    <!-- begin::Download-->
                    <button type="button" class="btn btn-light-success my-1">Татаж авах</button>
                    <!-- end::Download-->
                </div>
                <!-- end::Actions-->
                <button type="button" class="btn btn-primary my-1">И-мэйлээр илгээх</button>
            </div>
            <!-- end::Footer-->
        </div>
        <!-- end::Wrapper-->
    </div>
    <!-- end::Body-->
</div>