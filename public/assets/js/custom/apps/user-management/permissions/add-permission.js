"use strict";
var KTUsersAddPermission = (function () {
    const t = document.getElementById("kt_modal_add_permission"),
        e = t.querySelector("#kt_modal_add_permission_form"),
        n = new bootstrap.Modal(t);
    var formValues = {};
    return {
        init: function () {
            (() => {
                var o = FormValidation.formValidation(e, {
                    fields: { permission_name: { validators: { notEmpty: { message: "Permission name is required" } } } },
                    plugins: { trigger: new FormValidation.plugins.Trigger(), bootstrap: new FormValidation.plugins.Bootstrap5({ rowSelector: ".fv-row", eleInvalidClass: "", eleValidClass: "" }) },
                });
                t.querySelector('[data-kt-permissions-modal-action="close"]').addEventListener("click", (t) => {
                    t.preventDefault(),
                        Swal.fire({
                            text: "Та энэ цонхийг хаах гэж байна уу?",
                            icon: "warning",
                            showCancelButton: !0,
                            buttonsStyling: !1,
                            confirmButtonText: "Тиймээ, хаая!",
                            cancelButtonText: "Үгүй",
                            customClass: { confirmButton: "btn btn-primary", cancelButton: "btn btn-active-light" },
                        }).then(function (t) {
                            t.value && n.hide();
                        });
                }),
                    t.querySelector('[data-kt-permissions-modal-action="cancel"]').addEventListener("click", (t) => {
                        t.preventDefault(),
                            Swal.fire({
                                text: "Та үйлдлээ цуцлах гэж байна уу?",
                                icon: "warning",
                                showCancelButton: !0,
                                buttonsStyling: !1,
                                confirmButtonText: "Тийм ээ, цуцлая!",
                                cancelButtonText: "Үгүй",
                                customClass: { confirmButton: "btn btn-primary", cancelButton: "btn btn-active-light" },
                            }).then(function (t) {
                                t.value
                                    ? (e.reset(), n.hide())
                                    : "cancel" === t.dismiss &&
                                      Swal.fire({ text: "Формыг хэвэнд нь үлдээлээ!.", icon: "error", buttonsStyling: !1, confirmButtonText: "Ойлголоо!", customClass: { confirmButton: "btn btn-primary" } });
                            });
                    });
                const i = t.querySelector('[data-kt-permissions-modal-action="submit"]');
                i.addEventListener("click", function (t) {
                    t.preventDefault(),
                        o &&
                            o.validate().then(function (t) {
                                console.log("validated!"),
                                    "Valid" == t
                                        ? (i.setAttribute("data-kt-indicator", "on"),
                                          (i.disabled = !0),
                                         
                                          jQuery.ajax({
                                            type: "POST",
                                            url: '/users/permissions/ajaxadd',
                                            data: {
                                                "_token"        : e.elements[0].value,
                                                permission_name : e.elements[1].value,
                                            },
                                            dataType:"json",
                                            success: function(response){
                                                if(response) {
                                                    i.removeAttribute("data-kt-indicator"),
                                                    (i.disabled = !1),
                                                    Swal.fire({ text: "Эрхийг амжилттай үүсгэлээ!", icon: "success", buttonsStyling: !1, confirmButtonText: "Ok", customClass: { confirmButton: "btn btn-primary" } }).then(
                                                        function (t) {
                                                            t.isConfirmed && n.hide();
                                                        }
                                                    );
                                                }
                                            }
                                          })
                                        )
                                        : Swal.fire({
                                            text: "Уучлаарай, Алдаа гарсан тул та мэдээллээ шалгаад дахин оролдоно уу",
                                            icon: "error",
                                            buttonsStyling: !1,
                                            confirmButtonText: "За",
                                            customClass: { confirmButton: "btn btn-primary" },
                                        });
                            });
                });
            })();
        },
    };
})();
KTUtil.onDOMContentLoaded(function () {
    KTUsersAddPermission.init();
});
