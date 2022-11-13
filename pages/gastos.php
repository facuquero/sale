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
        Nuevo gasto fijo
    </button>

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalVariable">
        Nuevo gasto variable
    </button>
    <!-- Modal 1 -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Crear gasto fijo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST">
                        <div class="row mb-3">
                            <label for="gasto_fijo_concepto" class="col-sm-5 col-form-label">Concepto</label>
                            <div class="col-sm-7">
                                <select name="gasto_fijo_concepto" id= "gasto_fijo_concepto" class="form-select" aria-label="Default select example" value="<?= $gastoVariable['concepto'] ?>">
                                        <option selected value=""> Seleccione una opción </option>
                                        <option value="Seguro">Seguro</option>
                                        <option value="Mutual">Mutual</option>
                                        <option value="Alquiler departamento">Alquiler departamento</option>
                                        <option value="Expensas departamento">Expensas departamento</option>
                                        <option value="Agua departamento">Agua departamento</option>
                                        <option value="Wi fi departamento">Wi fi departamento</option>
                                        <option value="Luz departamento">Luz departamento</option>
                                        <option value="Alquiler oficina">Alquiler oficina</option>
                                        <option value="Expensas oficina">Expensas oficina</option>
                                        <option value="Agua oficina">Agua oficina</option>
                                        <option value="Luz oficina">Luz oficina</option>
                                        <option value="Jano">Jano</option>
                                        <option value="Otro">Otro</option>
                                </select>    
                            </div>
                            <label for="gasto_fijo_monto" class="col-sm-5 col-form-label">Monto</label>
                            <div class="col-sm-7">
                                <input type="number" step="0.01" class="form-control" name="gasto_fijo_monto" id="gasto_fijo_monto">
                            </div>
                            
                            <label for="gasto_fijo_fecha_vencimiento" class="col-sm-5 col-form-label">Fecha de vencimiento</label>
                            <div class="col-sm-7">
                                <input type="date" class="form-control" name="gasto_fijo_fecha_vencimiento" id="gasto_fijo_fecha_vencimiento">
                            </div>

                            <label for="gasto_fijo_fecha_pago" class="col-sm-5 col-form-label">Fecha de pago</label>
                            <div class="col-sm-7">
                                <input type="date" class="form-control" name="gasto_fijo_fecha_pago" id="gasto_fijo_fecha_pago">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

        <!-- Modal 2 -->
        <div class="modal fade" id="exampleModalVariable" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Crear gasto variable</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST">
                        <div class="row mb-3">
                            <label for="gasto_variable_concepto" class="col-sm-5 col-form-label">Concepto</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="gasto_variable_concepto" id="gasto_variable_concepto">
                            </div>
                            <label for="gasto_variable_monto" class="col-sm-5 col-form-label">Monto</label>
                            <div class="col-sm-7">
                                <input type="number" step="0.01" class="form-control" name="gasto_variable_monto" id="gasto_variable_monto">
                            </div>
                            
                            <label for="gasto_variable_fecha_vencimiento" class="col-sm-5 col-form-label">Fecha de vencimiento</label>
                            <div class="col-sm-7">
                                <input type="date" class="form-control" name="gasto_variable_fecha_vencimiento" id="gasto_variable_fecha_vencimiento">
                            </div>

                            <label for="gasto_variable_fecha_pago" class="col-sm-5 col-form-label">Fecha de pago</label>
                            <div class="col-sm-7">
                                <input type="date" class="form-control" name="gasto_variable_fecha_pago" id="gasto_variable_fecha_pago">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    
    <table class="table caption-top">
        <caption> <b> Gastos Fijos </b></caption>   
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Concepto</th>
                <th scope="col">Monto</th>
                <th scope="col">Fecha de vencimiento</th>
                <th scope="col">Fecha de pago</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        
        <?php foreach ($_SESSION['Gastos']::getGastosFijos() as $gastoFijo) : ?>
                <!-- Offcanvas -->
                <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvas_<?= $gastoFijo['id'] ?>" aria-labelledby="offcanvasExampleLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasExampleLabel">Editar gasto fijo</h5>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <form method="POST">
                            <div class="mb-3">
                                <input type="hidden" name="gasto_fijo_update_id" value="<?= $gastoFijo['id'] ?>">

                                <label for="exampleInputEmail1" class="form-label">Concepto</label>
                                <input type="text" class="form-control" name="gasto_fijo_update_concepto" value="<?= $gastoFijo['concepto'] ?>">

                                <label for="exampleInputEmail1" class="form-label">Monto</label>
                                <input type="number" step="0.01" class="form-control" name="gasto_fijo_update_monto" value="<?= $gastoFijo['monto'] ?>">

                                <label for="exampleInputEmail1" class="form-label">Fecha de vencimiento</label>
                                <input type="date" class="form-control" name="gasto_fijo_update_fecha_vencimiento" value="<?=date('Y-m-d', strtotime($gastoFijo['fecha_vencimiento'])) ?>">

                                <label for="exampleInputEmail1" class="form-label">Fecha de pago</label>
                                <input type="date" class="form-control" name="gasto_fijo_update_fecha_pago" value="<?= $gastoFijo['fecha_pago'] ?>">
                            </div>

                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </form>
                    </div>
                </div>

                <tr>
                    <th scope="row"><?= $gastoFijo['id'] ?></th>
                    <td><?= $gastoFijo['concepto'] ?></td>
                    <td><?= $gastoFijo['monto'] ?></td>
                    <td><?=  date('d-m-Y', strtotime($gastoFijo['fecha_vencimiento'])) ?></td>
                    <?php if ($gastoFijo['fecha_pago'] != '0000-00-00 00:00:00'):?>
                        <td><?= date('d-m-Y', strtotime($gastoFijo['fecha_pago'])) ?></td>
                    <?php else: ?>
                               <td> Pendiente</td>
                     <?php endif; ?>
                    <td style="display: flex; gap: 20px; align-items: center;">
                        <a data-bs-toggle="offcanvas" href="#offcanvas_<?= $gastoFijo['id'] ?>" role="button" aria-controls="offcanvas_<?= $gastoFijo['id'] ?>">
                            <i class="fa fa-pencil-square"></i>
                        </a>
                        <i class="fa fa-check-square" aria-hidden="true"></i>
                        <a onclick="delete_gasto_fijo(<?= $gastoFijo['id'] ?>)" style="border: none; background: transparent;">
                            <i class="fa fa-trash" style="font-size: 14px;"> </i></a>
                    </td>
                </tr>
            <?php endforeach; ?>

    </table>
    <table class="table caption-top">
        <caption> <b> Gastos Variables </b></caption>   
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Concepto</th>
                <th scope="col">Monto</th>
                <th scope="col">Fecha de vencimiento</th>
                <th scope="col">Fecha de pago</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        
        <?php foreach ($_SESSION['Gastos']::getGastosVariables() as $gastoVariable) : ?>
              <!-- Offcanvas -->
              <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasvariable_<?= $gastoVariable['id'] ?>" aria-labelledby="offcanvasExampleLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasExampleLabel">Editar gasto variable</h5>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <form method="POST">
                            <div class="mb-3">
                                <input type="hidden" name="gasto_variable_update_id" value="<?= $gastoVariable['id'] ?>">

                                <label for="concepto" class="form-label">Concepto</label>
                                <select name="gasto_variable_update_concepto" id= "concepto" class="form-select" aria-label="Default select example" value="<?= $gastoVariable['concepto'] ?>">
                                        <option selected value="<?= $gastoVariable['concepto'] ?>"> <?= $gastoVariable['concepto'] ?> </option>
                                        <option value="Variable 2">Variable 2</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                </select>

                                <label for="exampleInputEmail1" class="form-label">Monto</label>
                                <input type="number" step="0.01" class="form-control" name="gasto_variable_update_monto" value="<?= $gastoVariable['monto'] ?>">

                                <label for="exampleInputEmail1" class="form-label">Fecha de vencimiento</label>
                                <input type="date" class="form-control" name="gasto_variable_update_fecha_vencimiento" value="<?=date('Y-m-d', strtotime($gastoVariable['fecha_vencimiento'])) ?>">

                                <label for="exampleInputEmail1" class="form-label">Fecha de pago</label>
                                <input type="date" class="form-control" name="gasto_variable_update_fecha_pago" value="<?= $gastoVariable['fecha_pago'] ?>">
                            </div>

                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </form>
                    </div>
                </div>

                <tr>
                    <th scope="row"><?= $gastoVariable['id'] ?></th>
                    <td><?= $gastoVariable['concepto'] ?></td>
                    <td><?= $gastoVariable['monto'] ?></td>
                    <td><?= date('d-m-Y', strtotime($gastoVariable['fecha_vencimiento'])) ?></td>
                    <?php if ($gastoVariable['fecha_pago'] != '0000-00-00 00:00:00'):?>
                        <td><?= date('d-m-Y', strtotime($gastoVariable['fecha_pago'])) ?></td>
                    <?php else: ?>
                               <td> Pendiente</td>
                     <?php endif; ?>
                    <td style="display: flex; gap: 20px; align-items: center;">
                        <a data-bs-toggle="offcanvas" href="#offcanvasvariable_<?= $gastoVariable['id'] ?>" role="button" aria-controls="offcanvas_<?= $gastoVariable['id'] ?>">
                            <i class="fa fa-pencil-square"></i>
                        </a>
                        <a onclick="delete_gasto_variable(<?= $gastoVariable['id'] ?>)" style="border: none; background: transparent;">
                            <i class="fa fa-trash" style="font-size: 14px;"> </i></a>
                    </td>
                </tr>
            <?php endforeach; ?>

    </table>

    <?php require_once '../template/sections/footer.php'; ?>
</body>

</html>