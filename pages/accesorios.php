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
    <!-- bootstrap 4.6 css -->
    <?php require_once '../template/sections/head.php'; ?>
</head>

<body>
    <?php require_once '../template/sections/navbar.php'; ?>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Crear accesorio
    </button>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Crear accesorio</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">


                    <form method="POST">
                        <div class="row mb-3">
                            <label for="accesorio_tipo" class="col-sm-2 col-form-label">Tipo</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="accesorio_tipo" id="accesorio_tipo">
                            </div>
                            <label for="accesorio_modelos" class="col-sm-2 col-form-label">Modelos</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="accesorio_modelos" id="accesorio_modelos">
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
                <th scope="col">Tipo</th>
                <th scope="col">Modelos</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <?php if(!empty($_SESSION['Accesorios']::getAccesorios())) : ?> 
        <?php foreach ($_SESSION['Accesorios']::getAccesorios() as $accesorio) : ?>
                <!-- Offcanvas -->
                <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvas_<?= $accesorio['id'] ?>" aria-labelledby="offcanvasExampleLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasExampleLabel">Editar accesorio</h5>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <form method="POST">
                            <div class="mb-3">
                                <input type="hidden" name="accesorio_update_id" value="<?= $accesorio['id'] ?>">

                                <label for="exampleInputEmail1" class="form-label">Tipo</label>
                                <input type="text" class="form-control" name="accesorio_update_tipo" value="<?= $accesorio['tipo'] ?>">

                                <label for="exampleInputEmail1" class="form-label">Modelos</label>
                                <input type="text" class="form-control" name="accesorio_update_modelos" value="<?= $accesorio['modelos'] ?>">
                            </div>

                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </form>
                    </div>
                </div>
                <tr>
                    <th scope="row"><?= $accesorio['id'] ?></th>
                    <td><?= $accesorio['tipo'] ?></td>
                    <td><?= $accesorio['modelos'] ?></td>
                    <td style="gap: 20px; align-items: center;">
                        <a data-bs-toggle="offcanvas" href="#offcanvas_<?= $accesorio['id'] ?>" role="button" aria-controls="offcanvas_<?= $accesorio['id'] ?>">
                            <i  data-bs-toggle="tooltip" data-bs-placement="top" title="Actualizar" class="fa fa-pencil-square-o"></i>
                        </a>
                        <a href = # onclick="delete_accesorio(<?= $accesorio['id'] ?>)" style="border: none; background: transparent;">
                            <i data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar"  class="fa fa-trash"> </i></a>
                    </td>
                </tr>
            <?php endforeach; ?>

    </table>
    <?php endif; ?>


    <?php require_once '../template/sections/footer.php'; ?>
</body>

</html>