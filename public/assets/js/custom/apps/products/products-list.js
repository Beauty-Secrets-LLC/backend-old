function productDelete(button) {
    Swal.fire({
        title: 'Та итгэлтэй байна уу?',
        html: "<b>\""+button.dataset.title+"\"</b> нэртэй бүтээгдэхүүнийг устгах гэж байна уу?",
        icon: 'warning',
        showCancelButton: true,
        customClass: {
            confirmButton: 'btn btn-primary',
            cancelButton: 'btn btn-light',
        },
        cancelButtonText: 'Үгүй',
        confirmButtonText: 'Тийм'
    }).then((result) => {
        if (result.isConfirmed) {
            jQuery.ajax({
                type: "POST",
                url: "/shop/product/delete/"+button.value,
                headers: {
                    'X-CSRF-Token': $('meta[name="_token"]').attr('content')
                },
                dataType:"json",
                success: function(response){
                    if(response) {
                        product_table.draw();
                        Swal.fire(
                            'Устгалаа!',
                            'Таны сонгосон бүтээгдэхүүнийг амжилттай устгалаа',
                            'success'
                        );
                    }
                    
                }
            });
        }
    })
}

function productRestore(button) {
    Swal.fire({
        title: 'Энэ бүтээгдэхүүнийг сэргээх үү?',
        html: "<b>\""+button.dataset.title+"\"</b> нэртэй бүтээгдэхүүнийг сэргээх гэж байна уу?",
        icon: 'warning',
        showCancelButton: true,
        customClass: {
            confirmButton: 'btn btn-primary',
            cancelButton: 'btn btn-light',
        },
        cancelButtonText: 'Үгүй',
        confirmButtonText: 'Тийм'
    }).then((result) => {
        if (result.isConfirmed) {
            jQuery.ajax({
                type: "POST",
                url: "/shop/product/restore/"+button.value,
                headers: {
                    'X-CSRF-Token': $('meta[name="_token"]').attr('content')
                },
                dataType:"json",
                success: function(response){
                    console.log(response);
                    if(response) {
                        product_table.draw();
                        // Swal.fire(
                        //     'Устгалаа!',
                        //     'Таны сонгосон бүтээгдэхүүнийг амжилттай устгалаа',
                        //     'success'
                        // );
                    }
                    
                }
            });
        }
    })
}