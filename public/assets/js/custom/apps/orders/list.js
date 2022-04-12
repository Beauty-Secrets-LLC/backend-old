const toolbarBase       = $('[data-kt-order-table-toolbar="base"]');
const toolbarSelected   = $('[data-kt-order-table-toolbar="selected"]');
const selectedCount     = $('[data-kt-order-table-select="selected_count"]');

$('body').on('change', '#order_table tbody [type="checkbox"]', function(){
    var selected = $('#order_table tbody [type="checkbox"]:checked').map(function(){
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