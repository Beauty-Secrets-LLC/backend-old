"use strict";
var KTUsersList = (function () {
    var e,
        t,
        n,
        r,
        o = document.getElementById("kt_table_users"),
        c = () => {
            o.querySelectorAll('[data-kt-users-table-filter="delete_row"]').forEach((t) => {
            
                t.addEventListener("click", function (t) {
                    t.preventDefault();
                    const n = t.target.closest("tr"),
                        r = n.querySelectorAll("td")[1].querySelectorAll("a")[1].innerText,
                        deleteRow = n.querySelectorAll("td")[0].querySelector("input[type=checkbox]").value;
           
                    Swal.fire({
                        text: "Та " + r + " нэртэй хэрэглэгчийг устгах гэж байна уу?" ,
                        icon: "warning",
                        showCancelButton: !0,
                        buttonsStyling: !1,
                        confirmButtonText: "Тийм",
                        cancelButtonText: "Үгүй",
                        customClass: { confirmButton: "btn fw-bold btn-danger", cancelButton: "btn fw-bold btn-active-light-primary" },
                    }).then(function (t) {
                        if(t.value) {
                            jQuery.ajax({
                                type: "GET",
                                url: '/user/delete/'+deleteRow,
                                dataType:"json",
                                success: function(response){
                                    if(response.result) {
                                        Swal.fire({ text: r + " нэртэй хэрэглэгч устгагдлаа", icon: "success", buttonsStyling: !1, confirmButtonText: "Ok", customClass: { confirmButton: "btn fw-bold btn-primary" } })
                                        .then(function () {
                                            e.row($(n)).remove().draw();
                                        })
                                        .then(function () {
                                            a();
                                        })
            
                                    }
                                }
                            });


                        }
                        else {
                            "cancel" === t.dismiss && Swal.fire({ text: customerName + " was not deleted.", icon: "error", buttonsStyling: !1, confirmButtonText: "Ok, got it!", customClass: { confirmButton: "btn fw-bold btn-primary" } });
                        }
                        
                    });
                });
            });
        },
        l = () => {
            const c = o.querySelectorAll('[type="checkbox"]');
            (t = document.querySelector('[data-kt-user-table-toolbar="base"]')), (n = document.querySelector('[data-kt-user-table-toolbar="selected"]')), (r = document.querySelector('[data-kt-user-table-select="selected_count"]'));
            const s = document.querySelector('[data-kt-user-table-select="delete_selected"]');
            c.forEach((e) => {
                e.addEventListener("click", function () {
                    setTimeout(function () {
                        a();
                    }, 50);
                });
            }),
                s.addEventListener("click", function () {
                    Swal.fire({
                        text: "Сонгогдсон хэрэглэгчдийг устгах уу?",
                        icon: "warning",
                        showCancelButton: !0,
                        buttonsStyling: !1,
                        confirmButtonText: "Тэгье!",
                        cancelButtonText: "Үгүй",
                        customClass: { confirmButton: "btn fw-bold btn-danger", cancelButton: "btn fw-bold btn-active-light-primary" },
                    }).then(function (t) {

                        if(t.value) {
                            var selected_users = []
                            c.forEach((t) => {
                                if(t.checked)  {
                                    selected_users.push(t.value);
                                }
                                    
                            });

                            jQuery.ajax({
                                type: "POST",
                                url: '/user/delete-selected/',
                                dataType:"json",
                                data: {
                                    ids: selected_users
                                },
                                headers: {
                                    'X-CSRF-Token': $('meta[name="_token"]').attr('content')
                                },
                                success: function(response){
                                    if(response.result == 'success') {
                                        c.forEach((t) => {
                                            if(t.checked)  {
                                                e.row($(t.closest("tbody tr"))).remove().draw();
                                            }
                                        });
                                    }

                                    Swal.fire({
                                        title: (response.result == 'success') ? 'Амжилттай' : 'Алдаа',
                                        html: response.message,
                                        icon: (response.result == 'success') ? 'success' : 'error',
                                        showCancelButton: false,
                                        showConfirmButton: false
                                    })
                                    .then(function () {
                                        a(), l();
                                    });

                                    o.querySelectorAll('[type="checkbox"]')[0].checked = !1;

                                }
                            })
                            
                        };
                    });
                });
        };
    const a = () => {
        const e = o.querySelectorAll('tbody [type="checkbox"]');
        let c = !1,
            l = 0;
        e.forEach((e) => {
            e.checked && ((c = !0), l++);
        }),
            c ? ((r.innerHTML = l), t.classList.add("d-none"), n.classList.remove("d-none")) : (t.classList.remove("d-none"), n.classList.add("d-none"));
    };
    return {
        init: function () {
            o &&
                (o.querySelectorAll("tbody tr").forEach((e) => {
                   
                }),
                (e = $(o).DataTable({
                    info: !1,
                    order: [],
                    pageLength: 10,
                    lengthChange: !1,
                    columnDefs: [
                        { orderable: !1, targets: 0 },
                        { orderable: !1, targets: 5 },
                    ],
                })).on("draw", function () {
                    l(), c(), a();
                }),
                l(),
                document.querySelector('[data-kt-user-table-filter="search"]').addEventListener("keyup", function (t) {
                    e.search(t.target.value).draw();
                }),
                document.querySelector('[data-kt-user-table-filter="reset"]').addEventListener("click", function () {
                    document
                        .querySelector('[data-kt-user-table-filter="form"]')
                        .querySelectorAll("select")
                        .forEach((e) => {
                            $(e).val("").trigger("change");
                        }),
                        e.search("").draw();
                }),
                c(),
                (() => {
                    const t = document.querySelector('[data-kt-user-table-filter="form"]'),
                        n = t.querySelector('[data-kt-user-table-filter="filter"]'),
                        r = t.querySelectorAll("select");
                    n.addEventListener("click", function () {
                        var t = "";
                        r.forEach((e, n) => {
                            e.value && "" !== e.value && (0 !== n && (t += " "), (t += e.value));
                        }),
                            e.search(t).draw();
                    });
                })());
        },
    };
})();
KTUtil.onDOMContentLoaded(function () {
    KTUsersList.init();
});
