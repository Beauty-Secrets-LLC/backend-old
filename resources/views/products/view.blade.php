@extends('layouts.admin')

@section('content')
    @if(session('success'))
        <div class="alert alert-success d-flex align-items-center p-5 mb-10">
            <!--begin::Svg Icon | path: icons/duotone/General/Shield-check.svg-->
            <span class="svg-icon svg-icon-2hx svg-icon-success me-4">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect x="0" y="0" width="24" height="24"></rect>
                        <path d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z" fill="#000000" opacity="0.3"></path>
                        <path d="M11.1750002,14.75 C10.9354169,14.75 10.6958335,14.6541667 10.5041669,14.4625 L8.58750019,12.5458333 C8.20416686,12.1625 8.20416686,11.5875 8.58750019,11.2041667 C8.97083352,10.8208333 9.59375019,10.8208333 9.92916686,11.2041667 L11.1750002,12.45 L14.3375002,9.2875 C14.7208335,8.90416667 15.2958335,8.90416667 15.6791669,9.2875 C16.0625002,9.67083333 16.0625002,10.2458333 15.6791669,10.6291667 L11.8458335,14.4625 C11.6541669,14.6541667 11.4145835,14.75 11.1750002,14.75 Z" fill="#000000"></path>
                    </g>
                </svg>
            </span>
            <!--end::Svg Icon-->
            <div class="d-flex flex-column">
                <h5 class="mb-1">Амжилттай</h5>
                <span>{{ session('success') }}</span>
            </div>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger d-flex align-items-center p-5 mb-10">
            <!--begin::Svg Icon | path: icons/duotone/General/Shield-check.svg-->
            <span class="svg-icon svg-icon-2hx svg-icon-danger me-4">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect x="0" y="0" width="24" height="24"></rect>
                        <path d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z" fill="#000000" opacity="0.3"></path>
                        <path d="M11.1750002,14.75 C10.9354169,14.75 10.6958335,14.6541667 10.5041669,14.4625 L8.58750019,12.5458333 C8.20416686,12.1625 8.20416686,11.5875 8.58750019,11.2041667 C8.97083352,10.8208333 9.59375019,10.8208333 9.92916686,11.2041667 L11.1750002,12.45 L14.3375002,9.2875 C14.7208335,8.90416667 15.2958335,8.90416667 15.6791669,9.2875 C16.0625002,9.67083333 16.0625002,10.2458333 15.6791669,10.6291667 L11.8458335,14.4625 C11.6541669,14.6541667 11.4145835,14.75 11.1750002,14.75 Z" fill="#000000"></path>
                    </g>
                </svg>
            </span>
            <!--end::Svg Icon-->
            <div class="d-flex flex-column">
                <h5 class="mb-1">Алдаа</h5>
                <span>{{ session('error') }}</span>
            </div>
        </div>
    @endif
    
    <form id="product_submittion" action="{{ is_null($product) ? route('product.create') : route('product.update', $product['id'] ) }}" method="POST" class="form d-flex flex-column flex-lg-row fv-plugins-bootstrap5 fv-plugins-framework" enctype="multipart/form-data">
        @csrf
        <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
            <div class="card card-flush py-4">
                <!--begin::Card header-->
                <div class="card-header">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <h2>Зураг</h2>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body text-center pt-0">
                    <!--begin::Image input-->
                    <div class="image-input image-input-empty image-input-outline mb-3" data-kt-image-input="true" style="background-image: url({{ asset('assets/media/svg/files/upload.svg') }})">
                        <!--begin::Preview existing avatar-->
                        <div class="image-input-wrapper w-150px h-150px"></div>
                        <!--end::Preview existing avatar-->
                        <!--begin::Label-->
                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="" data-bs-original-title="Зураг солих">
                            <i class="bi bi-pencil-fill fs-7"></i>
                            <!--begin::Inputs-->
                            <input type="file" name="featured_image" accept=".png, .jpg, .jpeg">
                            <input type="hidden" name="featured_image_remove">
                            <!--end::Inputs-->
                        </label>
                        <!--end::Label-->
                        <!--begin::Cancel-->
                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="" data-bs-original-title="Зураг устгах">
                            <i class="bi bi-x fs-2"></i>
                        </span>
                        <!--end::Cancel-->
                        <!--begin::Remove-->
                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="" data-bs-original-title="Зураг устгах">
                            <i class="bi bi-x fs-2"></i>
                        </span>
                        <!--end::Remove-->
                    </div>
                    <!--end::Image input-->
                    <!--begin::Description-->
                    <div class="text-muted fs-7">Set the product thumbnail image. Only *.png, *.jpg and *.jpeg image files are accepted</div>
                    <!--end::Description-->
                </div>
                <!--end::Card body-->
            </div>

        

            <div class="card card-flush py-4">
                <!--begin::Card header-->
                <div class="card-header">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <h2>Төлөв</h2>
                    </div>
                    <!--end::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <div class="rounded-circle bg-success w-15px h-15px" id="product_status"></div>
                    </div>
                    <!--begin::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Select2-->
                    <select  name="status" class="form-select mb-2" data-control="select2" data-hide-search="true" data-placeholder="Сонгох">
                        <option value="{{ Product::STATUS_ACTIVE }}">Нээлттэй</option>
                        <option value="{{ Product::STATUS_DRAFT }}">Ноорог</option>
                        <option value="{{ Product::STATUS_SCHEDULED }}">Хуваарьт</option>
                        <option value="{{ Product::STATUS_INACTIVE }}">Идэвхигүй</option>
                    </select>
                    <!--end::Select2-->
                </div>
                <!--end::Card body-->
            </div>

            <div class="card card-flush py-4">
                <!--begin::Card header-->
                <div class="card-header">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <h2>Ангилал</h2>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <div class="mb-4">
                        <select  name="categories[]" class="form-select" data-control="select2" data-placeholder="Сонгох" multiple="multiple">
                            @php
                                $category_ids = (isset($product['product_category']) && !empty($product['product_category'])) ? array_column($product['product_category'], 'id') : [];
                                $traverse = function ($categories, $prefix = '') use (&$traverse, $category_ids) {
                                    foreach ($categories as $category) {
                                        $selected = (!empty($category_ids) && in_array($category->id, $category_ids)) ? 'selected' : '';
                                        echo '<option value="'.$category->id.'" '.$selected.'>'.$prefix.' '.$category->name.'</option>';
                                        $traverse($category->children, $prefix.'— ');
                                    }
                                };
                                $traverse($product_categories);
                            @endphp
                        </select>
                    </div>
                    
                    <div>
                        @php
                            $tags = [];
                            if(isset($product['tags']) && !empty($product['tags'])) {
                                foreach ($product['tags'] as $tag) {
                                    $tags[] = $tag['name']['mn'];
                                }
                            }
                        @endphp
                        <label class="form-label d-block">Tags</label>
                        <!--begin::Select2-->
                        <input type="text" name="tags" id="tags" class="form-control" value="{{ implode(',', $tags) }}">
                        <!--end::Select2-->
                        <div class="text-muted fs-7">Бүтээгдэхүүнийг илэрхийлэх үгс</div>
                    </div>
                   
                    
                </div>
                <!--end::Card body-->
            </div>

        </div>
        <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
            <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-n2">
                <!--begin:::Tab item-->
                <li class="nav-item">
                    <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab" href="#product_general">Ерөнхий мэдээлэл</a>
                </li>
                <!--end:::Tab item-->
                <!--begin:::Tab item-->
                <li class="nav-item">
                    <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#product_advanced">Бусад мэдээлэл</a>
                </li>
                <!--end:::Tab item-->
            </ul>
            <div class="tab-content">
                <!--begin::Tab pane-->
                <div class="tab-pane fade show active" id="product_general" role="tab-panel">
                    <div class="d-flex flex-column gap-7 gap-lg-10">
                        <!-- ЕРӨНХИЙ -->
                        <div class="card card-flush py-4">
                            <!--begin::Card header-->
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>Ерөнхий мэдээлэл</h2>
                                </div>
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-0">
                                <!--begin::Input group-->
                                <div class="mb-10 fv-row fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="required form-label">Бүтээгдэхүүний нэр</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" name="name" class="form-control mb-2" placeholder="" value="{{ (isset($product['name'])) ? $product['name']: '' }}">
                                    <!--end::Input-->
                                <div class="fv-plugins-message-container invalid-feedback"></div></div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div>
                                    <!--begin::Label-->
                                    <label class="form-label">Тайлбар</label>
                                    <!--end::Label-->
                                    <!--begin::Editor-->
                                    <div id="general_description" class="min-h-200px mb-2 ql-container ql-snow">
                                        {!! (isset($product['data']['description'])) ? $product['data']['description'] : ''; !!}
                                    </div>
                                    <textarea name="data[description]" id="general_description_html" class="d-none">
                                        {{ (isset($product['data']['description'])) ? $product['data']['description'] : ''; }}
                                    </textarea>


                                    <!--end::Editor-->
                                    <!--begin::Description-->
                                    <!--end::Description-->
                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--end::Card header-->
                        </div>
                        <!-- МЕДИА -->
                        @component('products.components.gallery', ['product'=>$product])
                            
                        @endcomponent
                        <!-- Attributes -->
                        @component('products.components.new_attributes', ['product'=>$product])@endcomponent
                        <!-- ҮНЭ -->
                        {{-- @component('products.components.new_price', ['product'=>$product])@endcomponent --}}

                        @livewire('product.type-select', ['product' => $product], key($product->id))
                    </div>
                    
                </div>
                <div class="tab-pane fade" id="product_advanced" role="tab-panel">
                    <div class="d-flex flex-column gap-7 gap-lg-10">
                        @component('products.components.new_others', ['product'=>$product])@endcomponent
                    </div>
                   
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <!--begin::Button-->
                <a href="#" id="kt_ecommerce_add_product_cancel" class="btn btn-light me-5">Цуцлах</a>
                <!--end::Button-->
                <!--begin::Button-->
                <button type="submit" id="product_submit" class="btn btn-primary">
                    <span class="indicator-label">
                        {{ (empty($product)) ? 'Нэмэх' : 'Хадгалах' }}
                    </span>
                </button>
                <!--end::Button-->
            </div>
        </div>
    </form>
   
