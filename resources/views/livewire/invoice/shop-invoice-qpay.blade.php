<div class="modal-dialog  modal-dialog-centered">
    <div class="modal-content shadow-none">
        <div class="modal-header">
            <!--begin::Modal title-->
            <h3>Төлбөрийн мэдээлэл</h3>
            <!--end::Modal title-->
            <!--begin::Close-->
            <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                <span class="svg-icon svg-icon-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor"></rect>
                        <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor"></rect>
                    </svg>
                </span>
                <!--end::Svg Icon-->
            </div>
            <!--end::Close-->
        </div>

        <div class="modal-body">
            @if ($invoice['payment_id'] == 1)

                <div class="row mb-4">
                    <label class="col-md-4 fw-bold fs-6 mb-2">Нэхэмжлэхийн ID</label>
                    <div class="col-md-8">
                        {{ $invoice['data']['invoice_id'] }}
                    </div>
                </div>
                <div class="row mb-4">
                    <label class="col-md-4 fw-bold fs-6 mb-2">Нэхэмжлэх QR</label>
                    <div class="col-md-8">
                        <img style="border: dashed 2px #333;" width="200" src="data:image/png;base64, {{ $invoice['data']['qr_image'] }}" alt="">
                    </div>
                </div>

                @if (isset($payment_response['count']))

                    @if ($payment_response['count'] > 0)
                        @foreach ($payment_response['rows'] as $response)
                            <div class="row mb-4">
                                <label class="col-md-4 fw-bold fs-6 mb-2">Гүйлгээний дугаар</label>
                                <div class="col-md-8">
                                    {{ $response['payment_id'] }}
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label class="col-md-4 fw-bold fs-6 mb-2">Гүйлгээний төлөв</label>
                                <div class="col-md-8">
                                    @if ($response['payment_status'] == 'PAID')
                                        <div class="badge badge-light-success fw-bolder">{{ $response['payment_status'] }}</div>
                                    @else
                                        <div class="badge badge-light-danger fw-bolder">{{ $response['payment_status'] }}</div>
                                    @endif
                                    
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label class="col-md-4 fw-bold fs-6 mb-2">Төлбөр төлсөн</label>
                                <div class="col-md-8">
                                    {{ $response['payment_wallet'] }}
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="alert alert-danger text-center">
                            Төлбөр төлөгдөөгүй байна.
                        </div>
                    @endif
                  
                    
                @endif
                
            @else
                
            @endif


            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Хаах</button>
            <button type="button" class="btn btn-primary" wire:click="checkPayment">Төлбөр шалгах</button>
        </div>
    </div>
</div>