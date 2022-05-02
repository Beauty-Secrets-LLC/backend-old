<div class="table-responsive">
@dump($points)
    @if(!empty($points))
        <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer">
            <thead>
            <tr class="fw-bolder fs-6 text-gray-800">
                <th></th>
                <th>Нэр</th>
                <th>Утас</th>
                <th>И-мэйл</th>
                <th>Оноо</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            
                @foreach ($points as $point)
                    <tr>
                        <td></td>
                        <td>{{ $point->customer->name }}</td>
                        <td>{{ $point->customer->phone_primary }}</td>
                        <td>{{ $point->customer->email }}</td>
                        <td><span class="badge badge-light-primary">{{ $point->points }}</span></td>
                        <td><button class="btn btn-light btn-sm btn-active-primary">Шинэчлэх</button></td>
                    </tr>
                @endforeach
        
        
            </tbody>
        </table>
        {{ $points->links() }}
    @endif
</div>