<div class="table-responsive">
    <!--begin::Table-->
    <table class="table align-middle table-row-dashed gy-5" id="kt_table_customers_payment">
        <!--begin::Table head-->
        <thead class="border-bottom border-gray-200 fs-7 fw-bolder">
            <!--begin::Table row-->
            <tr class="text-start text-muted text-uppercase gs-0">
                <th class="min-w-100px">Үйлчилгээ</th>
                <th>Төлөв</th>
                <th>Дүн</th>
                <th>Холбосон карт</th>
                <th class="min-w-125px">Бүртгүүлсэн</th>
            </tr>
            <!--end::Table row-->
        </thead>
        <!--end::Table head-->
        <!--begin::Table body-->
        <tbody class="fs-6 fw-bold text-gray-600">
            @foreach ($subscriptions as $subscription)
                <!--begin::Table row-->
                <tr>
                    <!--begin::Invoice=-->
                    <td>
                        <a target="_blank" href="{{ route('subscription.view', $subscription['id']) }}" class="text-gray-600 text-hover-primary mb-1">{{ $subscription['plan']['name'] }}</a>
                    </td>
                    <!--end::Invoice=-->
                    <!--begin::Status=-->
                    <td>
                        @if ($subscription['status'] == 1 )
                            <span class="badge badge-light-success">Идэвхитэй</span>
                        @elseif($subscription['status'] == 2) 
                            <span class="badge badge-light-danger">Цуцлагдсан</span>
                        @elseif($subscription['status'] == 0) 
                            <span class="badge badge-light-warning">Төлбөр төлөгдөөгүй</span>
                        @endif
                        
                    </td>
                    <!--end::Status=-->
                    <!--begin::Amount=-->
                    <td>{{ number_format($subscription['plan']['amount']) }}₮</td>
                    <!--end::Amount=-->
                    <!--begin::Date=-->
                    <td>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M22 7H2V11H22V7Z" fill="currentColor"/><path opacity="0.3" d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19ZM14 14C14 13.4 13.6 13 13 13H5C4.4 13 4 13.4 4 14C4 14.6 4.4 15 5 15H13C13.6 15 14 14.6 14 14ZM16 15.5C16 16.3 16.7 17 17.5 17H18.5C19.3 17 20 16.3 20 15.5C20 14.7 19.3 14 18.5 14H17.5C16.7 14 16 14.7 16 15.5Z" fill="currentColor"/></svg>
                        {{ bs_card_format($subscription['card_id']) }}
                    </td>
                    <!--end::Date=-->
                    <!--begin::Action=-->
                    <td>{{ $subscription['created_at'] }}</td>
                    <!--end::Action=-->
                </tr>
                <!--end::Table row-->
            @endforeach
        </tbody>
        <!--end::Table body-->
    </table>
    <!--end::Table-->
</div>