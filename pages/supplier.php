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
        Crear proveedor
    </button>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Crear proveedor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">


                    <form method="POST">
                        <div class="row mb-3">
                            <label for="proveedor_nombre" class="col-sm-2 col-form-label">Nombre</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="proveedor_nombre" id="proveedor_nombre">
                            </div>
                            <label for="proveedor_cc" class="col-sm-2 col-form-label">CC</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="proveedor_cc" id="proveedor_cc">
                            </div>
                            <label for="proveedor_alias" class="col-sm-2 col-form-label">Alias</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="proveedor_alias" id="proveedor_alias">
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
                <th scope="col">CC</th>
                <th scope="col">Alias</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <?php if(!empty($_SESSION['Proveedor']::getProveedores())) : ?> 
        <?php foreach ($_SESSION['Proveedor']::getProveedores() as $proveedor) : ?>
                <!-- Offcanvas -->
                <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvas_<?= $proveedor['id'] ?>" aria-labelledby="offcanvasExampleLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasExampleLabel">Offcanvas</h5>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <form method="POST">
                            <div class="mb-3">
                                <input type="hidden" name="proveedor_update_id" value="<?= $proveedor['id'] ?>">

                                <label for="exampleInputEmail1" class="form-label">Nombre</label>
                                <input type="text" class="form-control" name="proveedor_update_nombre" value="<?= $proveedor['nombre'] ?>">

                                <label for="exampleInputEmail1" class="form-label">CC</label>
                                <input type="text" class="form-control" name="proveedor_update_cc" value="<?= $proveedor['cc'] ?>">

                                <label for="exampleInputEmail1" class="form-label">Alias</label>
                                <input type="text" class="form-control" name="proveedor_update_alias" value="<?= $proveedor['alias'] ?>">
                            </div>

                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </form>
                    </div>
                </div>
                <tr>
                    <th scope="row"><?= $proveedor['id'] ?></th>
                    <td><?= $proveedor['nombre'] ?></td>
                    <td><?= $proveedor['cc'] ?></td>
                    <td><?= $proveedor['alias'] ?></td>
                    <td style="display: flex; gap: 20px; align-items: center;">
                        <a data-bs-toggle="offcanvas" href="#offcanvas_<?= $proveedor['id'] ?>" role="button" aria-controls="offcanvas_<?= $proveedor['id'] ?>">
                            <i class="fa fa-pencil-square"></i>
                        </a>
                        <a onclick="delete_proveedor(<?= $proveedor['id'] ?>)" style="border: none; background: transparent;">
                            <i class="fa fa-trash" style="font-size: 14px;"> </i></a>
                    </td>
                </tr>
            <?php endforeach; ?>

    </table>
    <?php endif; ?>


    <?php require_once '../template/sections/footer.php'; ?>
</body>

</html>