@endsection

@section('styles')
@endsection
@section('scripts')

    <script>

        var toolbarOptions = [
            ['bold', 'italic', 'underline'],        // toggled buttons
            ['link', 'image'],
            ['blockquote', 'code-block'],

            //[{ 'header': 1 }, { 'header': 2 }],               // custom button values
            [{ 'list': 'ordered'}, { 'list': 'bullet' }],
           // [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
            //[{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
           // [{ 'direction': 'rtl' }],                         // text direction

           // [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
            [{ 'header': [1, 2, 3, 4, 5, 6, false] }],

            [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
            [{ 'font': [] }],
            [{ 'align': [] }],

            ['clean']                                         // remove formatting button
        ];
        var general_description = new Quill('#general_description', {
            modules: {
                toolbar: toolbarOptions
            },
            placeholder: '',
            theme: 'snow' // or 'bubble'
        });

        var meta_guide = new Quill('#meta_guide', {
            modules: {
                toolbar: toolbarOptions
            },
            placeholder: 'Хэрэглэх зааварчилгаа',
            theme: 'snow' // or 'bubble'
        });
        var meta_ingredients = new Quill('#meta_ingredients', {
            modules: {
                toolbar: toolbarOptions
            },
            placeholder: 'Орц найрлагын мэдээллийг энд оруулна уу',
            theme: 'snow' // or 'bubble'
        });


        

        function saleSchedule(index) {
            $('#sale_schedule_'+index).toggleClass('d-none');
        }

        $(function() {

            var taginput = document.querySelector("#tags");
            var tagify = new Tagify(taginput, {
                whitelist: <?php echo json_encode($product_tags); ?>
            });

            $('#product_submit').click(function(){
                $('#general_description_html').val(general_description.root.innerHTML);
                $('#meta_ingredients_html').val(meta_ingredients.root.innerHTML);
                $('#meta_guide_html').val(meta_guide.root.innerHTML);
                $('#product_submittion').submit();
            });
            
            $(".datepicker").flatpickr();  
    
        });

        
    </script>
@endsection
