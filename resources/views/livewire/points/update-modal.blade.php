<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Хэрэглэгчийн оноо </h5>

            <!--begin::Close-->
            <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                <span class="svg-icon svg-icon-2x"></span>
            </div>
            <!--end::Close-->
        </div>

        <div class="modal-body">
            <div class="fv-row mb-10">
                <!--begin::Label-->
                <label class="fs-6 fw-bold mb-2">
                    <span>Оноо</span>
                </label>
                <!--end::Label-->
                <!--begin::Input-->
                <input type="number" class="form-control form-control-solid" wire:model.defer="customer_points.points">
                <!--end::Input-->
            </div>

            <div class="fv-row mb-10">
                <!--begin::Label-->
                <label class="fs-6 fw-bold mb-2">
                    <span>Тайлбар</span>
                </label>
                <!--end::Label-->
                <!--begin::Input-->
                <textarea class="form-control form-control-solid" cols="30" rows="5" wire:model.defer="description" placeholder="Хэрэглэгчийн оноог өөрчилж буй шалтгаанаа бичнэ үү ..."></textarea>
                <!--end::Input-->
            </div>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Хаах</button>
            <button type="button" class="btn btn-primary" wire:click="save">Шинэчлэх</button>
        </div>
    </div>
</div>