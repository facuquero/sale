
function delete_client(id_client) {
    Swal.fire({
        title: 'Estas seguro que deseas eliminar?',
        // text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, borrar.',
        cancelButtonText: 'Mejor no.'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '',
                type: 'POST',
                data: {
                    id_client_delete: id_client,
                },
                success: function (response) {
                  window.location.href = "";
                }
              });
        }
    })
}


function delete_product(id_product) {
    Swal.fire({
        title: 'Estas seguro que deseas eliminar?',
        // text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, borrar.',
        cancelButtonText: 'Mejor no.'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '',
                type: 'POST',
                data: {
                    id_product_delete: id_product,
                },
                success: function (response) {
                  window.location.href = "";
                }
              });
        }
    })
}

function delete_proveedor(id_proveedor) {
    Swal.fire({
        title: 'Estas seguro que deseas eliminar?',
        // text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, borrar.',
        cancelButtonText: 'Mejor no.'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '',
                type: 'POST',
                data: {
                    id_proveedor_delete: id_proveedor,
                },
                success: function (response) {
                  window.location.href = "";
                }
              });
        }
    })
}