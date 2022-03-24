
const toolbarBase = $('[data-kt-product-table-toolbar="base"]');
const toolbarSelected = $('[data-kt-product-table-toolbar="selected"]');
const selectedCount = $('[data-kt-product-table-select="selected_count"]');


$('body').on('change', '#product_table tbody [type="checkbox"]', function(){
    var selected = $('#product_table tbody [type="checkbox"]:checked').map(function(){
        return $(this).val();
    }).get();
    if(selected.length) {
        selectedCount.html(selected.length);
        toolbarBase.addClass('d-none');
        toolbarSelected.removeClass('d-none');
    } else {
        toolbarBase.removeClass('d-none');
        toolbarSelected.addClass('d-none');
    }

});
    
function process_delete(array_ids) {
    jQuery.ajax({
        type: "POST",
        url: "/shop/product/delete/",
        headers: {
            'X-CSRF-Token': $('meta[name="_token"]').attr('content')
        },
        dataType:"json",
        data: {
            ids: array_ids
        },
        success: function(response){
            if(response.result == 'success') {
                product_table.draw();
            }
            Swal.fire({
                title: (response.result == 'success') ? 'Амжилттай' : 'Алдаа',
                html: response.message,
                icon: (response.result == 'success') ? 'success' : 'error',
                showCancelButton: false,
                showConfirmButton: false
            });

           
            
        }
    });
}

// Дан бүтээгдэхүүн устгах
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
            process_delete([button.value]);
        }
    })
}

// Сонгосон олон бүтээгдэхүүн устгах
function productsDelete() {
    var selected = $('#product_table tbody [type="checkbox"]:checked').map(function(){
        return $(this).val();
    }).get();

    Swal.fire({
        title: 'Та итгэлтэй байна уу?',
        html: "Сонгогдсон <b>"+selected.length+"</b> бүтээгдэхүүнийг устгах гэж байна уу?",
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
            toolbarBase.removeClass('d-none');
            toolbarSelected.addClass('d-none');
            process_delete(selected);

        }
    })
}





/* Устсан бүтээгдэхүүнийг сэргээнэ */
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