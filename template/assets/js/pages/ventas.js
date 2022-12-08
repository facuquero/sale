


// Buscador
$('#buscador_ventas_plan_canje').keyup(() => {
    let search = '';
    search = $('#buscador_ventas_plan_canje').val();
    $.ajax({
        url: '',
        type: 'POST',
        data: {
            getVentasPlanCanje_search: true,
            search: search
        },
        success: function (response) {
            $('#content_ventas_plan_canje').html(response);
        }
    });
});

// Buscador de ventas de accesorios
$('#buscador_ventas_accesorios').keyup(() => {
    let search = '';
    search = $('#buscador_ventas_accesorios').val();
    $.ajax({
        url: '',
        type: 'POST',
        data: {
            getVentasAccesorios_search: true,
            search: search
        },
        success: function (response) {
            $('#content_ventas_accesorios').html(response);
        }
    });
});
