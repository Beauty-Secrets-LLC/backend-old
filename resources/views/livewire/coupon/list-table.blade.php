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
                <input type="text" wire:model.lazy="search" class="form-control form-control-solid w-250px ps-14" placeholder="Купон" />
            </div>
            <!--end::Search-->
        </div>

        <div class="card-toolbar">
            <!--begin::Toolbar-->
            <div class="d-flex justify-content-end" data-coupon-table-toolbar="base">
                <a href="{{ route('coupon.new') }}" class="btn btn-primary">
                    <!--begin::Svg Icon | path: icons/duotone/Navigation/Plus.svg-->
                    <span class="svg-icon svg-icon-2">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <rect fill="#000000" x="4" y="11" width="16" height="2" rx="1"></rect>
                            <rect fill="#000000" opacity="0.5" transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000)" x="4" y="11" width="16" height="2" rx="1"></rect>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                    Купон үүсгэх
                </a>
                <!--end::Add product-->
            </div>
            <div class="d-flex justify-content-end align-items-center d-none" data-coupon-table-toolbar="selected">
                <div class="fw-bolder me-5">
                    <span class="me-2" data-coupon-table-select="selected_count"></span>купон сонгогдсон
                </div>
                <button type="button" onclick="delete_coupon()" class="btn btn-danger">Устгах</button>
            </div>
            <!--end::Toolbar-->
        </div>
        
    </div>
    <div class="card-body pt-0">
        <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer" wire:loading.class.delay="opacity-75" id="coupon_table">
            <thead>
            <tr class="fw-bolder fs-6 text-gray-800">
                <th></th>
                <th>Код</th>
                <th>Хямдралын төрөл</th>
                <th>Дүн</th>
                <th>Дуусах огноо</th>
                <th>Бүртгэгдсэн</th>
            </tr>
            </thead>
            <tbody class="text-gray-600 fw-bold">
                @forelse ($coupons as $index => $coupon)
                    <tr>
                        <td class="text-center">
                            <div class="form-check form-check-sm form-check-custom form-check-solid"><input class="form-check-input" type="checkbox" value="{{ $coupon->id }}"></div>
                        </td>
                        <td>{{ $coupon->code }}</td>
                        <td>
                            @if ($coupon->type == 'percentage')
                                <span class="badge badge-light-success">Хувиар</span>
                            @else
                                <span class="badge badge-light-primary">Тогтмол дүнгээр</span>
                            @endif
                        </td>
                        <td>
                            @if ($coupon->type == 'percentage')
                                -{{ $coupon->amount }}%
                            @else
                                -{{ number_format($coupon->amount) }}
                            @endif
                            
                        </td>
                        <td>{{ $coupon->expire_at }}</td>
                        <td>{{ $coupon->created_at }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">
                            <div class="alert alert-warning text-center">Хайлтанд тохирох купон код олдсонгүй</div>
                        </td>
                    </tr>
                @endforelse
        
        
            </tbody>
        </table>
        {{ $coupons->links() }}
    </div>
</div>