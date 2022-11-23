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


                    <form method="POST">
                        <div class="row mb-3">
                            <label for="client_name" class="col-sm-2 col-form-label">Nombre:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="client_name" id="client_name">
                            </div>

                            <label for="client_telefono" class="col-sm-2 col-form-label">Telefono:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="client_telefono" id="client_telefono">
                            </div>

                            <label for="client_ciudad" class="col-sm-2 col-form-label">Ciudad:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="client_ciudad" id="client_ciudad">
                            </div>

                            <label for="client_n_comisionista" class="col col-form-label">N° Comisionista:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="client_n_comisionista" id="client_n_comisionista">
                            </div>

                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>

                </div>
            </div>
        </div>
    </div>


    <table class="table caption-top">
        <caption> Por pagar </caption>
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Concepto</th>
                <th scope="col">Monto</th>
                <th scope="col">Por pagar</th>
                <th scope="col">Proveedor</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php if(!empty($_SESSION['Pendiente']::getPendienteDePago())) : ?> 
            <?php foreach ($_SESSION['Pendiente']::getPendienteDePago() as $pendiente) : ?>
                <!-- Offcanvas -->
                <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvas_<?= $pendiente['id'] ?>" aria-labelledby="offcanvasExampleLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasExampleLabel">Editar pendientee</h5>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <form method="POST">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Nombre:</label>
                                <input type="text" class="form-control" name="pendiente_update" value="<?= $pendiente['name'] ?>">
                                <input type="hidden" name="pendiente_id" value="<?= $pendiente['id'] ?>">

                                <label for="exampleInputEmail1" class="form-label">Telefono:</label>
                                <input type="text" class="form-control" name="pendiente_update_telefono" value="<?= $pendiente['telefono'] ?>">

                                <label for="exampleInputEmail1" class="form-label">Ciudad:</label>
                                <input type="text" class="form-control" name="pendiente_update_ciudad" value="<?= $pendiente['ciudad'] ?>">

                                <label for="exampleInputEmail1" class="form-label">N° Comisionista:</label>
                                <input type="text" class="form-control" name="pendiente_update_n_comisionista" value="<?= $pendiente['n_comisionista'] ?>">

                            </div>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </form>
                    </div>
                </div>
                <tr>
                    <th scope="row"><?= $pendiente['id'] ?></th>
                    <td><?= $pendiente['concepto'] ?></td>
                    <td><?= $pendiente['monto']?></td>
                    <td><?= $pendiente['por_pagar_a_proveedores']?></td>
                    <td><?= $pendiente['proveedor']?></td>
                    <td>
                        <a data-bs-toggle="offcanvas" href="#offcanvas_<?= $client['id'] ?>" role="button" aria-controls="offcanvas_<?= $client['id'] ?>">
                        <i data-bs-toggle="tooltip" data-bs-placement="top" title="Actualizar" class="fa fa-pencil-square-o"></i>
                        </a>
                        <a href = # onclick="delete_client(<?= $client['id'] ?>)" style="border: none; background: transparent;">
                        <i data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar" class="fa fa-trash" > </i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>


    <?php # require_once '../template/components/products/atajos.php'; 
    ?>

    <?php require_once '../template/sections/footer.php'; ?>
</body>

</html>