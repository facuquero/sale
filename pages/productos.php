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
        Crear producto
    </button>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Crear producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">


                    <form method="POST">
                        <div class="row mb-3">
                            <label for="product_nombre" class="col-sm-2 col-form-label">Nombre</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="product_nombre" id="product_nombre">
                            </div>
                            <label for="product_modelo" class="col-sm-2 col-form-label">Modelo</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="product_modelo" id="product_modelo">
                            </div>
                            <label for="product_color" class="col-sm-2 col-form-label">Color</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="product_color" id="product_color">
                            </div>
                            <label for="product_capacidad" class="col-sm-2 col-form-label">Capacidad</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="product_capacidad" id="product_capacidad">
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
                <th scope="col">Product</th>
                <th scope="col">Modelo</th>
                <th scope="col">Color</th>
                <th scope="col">Capacidad</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <?php if(!empty($_SESSION['Productos']::getTelefonos())) : ?> 
        <?php foreach ($_SESSION['Productos']::getTelefonos() as $product) : ?>
            <!-- Offcanvas -->
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvas_<?= $product['id'] ?>" aria-labelledby="offcanvasExampleLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasExampleLabel">Editar producto</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <form method="POST">
                        <div class="mb-3">
                            <input type="hidden" name="product_update_id" value="<?= $product['id'] ?>">

                            <label for="exampleInputEmail1" class="form-label">Product</label>
                            <input type="text" class="form-control" name="product_update_nombre" value="<?= $product['nombre'] ?>">

                            <label for="exampleInputEmail1" class="form-label">Modelo</label>
                            <input type="text" class="form-control" name="product_update_modelo" value="<?= $product['modelo'] ?>">

                            <label for="exampleInputEmail1" class="form-label">Color</label>
                            <input type="text" class="form-control" name="product_update_color" value="<?= $product['color'] ?>">

                            <label for="exampleInputEmail1" class="form-label">Capacidad</label>
                            <input type="text" class="form-control" name="product_update_capacidad" value="<?= $product['capacidad'] ?>">
                        </div>

                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </form>
                </div>
            </div>
            <tr>
                <th scope="row"><?= $product['id'] ?></th>
                <td><?= $product['nombre'] ?></td>
                <td><?= $product['modelo'] ?></td>
                <td><?= $product['color'] ?></td>
                <td><?= $product['capacidad'] ?></td>
                <td>
                    <a data-bs-toggle="offcanvas" href="#offcanvas_<?= $product['id'] ?>" role="button" aria-controls="offcanvas_<?= $product['id'] ?>">
                        <i data-bs-toggle="tooltip" data-bs-placement="top" title="Actualizar" class="fa fa-pencil-square-o"></i>
                    </a>
                    <a href = # onclick="delete_product(<?= $product['id'] ?>)" style="border: none; background: transparent;">
                        <i data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar"  class="fa fa-trash" > </i></a>
                </td>
            </tr>
        <?php endforeach; ?>
        <?php endif; ?>
    </table>


    <?php require_once '../template/sections/footer.php'; ?>
</body>

</html>