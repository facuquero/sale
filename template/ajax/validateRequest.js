
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