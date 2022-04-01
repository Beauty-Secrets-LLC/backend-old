
const toolbarBase = $('[data-kt-permissions-table-toolbar="base"]');
const toolbarSelected = $('[data-kt-permissions-table-toolbar="selected"]');
const selectedCount = $('[data-kt-permissions-table-select="selected_count"]');

$('body').on('change', '#permissions_table tbody [type="checkbox"]', function(){
    var selected = $('#permissions_table tbody [type="checkbox"]:checked').map(function(){
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


$(document).on('click', 'button[data-action="delete"]', function(){
    Swal.fire({
        title: 'Устгах үйлдэл',
        html: "Та энэ эрхийг устгах гэж байна уу?",
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
                url: "/user/permissions/delete/",
                headers: {
                    'X-CSRF-Token': $('meta[name="_token"]').attr('content')
                },
                data: {
                    ids: [$(this).val()]
                },
                dataType:"json",
                success: function(response){
                    if(response.result == 'success') {
                        permission_table.draw();
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
    });
});



function bulkDelete() {
    var selected = $('#permissions_table tbody [type="checkbox"]:checked').map(function(){
        return $(this).val();
    }).get();

    Swal.fire({
        title: 'Устгах үйлдэл',
        html: "Та сонгогдсон эрхүүдийг устгах гэж байна уу?",
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
                url: "/user/permissions/delete/",
                headers: {
                    'X-CSRF-Token': $('meta[name="_token"]').attr('content')
                },
                data: {
                    ids: selected
                },
                dataType:"json",
                success: function(response){
                    if(response.result == 'success') {
                        permission_table.draw();
                        toolbarBase.removeClass('d-none');
                        toolbarSelected.addClass('d-none');
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
    })
}
    