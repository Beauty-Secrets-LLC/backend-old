"use strict";
var KTUsersUpdateDetails = (function () {
    const t = document.getElementById("update_user_modal"),
        e = t.querySelector("#update_user_form"),
        n = new bootstrap.Modal(t);
    return {
        init: function () {
            (() => {
                t.querySelector('[data-kt-users-modal-action="close"]').addEventListener("click", (t) => {
                    t.preventDefault(),
                        Swal.fire({
                            text: "Та үйлдлээ цуцлах гэж байна уу?",
                            icon: "warning",
                            showCancelButton: !0,
                            buttonsStyling: !1,
                            confirmButtonText: "Тийм ээ!",
                            cancelButtonText: "Үгүй",
                            customClass: { confirmButton: "btn btn-primary", cancelButton: "btn btn-active-light" },
                        }).then(function (t) {
                            t.value
                                ? (e.reset(), n.hide())
                                : "cancel" === t.dismiss && Swal.fire({ text: "Үйлдлийг буцаалаа.", icon: "error", buttonsStyling: !1, confirmButtonText: "Ойлголоо!", customClass: { confirmButton: "btn btn-primary" } });
                        });
                }),
                    t.querySelector('[data-kt-users-modal-action="cancel"]').addEventListener("click", (t) => {
                        t.preventDefault(),
                            Swal.fire({
                                text: "Та үйлдлээ цуцлах гэж байна уу?",
                                icon: "warning",
                                showCancelButton: !0,
                                buttonsStyling: !1,
                                confirmButtonText: "Тийм ээ!",
                                cancelButtonText: "Үгүй",
                                customClass: { confirmButton: "btn btn-primary", cancelButton: "btn btn-active-light" },
                            }).then(function (t) {
                                t.value
                                    ? (e.reset(), n.hide())
                                    : "cancel" === t.dismiss &&
                                      Swal.fire({ text: "Үйлдлийг буцаалаа.", icon: "error", buttonsStyling: !1, confirmButtonText: "Ойлголоо!", customClass: { confirmButton: "btn btn-primary" } });
                            });
                    });
            })();
        },
    };
})();
KTUtil.onDOMContentLoaded(function () {
    KTUsersUpdateDetails.init();
});
