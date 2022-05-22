<div class="card card-flush py-4">
    <!--begin::Card header-->
    <div class="card-header">
        <div class="card-title">
            <h2>Медиа</h2>
        </div>
    </div>
    <!--end::Card header-->
    <div class="card-body pt-0">
        <!--begin::Input group-->
        <div class="fv-row mb-2">
            <!--begin::Dropzone-->

            <input type="file" name="gallery_image[]" multiple accept=".png, .jpg, .jpeg">

         

                <!--begin::Input group-->
                <div class="fv-row">
                    <!--begin::Dropzone-->
                    <div class="dropzone" id="kt_dropzonejs_example_1">
                        <!--begin::Message-->
                        <div class="dz-message needsclick">
                            <!--begin::Icon-->
                            <i class="bi bi-file-earmark-arrow-up text-primary fs-3x"></i>
                            <!--end::Icon-->

                            <!--begin::Info-->
                            <div class="ms-4">
                                <h3 class="fs-5 fw-bolder text-gray-900 mb-1">Энд дарж эсвэл оруулах файлуудаа энд зөөж оруулна уу</h3>
                                <span class="fs-7 fw-bold text-gray-400">10 хүртэлх файл хуулах боломжтой</span>
                            </div>
                            <!--end::Info-->
                        </div>
                    </div>
                    <!--end::Dropzone-->
                </div>
                <!--end::Input group-->
           
            <!--end::Dropzone-->
        </div>
        <!--end::Input group-->
        <!--begin::Description-->
        <div class="text-muted fs-7">Бүтээгдэхүүний зургын галерейг үүсгэх</div>
        <!--end::Description-->
    </div>

</div>

@push('js')
    <script>
        var myDropzone = new Dropzone("#kt_dropzonejs_example_1", {
            paramName: "file", // The name that will be used to transfer the file
            maxFiles: 10,
            maxFilesize: 10, // MB
            addRemoveLinks: true,
            accept: function(file, done) {
                if (file.name == "wow.jpg") {
                    done("Naha, you don't.");
                } else {
                    done();
                }
            }
        });
    </script>
@endpush