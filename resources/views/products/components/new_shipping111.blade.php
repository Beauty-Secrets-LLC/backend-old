<div class="card card-flush py-4">
    <!--begin::Card header-->
    <div class="card-header">
        <div class="card-title">
            <h2>Хүргэлт</h2>
        </div>
    </div>
    <!--end::Card header-->
    <!--begin::Card body-->
    <div class="card-body pt-0">
        <!--begin::Input group-->
        <div class="fv-row">
            <!--begin::Input-->
            <div class="form-check form-check-custom form-check-solid mb-2">
                <input class="form-check-input" type="checkbox" name="is_digital" value="1">
                <label class="form-check-label">Цахим бүтээгдэхүүн </label>
            </div>
            <!--end::Input-->
            <!--begin::Description-->
            <div class="text-muted fs-7">Бүтээгдэхүүн биед эсвэл цахим гэдгээс хамаарч оврын мэдээллийг оруулна.</div>
            <!--end::Description-->
        </div>
        <!--end::Input group-->
        <!--begin::Shipping form-->
        <div id="shipping_physical" class="mt-10">
            <!--begin::Input group-->
            <div class="mb-10 fv-row">
                <!--begin::Label-->
                <label class="form-label">Жин</label>
                <!--end::Label-->
                <!--begin::Editor-->
                <input type="number" name="data[weight]" class="form-control mb-2" placeholder="" value="">
                <!--end::Editor-->
                <!--begin::Description-->
                <div class="text-muted fs-7">Бүтээгдэхүүний жинг килограммаар (kg) тооцно.</div>
                <!--end::Description-->
            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="fv-row">
                <!--begin::Label-->
                <label class="form-label">Овор</label>
                <!--end::Label-->
                <!--begin::Input-->
                <div class="d-flex flex-wrap flex-sm-nowrap gap-3">
                    <input type="number" name="data[width]" class="form-control mb-2" placeholder="Өргөн (w)" value="">
                    <input type="number" name="data[height]" class="form-control mb-2" placeholder="Өндөр (h)" value="">
                    <input type="number" name="data[length]" class="form-control mb-2" placeholder="Урт (l)" value="">
                </div>
                <!--end::Input-->
                <!--begin::Description-->
                <div class="text-muted fs-7">Бүтээгдэхүүний оврыг сантиметрээр (cm) тооцно.</div>
                <!--end::Description-->
            </div>
            <!--end::Input group-->
        </div>
        <!--end::Shipping form-->
    </div>
    <!--end::Card header-->
</div>

<script>
    $('input[name="is_digital"]').change(function() {
        if(this.checked) {
            $('#shipping_physical').hide();
            $('input[name="data[weight]"]').val("");
            $('input[name="data[width]"]').val("");
            $('input[name="data[height]"]').val("");
            $('input[name="data[length]"]').val("");
        }
        else {
            $('#shipping_physical').show();
        }
    })
</script>