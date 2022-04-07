<div class="card card-flush pt-3 mb-5 mb-xl-10">
    <!--begin::Card header-->
    <div class="card-header">
        <!--begin::Card title-->
        <div class="card-title">
            <h2>Гүйлгээний мэдээлэл</h2>
        </div>
        <!--end::Card title-->
        <!--begin::Card toolbar-->
        <div class="card-toolbar">
            <button id="get_transaction_from_card" wire:click="$emit('getTransactionFromCard')" value="{{$card_id}}" class="btn btn-light-primary">
                
                <span class="indicator-label">
                    Холбосон картны хуулга татах
                </span>
                <span class="indicator-progress">
                    Түр хүлээнэ үү... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                </span>
            </button>
        </div>
        <!--end::Card toolbar-->
    </div>

    <!--end::Card header-->
    <!--begin::Card body-->
    <div class="card-body pt-0">
        <!--begin::Table wrapper-->
        <table class="table align-middle table-row-dashed fs-6 text-gray-600 fw-bold gy-5" id="transaction_table">
            <!--begin::Table body-->
            <thead>
                <th>Төрөл</th>
                <th>Reference дугаар</th>
                <th>ID</th>
                <th>Дүн</th>
                <th>Огноо</th>
            </thead>
            <tbody>
                @if (!empty($local_transactions))
                    @foreach ($local_transactions as $transaction)
                        <tr>
                            
                            <td>
                                @if ( $transaction['reference_number'] == 'subscribe_auto_cancel')
                                    <span class="badge badge-light-danger">{{ $transaction['type'] }}</span>
                                @else 
                                    <span class="badge badge-light-success">{{ $transaction['type'] }}</span>
                                @endif
                                
                            </td>
                            <td>{{ $transaction['reference_number'] }}</td>
                            <td>{{ $transaction['transaction_id'] }}</td>
                            <td>{{ $transaction['amount'] }}</td>
                            <td>{{ $transaction['created_at'] }}</td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
            <!--end::Table body-->
        </table>
        <div class="separator my-10"></div>
        @if (!is_null($card_transaction))
            @if ($card_transaction['code'] == 1000)
                <div class="alert alert-success text-center">
                    <b>{{ $card_id }}</b> дугаартай картаар хийсэн нийт <b>{{ $card_transaction['list_count'] }}</b> гүйлгээ олдлоо
                </div>
                @if (isset($card_transaction['list']) && !empty($card_transaction['list']))
                    <table class="table align-middle table-row-dashed fs-6 text-gray-600 fw-bold gy-5" id="card_transaction_table">
                        <thead>
                            <th>Үйлчилгээ</th>
                            <th>Төрөл</th>
                            <th>ID</th>
                            <th>Дүн</th>
                            <th>Огноо</th>
                            <th>Баталгаажсан эсэх</th>
                        </thead>
                        <tbody>
                            @foreach ($card_transaction['list'] as $card_transaction)
                                <tr>
                                    <td>{{$card_transaction['subscribe_id']  }}</td>
                                    <td>
                                        <span class="badge badge-light-success">{{$card_transaction['action_type']  }}</span>
                                    </td>
                                    <td>{{$card_transaction['public_id']  }}</td>
                                    <td>{{$card_transaction['amount']  }}</td>
                                    <td>{{$card_transaction['create_date']  }}</td>
                                    <td>{{$card_transaction['is_confirmed']  }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        
                    </table>
                @endif
            @else
                <div class="alert alert-danger text-center">
                    {{ $card_transaction['message'] }}
                </div>
            @endif
        @endif
    </div>
    <!--end::Card body-->
    <script>

        $('#get_transaction_from_card').click(function() {
            $(this).attr("data-kt-indicator", "on");
        });
        var card_transaction_table = null
        var transaction_table  = $("#transaction_table").DataTable({
            language: {
                search: "Хайлт:",
                infoFiltered: "",
                processing: "Түр хүлээнэ үү ...",
                info:           "Нийт: _TOTAL_ | _START_ - _END_ харуулж байна",
            },
            oLanguage: {
                sLengthMenu: "_MENU_",
                sLoadingRecords: "Түр хүлээнэ үү ...",
                sZeroRecords: "Тохирох хүсэлт олдсонгүй"
            },
        });

        document.addEventListener('livewire:load', function () {
            Livewire.hook('message.processed', (el, component) => {
                if(card_transaction_table === null) {
                    card_transaction_table  = $("#card_transaction_table").DataTable({
                        language: {
                            search: "Хайлт:",
                            infoFiltered: "",
                            processing: "Түр хүлээнэ үү ...",
                            info:           "Нийт: _TOTAL_ | _START_ - _END_ харуулж байна",
                        },
                        oLanguage: {
                            sLengthMenu: "_MENU_",
                            sLoadingRecords: "Түр хүлээнэ үү ...",
                            sZeroRecords: "Тохирох хүсэлт олдсонгүй"
                        },
                    });
                } 
                
            });
        })
    </script>
</div>