<div class="card card-flush py-4">
    <!--begin::Card header-->
    <div class="card-header">
        <div class="card-title">
            <h2>Бусад</h2>
        </div>
    </div>
    <!--end::Card header-->
    <!--begin::Card body-->
    <div class="card-body pt-0">
        <!--begin::Input group-->
        <div class="mb-10 fv-row fv-plugins-icon-container">
            <!--begin::Label-->
            <label class="form-label">Орц</label>
            <!--end::Label-->
            <!--begin::Input-->
            <div id="meta_ingredients" class="min-h-150px mb-2 ql-container ql-snow">
                {!! (isset($product['data']['ingredients'])) ? $product['data']['ingredients'] : '' !!}
            </div>
            <textarea name="data[ingredients]" id="meta_ingredients_html" class="d-none">
                {{ (isset($product['data']['ingredients'])) ? $product['data']['ingredients'] : ''}}
            </textarea>
            <!--end::Input-->
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="mb-10 fv-row fv-plugins-icon-container">
            <!--begin::Label-->
            <label class="form-label">Хэрэглэх заавар</label>
            <!--end::Label-->
            <!--begin::Input-->
            <div id="meta_guide" class="min-h-150px mb-2 ql-container ql-snow">
                {!! (isset($product['data']['guide'])) ? $product['data']['guide'] : '' !!}
            </div>
            <textarea name="data[guide]" id="meta_guide_html" class="d-none">
                {{ (isset($product['data']['guide'])) ? $product['data']['guide'] : ''}}
            </textarea>
            <!--end::Input-->
        </div>
        <!--end::Input group-->
    </div>
    <!--end::Card header-->
</div>

<script>


 
</script>