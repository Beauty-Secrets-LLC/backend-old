<div class="card card-flush">
    <div class="card-header border-0 pt-6">
        <div class="card-title">
            <div class="d-flex align-items-center position-relative my-1">
                <!--begin::Svg Icon | path: icons/duotone/General/Search.svg-->
                <span class="svg-icon svg-icon-1 position-absolute ms-6">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24"></rect>
                            <path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                            <path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero"></path>
                        </g>
                    </svg>
                </span>
                <!--end::Svg Icon-->
                {{-- <input type="text" wire:model.lazy="search" id="search_phone" class="form-control form-control-solid w-250px ps-14" placeholder="Утасны дугаар"> --}}
            </div>
        </div>
       
    </div>
    <div class="card-body pt-0">

        <div class="table-responsive">
            @if(!empty($vats))
                <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer" wire:loading.class.delay="opacity-75" >
                    <thead>
                    <tr class="fw-bolder fs-6 text-gray-800">
                        <th></th>
                        <th>И-баримт олгосон</th>
                        <th>ID</th>
                        <th>Төрөл</th>
                        <th>Регистр</th>
                        <th>ДДТД</th>
                        <th>Огноо</th>
                    </tr>
                    </thead>
                    <tbody class="text-gray-600 fw-bold">
                    
                        @forelse ($vats as $vat_index => $vat)
                            <tr>
                                <td class="text-center">{{ ($vats ->currentpage()-1) * $vats ->perpage() + $vat_index + 1 }}</td>
                                <td>{{ $vat->subject_type }}</td>
                                <td>{{ $vat->subject_id }}</td>
                                <td>
                                    <span class="badge badge-light-primary">
                                        @if ($vat->type == 1)
                                            Хувь хүн
                                        @elseif($vat->type == 2)
                                            Байгууллага
                                        @endif
                                    </span>
                                </td>
                                <td>{{ $vat->register_number }}</td>
                                <td>{{ bs_ebarimt_format($vat->billId) }}</td>
                                <td>{{ $vat->created_at }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">
                                    <div class="alert alert-warning text-center">Хайлтанд тохирох илэрц олдсонгүй</div>
                                </td>
                            </tr>
                        @endforelse
                
                
                    </tbody>
                </table>
                {{ $vats->links() }}
            @else 

            @endif
        </div>
     
    </div>
</div>



