<div class="card card-flush pt-3 mb-5 mb-xl-10">
    <!--begin::Card header-->
    <div class="card-header">
        <!--begin::Card title-->
        <div class="card-title">
            <h2 class="fw-bolder">Үйлчилгээ</h2>
        </div>
        <!--begin::Card title-->
        <!--begin::Card toolbar-->
        <div class="card-toolbar">
            <button class="btn btn-light-primary" data-bs-toggle="modal" data-bs-target="#edit_subscription">
                
                <!--begin::Svg Icon | path: assets/media/icons/duotune/art/art005.svg-->
                <span class="svg-icon icon-size-2qx"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"/>
                    <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"/>
                    </svg></span> Хаяг өөрчлөх
                    <!--end::Svg Icon-->
            </button>
        </div>
        <!--end::Card toolbar-->
    </div>
    <!--end::Card header-->
    <!--begin::Card body-->
    <div class="card-body pt-3">

        
        <!--begin::Section-->
        <div class="mb-10">
            <!--begin::Title-->
            <h5 class="mb-4">Захиалгын мэдээлэл</h5>
            <!--end::Title-->
            <!--begin::Details-->
            <div class="d-flex flex-wrap py-5">
                <!--begin::Row-->
                <div class="flex-equal me-5">
                    <!--begin::Details-->
                    <table class="table fs-6 fw-bold gs-0 gy-2 gx-2 m-0">
                        <!--begin::Row-->
                        <tbody><tr>
                            <td class="text-gray-400 min-w-175px w-175px">Захиалагч:</td>
                            <td class="text-gray-800 min-w-200px">
                                <a href="#" class="text-gray-800 text-hover-primary">{{ $subscription['customer']['name']}}</a>
                            </td>
                        </tr>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <tr>
                            <td class="text-gray-400">Утас:</td>
                            <td class="text-gray-800">{{ $subscription['customer']['phone_primary']}}</td>
                        </tr>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <tr>
                            <td class="text-gray-400">Нэмэлт утас:</td>
                            <td class="text-gray-800">{{ $subscription['address']['phone']}}</td>
                        </tr>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <tr>
                            <td class="text-gray-400">И-мэйл:</td>
                            <td class="text-gray-800">{{ $subscription['customer']['email']}}</td>
                        </tr>
                        <!--end::Row-->
                    </tbody></table>
                    <!--end::Details-->
                </div>
                <!--end::Row-->
                <!--begin::Row-->
                <div class="flex-equal">
                    <!--begin::Details-->
                    <table class="table fs-6 fw-bold gs-0 gy-2 gx-2 m-0">
                        <!--begin::Row-->
                        <tbody><tr>
                            <td class="text-gray-400 min-w-175px w-175px">Аймаг/Хот:</td>
                            <td class="text-gray-800 min-w-200px">
                                <a href="#" class="text-gray-800 text-hover-primary">{{ $subscription['address']['city']}}</a>
                            </td>
                        </tr>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <tr>
                            <td class="text-gray-400">Сум/Дүүрэг:</td>
                            <td class="text-gray-800">{{ $subscription['address']['district']}}</td>
                        </tr>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <tr>
                            <td class="text-gray-400">Хороо/Сум:</td>
                            <td class="text-gray-800">{{ $subscription['address']['khoroo']}}</td>
                        </tr>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <tr>
                            <td class="text-gray-400">Дэлгэрэнгүй хаяг:</td>
                            <td class="text-gray-800">{{ $subscription['address']['address']}}</td>
                        </tr>
                        <!--end::Row-->
                    </tbody></table>
                    <!--end::Details-->
                </div>
                <!--end::Row-->
            </div>
            <!--end::Row-->
        </div>
        <!--end::Section-->
        <!--begin::Section-->
        <div class="mb-0">
            <!--begin::Title-->
            <h5 class="mb-4">Бүтээгдэхүүн</h5>
            <!--end::Title-->
            <!--begin::Product table-->
            <div class="table-responsive">
                <!--begin::Table-->
                <table class="table align-middle table-row-dashed fs-6 gy-4 mb-0">
                    <!--begin::Table head-->
                    <thead>
                        <!--begin::Table row-->
                        <tr class="border-bottom border-gray-200 text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                            <th class="min-w-150px">Нэр</th>
                            <th class="min-w-150px">Төрөл</th>
                            <th class="min-w-125px">ID</th>
                            <th class="min-w-125px">Дүн</th>
                        </tr>
                        <!--end::Table row-->
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody class="fw-bold text-gray-800">
                        <tr>
                            <td>
                                <label class="w-150px">{{ $subscription['plan']['name'] }}</label>
                            </td>
                            <td>
                                {{ $subscription['plan']['sub_type'] }}
                            </td>
                            <td>
                                <span class="badge badge-light-danger">BS-{{ $subscription['card_subscribe_id'] }}</span>
                            </td>
                            <td>{{ number_format($subscription['plan']['amount']) }}₮</td>
                        </tr>
                    </tbody>
                    <!--end::Table body-->
                </table>
                <!--end::Table-->
            </div>
            <!--end::Product table-->
        </div>
        <!--end::Section-->
        <div class="modal fade" tabindex="-1" id="edit_subscription">
            @livewire('subscription.detail-edit-modal', ['subscription' => $subscription])
        </div>
    </div>
    <!--end::Card body-->
    
</div>