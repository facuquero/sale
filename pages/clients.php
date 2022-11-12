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
                            <label for="client_name" class="col-sm-2 col-form-label">Nombre</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="client_name" id="client_name">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>

                </div>
            </div>
        </div>
    </div>


    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($_SESSION['Clients']::getClients() as $client) : ?>
                <!-- Offcanvas -->
                <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvas_<?= $client['id'] ?>" aria-labelledby="offcanvasExampleLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasExampleLabel">Offcanvas</h5>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <form method="POST">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Nombre</label>
                                <input type="text" class="form-control" name="client_update" value="<?= $client['name'] ?>">
                                <input type="hidden" name="client_id" value="<?= $client['id'] ?>">
                            </div>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </form>
                    </div>
                </div>
                <tr>
                    <th scope="row"><?= $client['id'] ?></th>
                    <td><?= $client['name'] ?></td>
                    <td style="display: flex; gap: 20px; align-items: center;">
                        <a data-bs-toggle="offcanvas" href="#offcanvas_<?= $client['id'] ?>" role="button" aria-controls="offcanvas_<?= $client['id'] ?>">
                            <i class="fa fa-pencil-square"></i>
                        </a>
                        <form method="POST">
                            <input type="hidden" name="id_client_delete" value="<?= $client['id'] ?>">
                            <a onclick="delete_client(<?= $client['id'] ?>)" style="border: none; background: transparent;">
                            <i class="fa fa-trash" style="font-size: 14px;"> </i></a>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>


    <?php # require_once '../template/components/products/atajos.php'; 
    ?>

    <?php require_once '../template/sections/footer.php'; ?>
</body>

</html>