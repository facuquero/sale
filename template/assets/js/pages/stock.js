


// Buscador
let search = '';
$('#buscador_stock').keyup(() => {
    search = $('#buscador_stock').val();
    $.ajax({
        url: '',
        type: 'POST',
        data: {
            buscador_page_stock: true,
            search: search
        },
        success: function (response) {
            $('#content_stock_table').html(response);
        }
    });
});


