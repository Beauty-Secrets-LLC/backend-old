"use strict";
var KTUsersAddUser = (function () {
    var inputs = ['file', 'text', 'hidden', 'password', 'tel', 'email', 'radio', 'checkbox'];
    var form_values = {};
    var token = '';
    const t = document.getElementById("kt_modal_add_user"),
        e = t.querySelector("#kt_modal_add_user_form"),
        n = new bootstrap.Modal(t);
    return {
        init: function () {
            (() => {
                var o = FormValidation.formValidation(e, {
                    fields: { 
                        name: { 
                            validators: { 
                                notEmpty: { message: "Нэр бөглөх шаардлагатай" } 
                            } 
                        }, 
                        phone: { 
                            validators: { 
                                notEmpty: { message: "Утасны дугаар бөглөх шаардлагатай" } 
                            } 
                        },
                        email: { 
                            validators: { 
                                notEmpty: { message: "И-мэйл бөглөх шаардлагатай" } 
                            } 
                        },
                        password: { 
                            validators: { 
                                notEmpty: { message: "Нууц үг бөглөх шаардлагатай" } 
                            } 
                        }
                    },
                    plugins: { trigger: new FormValidation.plugins.Trigger(), bootstrap: new FormValidation.plugins.Bootstrap5({ rowSelector: ".fv-row", eleInvalidClass: "", eleValidClass: "" }) },
                });
                const i = t.querySelector('[data-kt-users-modal-action="submit"]');
                i.addEventListener("click", (t) => {
                    t.preventDefault(),
                        o &&
                            o.validate().then(function (t) {
                                console.log("validated!"),
                                    "Valid" == t
                                        ? (i.setAttribute("data-kt-indicator", "on"),
                                          (i.disabled = !0),
                                            i.removeAttribute("data-kt-indicator"),
                                            (i.disabled = !1),
                                            $.each(e.elements, function (elem_index, form_field) {
                                                if(inputs.includes(form_field.type) && form_field.value!="") {
                                                    if(form_field.name == '_token') 
                                                        token = form_field.value;

                                                    if(form_field.type == 'radio'|| form_field.type == 'checkbox') {
                                                        if(form_field.checked) {
                                                            form_values[form_field.name] = form_field.value;
                                                        }
                                                    }else {
                                                        form_values[form_field.name] = form_field.value;
                                                    }
                                                }
                                            }),
                                            jQuery.ajax({
                                                type: "POST",
                                                url: '/user/register',
                                                data: {
                                                    user_data   : form_values,
                                                    "_token"    : token,
                                                },
                                                dataType:"json",
                                                success: function(response){
                                                    console.log(response);
                                                    if(response.result == 'success') {
                                                        Swal.fire({ text: "Хэрэглэгчийг амжилттай бүртгэлээ!", icon: "success", buttonsStyling: !1, confirmButtonText: "Ok", customClass: { confirmButton: "btn btn-primary" } }).then(
                                                            function (t) {
                                                                t.isConfirmed && n.hide();
                                                            }
                                                        ).then(function() {
                                                            location.reload();
                                                        });
                                                    }else {
                                                        Swal.fire({
                                                            text: response.message,
                                                            icon: "error",
                                                            buttonsStyling: !1,
                                                            confirmButtonText: "Okay",
                                                            customClass: { confirmButton: "btn btn-primary" },
                                                        });
                                                    }
                                                }
                                            })
                                          )
                                        : Swal.fire({
                                              text: "Уучлаарай, зарим мэдээлэл дутуу эсвэл алдаатай байна. Та мэдээллээ шалгаад дахин оролдоно уу.",
                                              icon: "error",
                                              buttonsStyling: !1,
                                              confirmButtonText: "Ойлголоо",
                                              customClass: { confirmButton: "btn btn-primary" },
                                          });
                            });
                }),
                    t.querySelector('[data-kt-users-modal-action="cancel"]').addEventListener("click", (t) => {
                        t.preventDefault(),
                            Swal.fire({
                                text: "Are you sure you would like to cancel?",
                                icon: "warning",
                                showCancelButton: !0,
                                buttonsStyling: !1,
                                confirmButtonText: "Yes, cancel it!",
                                cancelButtonText: "No, return",
                                customClass: { confirmButton: "btn btn-primary", cancelButton: "btn btn-active-light" },
                            }).then(function (t) {
                                t.value
                                    ? (e.reset(), n.hide())
                                    : "cancel" === t.dismiss &&
                                      Swal.fire({ text: "Your form has not been cancelled!.", icon: "error", buttonsStyling: !1, confirmButtonText: "Ok, got it!", customClass: { confirmButton: "btn btn-primary" } });
                            });
                    }),
                    t.querySelector('[data-kt-users-modal-action="close"]').addEventListener("click", (t) => {
                        t.preventDefault(),
                            Swal.fire({
                                text: "Are you sure you would like to cancel?",
                                icon: "warning",
                                showCancelButton: !0,
                                buttonsStyling: !1,
                                confirmButtonText: "Yes, cancel it!",
                                cancelButtonText: "No, return",
                                customClass: { confirmButton: "btn btn-primary", cancelButton: "btn btn-active-light" },
                            }).then(function (t) {
                                t.value
                                    ? (e.reset(), n.hide())
                                    : "cancel" === t.dismiss &&
                                      Swal.fire({ text: "Your form has not been cancelled!.", icon: "error", buttonsStyling: !1, confirmButtonText: "Ok, got it!", customClass: { confirmButton: "btn btn-primary" } });
                            });
                    });
            })();
        },
    };
})();
KTUtil.onDOMContentLoaded(function () {
    KTUsersAddUser.init();
});
