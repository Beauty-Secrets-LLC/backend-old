<!--begin::Javascript-->
<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
<!--end::Global Javascript Bundle-->

<!--end::Javascript-->
<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>


<script>
    window.addEventListener('toastr:success', function(event) {
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": true,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };
        toastr.success(event.detail.message);
    });

    window.addEventListener('swal:failed', function(event) {
        Swal.fire({ 
            title: event.detail.title, 
            html: event.detail.html, 
            icon: "error", 
            showCancelButton: false, 
            showConfirmButton: false 
        });
    });
</script>

<!--begin::Page Vendors Javascript(used by this page)-->
{{-- <script src="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script> --}}
<!--end::Page Vendors Javascript-->