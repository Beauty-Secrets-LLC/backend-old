<div class="card card-flush py-4">
    <!--begin::Card header-->
    <div class="card-header">
        <div class="card-title">
            <h2>Бүтээгдэхүүний нөөц</h2>
        </div>
    </div>
    <!--end::Card header-->
    <!--begin::Card body-->
    <div class="card-body pt-0">
        <!--begin::Input group-->
        <div class="mb-10 fv-row fv-plugins-icon-container">
            <!--begin::Label-->
            <label class="form-label">Код</label>
            <!--end::Label-->
            <!--begin::Input-->
            <input type="text" name="data[sku]" class="form-control mb-2" placeholder="Код" value="">
            <!--end::Input-->
            <!--begin::Description-->
            <div class="text-muted fs-7">Бүтээгдэхүүний кодыг оруулна уу</div>
            <!--end::Description-->
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="mb-10 fv-row fv-plugins-icon-container">
            <!--begin::Label-->
            <label class="required form-label">Тоо ширхэг</label>
            <!--end::Label-->
            <!--begin::Input-->
            <div class="d-flex gap-3">
                <input type="number" name="quantity" class="form-control mb-2" placeholder="" value="" required>
            </div>
            <!--end::Input-->
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="mb-10  fv-row">
            <!--begin::Label-->
            <label class="form-label">Урьдчилсан захиалга</label>
            <!--end::Label-->
            <!--begin::Input-->
            <div class="form-check form-check-custom form-check-solid mb-2">
                <input class="form-check-input" type="checkbox" name="is_preorder" value="1">
                <label class="form-check-label">Тийм</label>
            </div>
            <!--end::Input-->
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="fv-row">
            <!--begin::Label-->
            <label class="form-label">Нөөцөөс хамааралгүй захиалах</label>
            <!--end::Label-->
            <!--begin::Input-->
            <div class="form-check form-check-custom form-check-solid mb-2">
                <input class="form-check-input" type="checkbox" name="data[backorder]" value="yes">
                <label class="form-check-label">Тийм</label>
            </div>
            <!--end::Input-->
            <!--begin::Description-->
            <div class="text-muted fs-7">Тухайн бүтээгдэхүүний нөөц дууссан ч хэрэглэгч захиалах боломжтой байна.</div>
            <!--end::Description-->
        </div>
        <!--end::Input group-->
    </div>
    <!--end::Card header-->
</div>