<div class="card mb-5 mb-xl-8">
    <!--begin::Card body-->
    <div class="card-body pt-15">
        @livewire('customer.detail', ['customer' => $customer])
    </div>
    <!--end::Card body-->
</div>

<!--begin::Modal - New Address-->
<div class="modal fade" id="kt_modal_update_customer" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    @livewire('customer.update-customer', ['customer' => $customer])
</div>
<!--end::Modal - New Address-->