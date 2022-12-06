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
        Crear pendiente
    </button>



    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Crear pendiente</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

               
                    <form method="POST">
                        <div class="row mb-3">
                            <label for="pending_concepto" class="col-sm-2 col-form-label">Concepto:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="pending_concepto" id="pending_concepto">
                            </div>
                            <div style="display: flex; margin-top: 10px">
                                <div class="form-check" style="margin-right: 10px">
                                    <input class="form-check-input" type="radio" name="porPagar" id="flexRadioDefault1"
                                        value="1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Por pagar
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="porPagar" id="flexRadioDefault2"
                                        value="2" checked>
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Por cobrar
                                    </label>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="pending_monto" class="form-label">Monto: </label>
                                <input type="number" step="0.01" class="form-control" id="pending_monto"
                                    name="pending_monto">
                            </div>

                            <div class="mb-3">
                                <input list='select_cliente_pending' class="b-1 bg-fff" name="pending_cliente" placeholder="Cliente"
                                    autocomplete="OFF" style="width: 100%;">
                                <datalist id="select_cliente_pending">
                                    <?php foreach (Clientes::getClients() as $cliente) : ?>
                                    <option value="<?= $cliente['name'] ?> | ID: <?= $cliente['id'] ?>"></option>
                                    <?php endforeach; ?>
                                </datalist>
                            </div>
                            
                            <div class="mb-3">
                                <input list='select_proveedor_pending' class="b-1 bg-fff" name="pending_proveedor" placeholder="Proveedor"
                                    autocomplete="OFF" style="width: 100%;">
                                <datalist id="select_proveedor_pending">
                                    <?php foreach (Proveedores::getProveedores() as $proveedor) : ?>
                                    <option value="<?= $proveedor['nombre'] ?> | ID: <?= $proveedor['id'] ?>"></option>
                                    <?php endforeach; ?>
                                </datalist>
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
                <th scope="col col-sm-2">#</th>
                <th scope="col col-sm-2">Concepto</th>
                <th scope="col col-sm-2">Monto</th>
                <th scope="col col-sm-2">A</th>
                <th scope="col col-sm-2">Acciones</th>

                <th scope="col"> Total: <?= $_SESSION['Pendiente']::getTotalAPagar() ?> </th>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($_SESSION['Pendiente']::getPendienteDePago())) : ?>
            <?php foreach ($_SESSION['Pendiente']::getPendienteDePago() as $pendiente) : ?>
            <tr>
                <th scope="row"><?= $pendiente['id'] ?></th>
                <td><?= $pendiente['concepto'] ?></td>
                <td><?= $pendiente['monto']?></td>
                <?php  if($pendiente['from_module'] == 'gastos_fijos' || $pendiente['from_module'] == 'gastos_variables'): ?>
                <td>Gasto</td>
                <?php else: ?>
                <td><?= $pendiente['proveedor']?></td>
                <?php endif;?>
                <td>
                    <a data-bs-toggle="offcanvas" href="#offcanvas_<?= $client['id'] ?>" role="button"
                        aria-controls="offcanvas_<?= $client['id'] ?>">
                        <i data-bs-toggle="tooltip" data-bs-placement="top" title="Actualizar"
                            class="fa fa-pencil-square-o"></i>
                    </a>
                    <a href=# onclick="delete_client(<?= $client['id'] ?>)"
                        style="border: none; background: transparent;">
                        <i data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar" class="fa fa-trash">
                        </i></a>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>

    <table class="table caption-top" >
        <caption> Por cobrar </caption>
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Concepto</th>
                <th scope="col">Monto</th>
                <th scope="col">A</th>
                <th scope="col">Acciones</th>

                <th scope="col "> Total: <?= $_SESSION['Pendiente']::getTotalACobrar() ?> </th>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($_SESSION['Pendiente']::getPendienteDeCobro())) : ?>
            <?php foreach ($_SESSION['Pendiente']::getPendienteDeCobro() as $pendiente) : ?>
            <tr>
                <th scope="row"><?= $pendiente['id'] ?></th>
                <td><?= $pendiente['concepto'] ?></td>
                <td><?= $pendiente['monto']?></td>
                <?php  if($pendiente['from_module'] == 'gastos_fijos' || $pendiente['from_module'] == 'gastos_variables'): ?>
                <td>Gasto</td>
                <?php else: ?>
                <td><?= $pendiente['proveedor']?></td>
                <?php endif;?>
                <td>
                    <a data-bs-toggle="offcanvas" href="#offcanvas_<?= $client['id'] ?>" role="button"
                        aria-controls="offcanvas_<?= $client['id'] ?>">
                        <i data-bs-toggle="tooltip" data-bs-placement="top" title="Actualizar"
                            class="fa fa-pencil-square-o"></i>
                    </a>
                    <a href=# onclick="delete_client(<?= $client['id'] ?>)"
                        style="border: none; background: transparent;">
                        <i data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar" class="fa fa-trash">
                        </i></a>
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