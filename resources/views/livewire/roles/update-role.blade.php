<div class="modal-content">
    <!--begin::Modal header-->
    <div class="modal-header">
        <!--begin::Modal title-->
        <h2 class="fw-bolder">Үүрэг засварлах</h2>
        <!--end::Modal title-->
        <!--begin::Close-->
        <div class="btn btn-icon btn-sm btn-active-icon-primary" wire:click="close">
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
    <!--end::Modal header-->
    <!--begin::Modal body-->
    <div class="modal-body scroll-y mx-5 my-7">
        <!--begin::Form-->
        <form id="kt_modal_update_role_form" class="form" action="#">
            <!--begin::Scroll-->
            <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_update_role_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_update_role_header" data-kt-scroll-wrappers="#kt_modal_update_role_scroll" data-kt-scroll-offset="300px">
                <!--begin::Input group-->
                <div class="fv-row mb-10">
                    <!--begin::Label-->
                    <label class="fs-5 fw-bolder form-label mb-2">
                        <span class="required">Нэр</span>
                    </label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <input class="form-control form-control-solid" placeholder="Нэрээ оруулна уу" name="role_name" wire:model="role_name" />
                    <!--end::Input-->
                </div>
                <!--end::Input group-->
                <!--begin::Permissions-->
                <div class="fv-row">
                    <!--begin::Label-->
                    <label class="fs-5 fw-bolder form-label mb-2">Системийн эрхүүд</label>
                    <!--end::Label-->
                    @dump($permissions)
                    <!--begin::Table wrapper-->
                    <div class="table-responsive">
                        <!--begin::Table-->
                        <table class="table align-middle table-row-dashed fs-6 gy-5">
                            <!--begin::Table body-->
                            <tbody class="text-gray-600 fw-bold">
                                <!--begin::Table row-->
                                <tr>
                                    <td class="text-gray-800">Админ эрх 
                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Allows a full access to the system"></i></td>
                                    <td>
                                        <!--begin::Checkbox-->
                                        <label class="form-check form-check-sm form-check-custom form-check-solid me-9">
                                            <input class="form-check-input" type="checkbox" value="" id="kt_roles_select_all" />
                                            <span class="form-check-label" for="kt_roles_select_all">Бүгдийг сонгох</span>
                                        </label>
                                        <!--end::Checkbox-->
                                    </td>
                                </tr>
                                <!--end::Table row-->
                                <!--begin::Table row-->
                                <tr>
                                    <!--begin::Label-->
                                    <td class="text-gray-800">User Management</td>
                                    <!--end::Label-->
                                    <!--begin::Input group-->
                                    <td>
                                        <!--begin::Wrapper-->
                                        <div class="d-flex">
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                <input class="form-check-input" type="checkbox" value="" name="user_management_read" />
                                                <span class="form-check-label">Read</span>
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid me-5 me-lg-20">
                                                <input class="form-check-input" type="checkbox" value="" name="user_management_write" />
                                                <span class="form-check-label">Write</span>
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox" value="" name="user_management_create" />
                                                <span class="form-check-label">Create</span>
                                            </label>
                                            <!--end::Checkbox-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </td>
                                    <!--end::Input group-->
                                </tr>
                                <!--end::Table row-->
                                <!--begin::Table row-->
                                <tr>
                                    <!--begin::Label-->
                                    <td class="text-gray-800">Content Management</td>
                                    <!--end::Label-->
                                    <!--begin::Input group-->
                                    <td>
                                        <!--begin::Wrapper-->
                                        <div class="d-flex">
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                <input class="form-check-input" type="checkbox" value="" name="content_management_read" />
                                                <span class="form-check-label">Read</span>
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid me-5 me-lg-20">
                                                <input class="form-check-input" type="checkbox" value="" name="content_management_write" />
                                                <span class="form-check-label">Write</span>
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox" value="" name="content_management_create" />
                                                <span class="form-check-label">Create</span>
                                            </label>
                                            <!--end::Checkbox-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </td>
                                    <!--end::Input group-->
                                </tr>
                                <!--end::Table row-->
                                <!--begin::Table row-->
                                <tr>
                                    <!--begin::Label-->
                                    <td class="text-gray-800">Financial Management</td>
                                    <!--end::Label-->
                                    <!--begin::Input group-->
                                    <td>
                                        <!--begin::Wrapper-->
                                        <div class="d-flex">
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                <input class="form-check-input" type="checkbox" value="" name="financial_management_read" />
                                                <span class="form-check-label">Read</span>
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid me-5 me-lg-20">
                                                <input class="form-check-input" type="checkbox" value="" name="financial_management_write" />
                                                <span class="form-check-label">Write</span>
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox" value="" name="financial_management_create" />
                                                <span class="form-check-label">Create</span>
                                            </label>
                                            <!--end::Checkbox-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </td>
                                    <!--end::Input group-->
                                </tr>
                                <!--end::Table row-->
                                <!--begin::Table row-->
                                <tr>
                                    <!--begin::Label-->
                                    <td class="text-gray-800">Reporting</td>
                                    <!--end::Label-->
                                    <!--begin::Input group-->
                                    <td>
                                        <!--begin::Wrapper-->
                                        <div class="d-flex">
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                <input class="form-check-input" type="checkbox" value="" name="reporting_read" />
                                                <span class="form-check-label">Read</span>
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid me-5 me-lg-20">
                                                <input class="form-check-input" type="checkbox" value="" name="reporting_write" />
                                                <span class="form-check-label">Write</span>
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox" value="" name="reporting_create" />
                                                <span class="form-check-label">Create</span>
                                            </label>
                                            <!--end::Checkbox-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </td>
                                    <!--end::Input group-->
                                </tr>
                                <!--end::Table row-->
                                <!--begin::Table row-->
                                <tr>
                                    <!--begin::Label-->
                                    <td class="text-gray-800">Payroll</td>
                                    <!--end::Label-->
                                    <!--begin::Input group-->
                                    <td>
                                        <!--begin::Wrapper-->
                                        <div class="d-flex">
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                <input class="form-check-input" type="checkbox" value="" name="payroll_read" />
                                                <span class="form-check-label">Read</span>
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid me-5 me-lg-20">
                                                <input class="form-check-input" type="checkbox" value="" name="payroll_write" />
                                                <span class="form-check-label">Write</span>
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox" value="" name="payroll_create" />
                                                <span class="form-check-label">Create</span>
                                            </label>
                                            <!--end::Checkbox-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </td>
                                    <!--end::Input group-->
                                </tr>
                                <!--end::Table row-->
                                <!--begin::Table row-->
                                <tr>
                                    <!--begin::Label-->
                                    <td class="text-gray-800">Disputes Management</td>
                                    <!--end::Label-->
                                    <!--begin::Input group-->
                                    <td>
                                        <!--begin::Wrapper-->
                                        <div class="d-flex">
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                <input class="form-check-input" type="checkbox" value="" name="disputes_management_read" />
                                                <span class="form-check-label">Read</span>
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid me-5 me-lg-20">
                                                <input class="form-check-input" type="checkbox" value="" name="disputes_management_write" />
                                                <span class="form-check-label">Write</span>
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox" value="" name="disputes_management_create" />
                                                <span class="form-check-label">Create</span>
                                            </label>
                                            <!--end::Checkbox-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </td>
                                    <!--end::Input group-->
                                </tr>
                                <!--end::Table row-->
                                <!--begin::Table row-->
                                <tr>
                                    <!--begin::Label-->
                                    <td class="text-gray-800">API Controls</td>
                                    <!--end::Label-->
                                    <!--begin::Input group-->
                                    <td>
                                        <!--begin::Wrapper-->
                                        <div class="d-flex">
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                <input class="form-check-input" type="checkbox" value="" name="api_controls_read" />
                                                <span class="form-check-label">Read</span>
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid me-5 me-lg-20">
                                                <input class="form-check-input" type="checkbox" value="" name="api_controls_write" />
                                                <span class="form-check-label">Write</span>
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox" value="" name="api_controls_create" />
                                                <span class="form-check-label">Create</span>
                                            </label>
                                            <!--end::Checkbox-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </td>
                                    <!--end::Input group-->
                                </tr>
                                <!--end::Table row-->
                                <!--begin::Table row-->
                                <tr>
                                    <!--begin::Label-->
                                    <td class="text-gray-800">Database Management</td>
                                    <!--end::Label-->
                                    <!--begin::Input group-->
                                    <td>
                                        <!--begin::Wrapper-->
                                        <div class="d-flex">
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                <input class="form-check-input" type="checkbox" value="" name="database_management_read" />
                                                <span class="form-check-label">Read</span>
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid me-5 me-lg-20">
                                                <input class="form-check-input" type="checkbox" value="" name="database_management_write" />
                                                <span class="form-check-label">Write</span>
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox" value="" name="database_management_create" />
                                                <span class="form-check-label">Create</span>
                                            </label>
                                            <!--end::Checkbox-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </td>
                                    <!--end::Input group-->
                                </tr>
                                <!--end::Table row-->
                                <!--begin::Table row-->
                                <tr>
                                    <!--begin::Label-->
                                    <td class="text-gray-800">Repository Management</td>
                                    <!--end::Label-->
                                    <!--begin::Input group-->
                                    <td>
                                        <!--begin::Wrapper-->
                                        <div class="d-flex">
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                <input class="form-check-input" type="checkbox" value="" name="repository_management_read" />
                                                <span class="form-check-label">Read</span>
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid me-5 me-lg-20">
                                                <input class="form-check-input" type="checkbox" value="" name="repository_management_write" />
                                                <span class="form-check-label">Write</span>
                                            </label>
                                            <!--end::Checkbox-->
                                            <!--begin::Checkbox-->
                                            <label class="form-check form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox" value="" name="repository_management_create" />
                                                <span class="form-check-label">Create</span>
                                            </label>
                                            <!--end::Checkbox-->
                                        </div>
                                        <!--end::Wrapper-->
                                    </td>
                                    <!--end::Input group-->
                                </tr>
                                <!--end::Table row-->
                            </tbody>
                            <!--end::Table body-->
                        </table>
                        <!--end::Table-->
                    </div>
                    <!--end::Table wrapper-->
                </div>
                <!--end::Permissions-->
            </div>
            <!--end::Scroll-->
            <!--begin::Actions-->
            <div class="text-center pt-15">
                <button type="reset" class="btn btn-light me-3" data-kt-roles-modal-action="cancel">Discard</button>
                <button type="submit" class="btn btn-primary" data-kt-roles-modal-action="submit">
                    <span class="indicator-label">Submit</span>
                    <span class="indicator-progress">Please wait...
                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                </button>
            </div>
            <!--end::Actions-->
        </form>
        <!--end::Form-->
    </div>
    <!--end::Modal body-->
</div>