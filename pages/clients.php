<?php
require('../config/core.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doc</title>
    <?php require_once '../template/sections/head.php'; ?>

</head>

<body>
<?php require_once '../template/sections/navbar.php'; ?>
            <!-- <button type="button" class="btn btn-primary" style="align-items: right;">Crear nuevo cliente</button> -->



            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Crear cliente
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Crear cliente</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">


                            <form>
                                <div class="row mb-3">
                                    <label for="client_name" class="col-sm-2 col-form-label">Nombre</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="client_name" id="client_name">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">guardar</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>



            <script>
                Swal.mixin({
                    confirmButtonText: 'Siguiente →',
                    cancelButtonText: 'omitir',
                    showCancelButton: true,
                    progressSteps: ['1', '2', '3']
                }).queue([{
                        title: 'Modulo de gestión de clientes',
                        html: `<p style="text-align: left; padding: 0 7px; font-weight: 400; font-size: 15px;">Hola!😁 <br> Te quiero dar una breve explicación sobre este modulo que has instalado para tu negocio.</p>`
                    },
                    {
                        title: '🤔 Sobre su uso',
                        html: `<p style="text-align: left; padding: 0 7px; font-weight: 400; font-size: 15px;">Este modulo fue pensado para poder tener los datos de nuestros clientes a mano, poder enviarles de manera rapida un mensaje por whatsapp, saber su correo, instagram, hasta incluso poder dejar una anotación por casos como "Este cliente es moroso" ó "Tiene un saldo a favor" (pequeñas notas que nos ayudan a recordar).</p>`
                    },
                    {
                        title: '😬 Sacale provecho',
                        html: `<p style="text-align: left; padding: 0 7px; font-weight: 400; font-size: 15px;">
          Ahora verás que el modulo te aparece en el panel izquierdo. <br>Te invito a sacarle el máximo provecho y en caso de necesitar ayuda, te recuerdo que podes enviarnos un whatsapp con todas tus dudas 😀.</p>`
                    }
                ])
            </script>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($_SESSION['Clients']::getClients() as $client) : ?>
                        <tr>
                            <th scope="row"><?= $client['id'] ?></th>
                            <td><?= $client['name'] ?></td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
            <?php # require_once '../template/components/products/atajos.php'; ?>

            <?php require_once '../template/sections/footer.php'; ?>
</body>

</html>