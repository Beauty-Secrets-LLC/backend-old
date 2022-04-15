<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content position-absolute">
       
        <div class="modal-header" id="kt_modal_update_customer_header">
            <!--begin::Modal title-->
            <h2 class="fw-bolder">Үйлчилгээний мэдээлэл шинэчлэх</h2>
            <!--end::Modal title-->
            <!--begin::Close-->
            <div  data-bs-dismiss="modal" class="btn btn-icon btn-sm btn-active-icon-primary">
                <!--begin::Svg Icon | path: icons/duotone/Navigation/Close.svg-->
                <span class="svg-icon svg-icon-1">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)" fill="#000000">
                            <rect fill="#000000" x="0" y="7" width="16" height="2" rx="1" />
                            <rect fill="#000000" opacity="0.5" transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)" x="0" y="7" width="16" height="2" rx="1" />
                        </g>
                    </svg>
                </span>
                <!--end::Svg Icon-->
            </div>
            <!--end::Close-->
        </div>
        <div class="modal-body">
            <div class="fv-row mb-7">
                <!--begin::Label-->
                <label class="fs-6 fw-bold mb-2">Нэмэлт утас:</label>
                <!--end::Label-->
                <!--begin::Input-->
                <input type="text" class="form-control form-control-solid" wire:model.defer="phone">
                <!--end::Input-->
            </div>
            <div class="fv-row mb-7">
                <!--begin::Label-->
                <label class="fs-6 fw-bold mb-2">Аймаг / Хот:</label>
                <!--end::Label-->
                <!--begin::Input-->
                <select class="form-select form-select-solid" wire:model="selected_city">
                    @foreach ($mn_address as $city)
                        <option value="{{ $city['name'] }}">{{ $city['name'] }}</option>
                    @endforeach
                </select>
                <!--end::Input-->
            </div>
            <div class="fv-row mb-7">
                <!--begin::Label-->
                <label class="fs-6 fw-bold mb-2">Сум / Дүүрэг:</label>
                <!--end::Label-->
                <!--begin::Input-->
                @php
                    $selected_city_index = 0;
                @endphp
                <select class="form-select form-select-solid" wire:model="selected_district" >
                    @foreach ($mn_address as $city_index => $city)
                        @if ( $city['name'] == $selected_city)
                            @php
                                $selected_city_index = $city_index;
                            @endphp
                            @foreach ($city['sub'] as $district)
                                <option value="{{ $district['name'] }}">{{ $district['name'] }}</option>
                            @endforeach
                            @break
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="fv-row mb-7">
                <!--begin::Label-->
                <label class="fs-6 fw-bold mb-2">Баг / Дүүрэг:</label>
                <!--end::Label-->
                <!--begin::Input-->
                <select class="form-select form-select-solid" wire:model="selected_khoroo">
                    @foreach ($mn_address[$selected_city_index]['sub'] as $district)
                        @if ( $district['name'] == $selected_district) 
                            @foreach ($district['sub'] as $khoroo)
                                <option value="{{ $khoroo['name'] }}">{{ $khoroo['name'] }}</option>
                            @endforeach
                            @break
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="fv-row mb-7">
                <!--begin::Label-->
                <label class="fs-6 fw-bold mb-2">Дэлгэрэнгүй хаяг:</label>
                <!--end::Label-->
                <!--begin::Input-->
                <textarea class="form-control form-control-solid" wire:model.defer="address"></textarea>
                <!--end::Input-->
            </div>
            
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-primary" wire:click="save" data-bs-dismiss="modal">Хадгалах</button>
        </div>
    </div>


</div>

