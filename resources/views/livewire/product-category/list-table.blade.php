<div class="card card-flush">
    <div class="card-header border-0 pt-6">
        <div class="card-title">
            <!--begin::Search-->
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
                <input type="text" wire:model.lazy="search" class="form-control form-control-solid w-250px ps-14" placeholder="Ангилал хайх">
            </div>
            <!--end::Search-->
            <button class="btn btn-danger" wire:click="delete_selected">Устгах</button>
        </div>
    </div>
    <!--begin::Card body-->
    <div class="card-body pt-5">
        <div class="table-responsive">
            <table id="table_productCategory" class="table align-middle table-row-dashed fs-6 dataTable no-footer" wire:loading.class.delay="opacity-75" >
                <thead>
                    <tr class="fw-bolder fs-6 text-gray-800">
                        <th>
                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input id="selectAll" class="form-check-input" type="checkbox" value="1">
                            </div>
                        </th>
                        <th>Нэр</th>
                        <th class="text-end min-w-100px">Үйлдэл</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 fw-bold">
                    @if (!empty($category_tree))
                        @forelse ($category_tree as $category)
                            <tr>
                                <td>
                                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                                        <input wire:model.defer="selected" class="form-check-input" type="checkbox" value="{{ $category->id }}">
                                    </div>
                                </td>
                                <td>{{ $category->name }}</td>
                                <td class="text-end">
                                    <button class="btn btn-light btn-sm" wire:click="delete({{ $category->id }})">
                                        Устгах
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3">
                                    <div class="alert alert-warning text-center">
                                        Мэдээлэл байхгүй
                                    </div>
                                    
                                </td>
                            </tr>
                        @endforelse
                    @endif
                </tbody>
                
            </table>
        </div>
        {{ $category_tree->links() }}
    </div>
    <!--end::Card body-->
</div>

@push('js')
    <script>
     
    </script>
@endpush