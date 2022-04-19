<div>
    <div class="fw-bolder fs-2">{{ $points }} 
        <span class="text-muted fs-4 fw-bold">оноо</span>
        <div class="fs-7 fw-normal text-muted">Хэрэглэгчийн цуглуулсан онооны түүх</div>
    </div>

    <div class="my-5">
        @if (!empty($logs))
            <div class="table-responsive">
                <table class="table  table-striped mb-10">
                    <thead>
                        <th>Оноо</th>
                        <th>Төрөл</th>
                        <th>Гүйцэтгэгч</th>
                        <th>Тайлбар</th>
                        <th>Огноо</th>
                    </thead>
                    @foreach ($logs as $index => $log)
                        <tr>
                            <td>
                                @if ($log['points'] > 0)
                                    <span class="text-success">+{{ $log['points'] }}</span>
                                @else
                                    <span class="text-danger">{{ $log['points'] }}</span>
                                @endif
                                
                            </td>
                            <td><span class="badge badge-light-primary">{{ $log['type'] }}</span></td>
                            <td>
                                @if (!empty($log['user']))
                                    <a href="{{ route('user.view', $log['user']['id'] ) }}" target="_blank"> {{ $log['user']['name'] }}</a>
                                @else
                                    
                                @endif
                            </td>
                            <td>{{ $log['description'] }}</td>
                            <td>{{ $log['created_at'] }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
            {{ $logs->links() }}
        @endif
    </div>
</div>
