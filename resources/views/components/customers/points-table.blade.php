<div class="fw-bolder fs-2">{{ isset($points['points']) ? $points['points'] : 0 }} 
    <span class="text-muted fs-4 fw-bold">оноо</span>
    <div class="fs-7 fw-normal text-muted">Хэрэглэгчийн цуглуулсан онооны түүх</div>
</div>


@if (isset($points['log']) && !empty($points['log']))
    <div class="my-5">
        <table class="table table-bordered" id="point_table">
            <thead>
                <th class="text-center">№</th>
                <th>Оноо</th>
                <th>Төрөл</th>
                <th>Тайлбар</th>
                <th>Огноо</th>
            </thead>
            @foreach ($points['log'] as $index => $log)
                <tr>
                    <td class="text-center">{{ $index + 1}}</td>
                    <td>{{ $log['points'] }}</td>
                    <td><span class="badge badge-light-primary">{{ $log['type'] }}</span></td>
                    <td>{{ $log['description'] }}</td>
                    <td>{{ $log['created_at'] }}</td>
                </tr>
            @endforeach
        </table>


        <script>
            var point_table  = $("#point_table").DataTable({
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

        </script>
    </div>
   
@endif