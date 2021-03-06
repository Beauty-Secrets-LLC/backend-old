<div class="card card-flush">
    <div class="card-header border-0 pt-6">
        <div class="card-title">
            <!--begin::Search-->
            <div class="d-flex align-items-center position-relative my-1">
                <!--begin::Svg Icon | path: icons/duotone/General/Search.svg-->
                <span class="svg-icon svg-icon-1 position-absolute ms-6">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24" />
                            <path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                            <path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero" />
                        </g>
                    </svg>
                </span>
                <!--end::Svg Icon-->
                <input type="text" wire:model.lazy="search" class="form-control form-control-solid w-250px ps-14" placeholder="Захиалгын дугаар" />
            </div>
            <!--end::Search-->
        </div>
        <div class="card-toolbar">
            <div class="d-flex justify-content-end" wire:ignore>
                <!--begin::Filter-->
                <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
                    <!--begin::Svg Icon | path: icons/duotone/Text/Filter.svg-->
                    <span class="svg-icon svg-icon-2">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24" />
                                <path d="M5,4 L19,4 C19.2761424,4 19.5,4.22385763 19.5,4.5 C19.5,4.60818511 19.4649111,4.71345191 19.4,4.8 L14,12 L14,20.190983 C14,20.4671254 13.7761424,20.690983 13.5,20.690983 C13.4223775,20.690983 13.3458209,20.6729105 13.2763932,20.6381966 L10,19 L10,12 L4.6,4.8 C4.43431458,4.5790861 4.4790861,4.26568542 4.7,4.1 C4.78654809,4.03508894 4.89181489,4 5,4 Z" fill="#000000" />
                            </g>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->Шүүлт</button>
                    <!--begin::Menu 1-->
                    <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
                        <!--begin::Header-->
                        <div class="px-7 py-5">
                            <div class="fs-5 text-dark fw-bolder">Шүүх талбарууд</div>
                        </div>
                        <!--end::Header-->
                        <!--begin::Separator-->
                        <div class="separator border-gray-200"></div>
                        <!--end::Separator-->
                        <!--begin::Content-->
                        <div class="px-7 py-5">
                            <!--begin::Input group-->
                            <!--begin::Input group-->
                            <div class="mb-5">
                                <label class="form-label fs-6 fw-bold">Төлөв:</label>
                                <select wire:model.lazy="filters.status" class="form-select form-select-solid fw-bolder">
                                    <option value="">Бүгд</option>
                                    <option value="completed">Хүргэгдсэн</option>
                                    <option value="processing">Төлбөр төлөгдсөн</option>
                                    <option value="on-hold">Төлбөр төлөгдөөгүй</option>
                                    <option value="cancelled">Цуцлагдсан</option>
                                    <option value="trashed">Устгагдсан</option>
                                </select>
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="mb-5">
                                <label class="form-label fs-6 fw-bold">Утас:</label>
                                <input wire:model.lazy="filters.phone" type="tel" placeholder="Утасны дугаар" class="form-control form-control-solid fw-bolder">
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="mb-5">
                                <label class="form-label fs-6 fw-bold">И-мэйл:</label>
                                <input wire:model.lazy="filters.email" type="email" placeholder="И-мэйл хаяг" class="form-control form-control-solid fw-bolder">
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Menu 1-->
                    <!--end::Filter-->
                    <!--begin::Export-->
                    <button type="button" class="btn btn-light-primary me-3" data-bs-toggle="modal" data-bs-target="#kt_subscriptions_export_modal">
                    <!--begin::Svg Icon | path: icons/duotone/Files/Export.svg-->
                    <span class="svg-icon svg-icon-2">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24" />
                                <path d="M17,8 C16.4477153,8 16,7.55228475 16,7 C16,6.44771525 16.4477153,6 17,6 L18,6 C20.209139,6 22,7.790861 22,10 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,9.99305689 C2,7.7839179 3.790861,5.99305689 6,5.99305689 L7.00000482,5.99305689 C7.55228957,5.99305689 8.00000482,6.44077214 8.00000482,6.99305689 C8.00000482,7.54534164 7.55228957,7.99305689 7.00000482,7.99305689 L6,7.99305689 C4.8954305,7.99305689 4,8.88848739 4,9.99305689 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,10 C20,8.8954305 19.1045695,8 18,8 L17,8 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 8.000000) scale(1, -1) rotate(-180.000000) translate(-12.000000, -8.000000)" x="11" y="2" width="2" height="12" rx="1" />
                                <path d="M12,2.58578644 L14.2928932,0.292893219 C14.6834175,-0.0976310729 15.3165825,-0.0976310729 15.7071068,0.292893219 C16.0976311,0.683417511 16.0976311,1.31658249 15.7071068,1.70710678 L12.7071068,4.70710678 C12.3165825,5.09763107 11.6834175,5.09763107 11.2928932,4.70710678 L8.29289322,1.70710678 C7.90236893,1.31658249 7.90236893,0.683417511 8.29289322,0.292893219 C8.68341751,-0.0976310729 9.31658249,-0.0976310729 9.70710678,0.292893219 L12,2.58578644 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 2.500000) scale(1, -1) translate(-12.000000, -2.500000)" />
                            </g>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->Татаж авах</button>
                    <!--end::Export-->
            </div>
            <!--begin::Group actions-->
            @if (!empty($checked_orders))
                <div class="d-flex justify-content-end align-items-center">
                    <button class="btn btn-danger" wire:click="deleteChecked()">Устгах ({{count($checked_orders)}})</button>
                </div>
            @endif
            <!--end::Group actions-->
        </div>
    </div>
    <div class="card-body pt-0">
       
        <div class="table-responsive">
            <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer" id="order_table" wire:loading.class.delay="opacity-75">
                <thead>
                    <tr class="fw-bold fs-6 text-muted">
                        <th>
                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input" wire:model="selectPage" type="checkbox">
                            </div>
                        </th>
                        <th>ID</th>
                        <th>Төлөв</th>
                        <th>Захиалагч</th>
                        <th>Хаяг</th>
                        <th>Хүргэлт</th>
                        <th>Төлөх дүн</th>
                        <th>Төлбөрийн хэлбэр</th>
                        <th>Огноо</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 fw-bold">
                    @forelse ($orders as $order)
                        <tr>
                            <td>
                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input wire:model.lazy="checked_orders" class="form-check-input" type="checkbox" value="{{ $order->id }}">
                                </div>
                            </td>
                            <td>
                                <a href="{{route('order.view', $order->id)}}" class="text-gray-800 text-hover-primary mb-1">{{ $order->order_number }}</a>
                            </td>
                            <td>
                                @if (!is_null($order->deleted_at))
                                    <span class="badge badge-light-danger">Устгагдсан</span>
                                @else
                                    @switch($order->status)
                                        @case('on-hold')
                                                <span class="badge badge-light-warning">Төлбөр төлөгдөөгүй</span>
                                                @break
                                        @case('processing')
                                                <span class="badge badge-light-success">Төлбөр төлөгдсөн</span>
                                                @break
                                        @case('completed')
                                                <span class="badge badge-light-primary">Хүргэгдсэн</span>
                                                @break
                                        @default
                                            
                                    @endswitch
                                @endif
                            
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="d-flex justify-content-start flex-column">
                                        <a href="{{ isset($order->customer) ?  route('customer.view',$order->customer->id) : '#' }}" class="text-dark fw-bolder text-hover-primary fs-6">{{ $order->customer_name }}</a>
                                        <span class="text-muted text-muted d-block fs-7">
                                            {{ $order->customer_phone }}
                                        </span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                {{ $order->address['city'] }}, {{ $order->address['district'] }}, {{ $order->address['khoroo'] }}, {{ $order->address['address'] }}
                            </td>
                            <td></td>
                            <td>{{ price($order->total) }}</td>
                            <td>
                                {{$order->invoice->payment_method->name}}
                            </td>
                            <td>{{$order->created_at}}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9">
                                <div class="alert alert-warning text-center">
                                    Захиалга олдсонгүй
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody> 
            </table>
        </div>
        <div class="d-flex align-items-center position-relative my-1">
            <div class=" flex-column-fluid">
                <span class="text-gray-600">Нийт: <span class="fw-bold">{{ $orders->total() }} захиалга</span></span> 
            </div>
            <div>
                {{$orders->links() }}
            </div>
        </div>
    </div>
</div>


@push('js')
    <script>
        window.addEventListener('swal:deleteOrders', function(event) {
            Swal.fire({
                title: event.detail.title,
                html:  event.detail.html,
                icon: 'warning',
                showCancelButton: true,
                customClass: {
                    confirmButton: 'btn btn-primary',
                    cancelButton: 'btn btn-light',
                },
                cancelButtonText: 'Үгүй',
                confirmButtonText: 'Тийм'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('order:delete',event.detail.orders);
                }
            })
        });
    </script>
@endpush