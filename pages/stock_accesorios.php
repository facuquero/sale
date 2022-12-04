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

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Cargar Stock accesorio
    </button>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cargar stock accesorio</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <style>
                        .autocomplete {
                            /*the container must be positioned relative:*/
                            position: relative;
                            /* display: inline-block; */
                        }

                        input {
                            border: 1px solid transparent;
                            background-color: #f1f1f1;
                            padding: 10px;
                            font-size: 16px;
                        }

                        input[type=text] {
                            background-color: #f1f1f1;
                            width: 100%;
                        }

                        .autocomplete-items {
                            position: absolute;
                            border: 1px solid #d4d4d4;
                            border-bottom: none;
                            border-top: none;
                            z-index: 99;
                            /*position the autocomplete items to be the same width as the container:*/
                            top: 100%;
                            left: 0;
                            right: 0;
                        }

                        .autocomplete-items div {
                            padding: 10px;
                            cursor: pointer;
                            background-color: #fff;
                            border-bottom: 1px solid #d4d4d4;
                        }

                        .autocomplete-items div:hover {
                            /*when hovering an item:*/
                            background-color: #e9e9e9;
                        }

                        .autocomplete-active {
                            /*when navigating through the items using the arrow keys:*/
                            background-color: DodgerBlue !important;
                            color: #ffffff;
                        }
                    </style>

                    <form method="POST" autocomplete="OFF">
                        <input list='select_phone' class="bg-fff b-1" name="accesorio" placeholder="Seleccione Accesorio" autocomplete="OFF" style="width: 100%;">
                        <datalist id="select_phone">
                            <?php foreach (Accesorios::getAccesorios() as $accesorio) : ?>
                                <option value="<?= $accesorio['tipo'] . " " . $accesorio['modelos'] . " | ID: " . $accesorio['id']  ?>"></option>
                            <?php endforeach; ?>
                        </datalist>
                        <div class="mb-3">
                            <label for="costo" class="form-label">Costo</label>
                            <input type="number" step="0.01" class="form-control" id="costo_accesorio" name="costo_accesorio">
                        </div>
                        <div class="mb-3">
                            <label for="precio_venta" class="form-label">Precio de venta</label>
                            <input type="number" step="0.01" class="form-control" id="precio_venta_accesorio" name="precio_venta_accesorio">
                        </div>

                        <input type="submit" value="Cargar" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <table class="table">
    <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Tipo</th>
            <th scope="col">Modelo</th>
            <th scope="col">Costo</th>
            <th scope="col">Precio venta</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach (Accesorios::getStockAccesorios() as $telefono) : ?>
            <tr>
                <td scope="col"><?= $telefono['id'] ?></td>
                <td scope="col"><?= $telefono['tipo'] ?></td>
                <td scope="col"><?= $telefono['modelo'] ?></td>
                <td scope="col"><?= $telefono['costo'] ?></td>
                <td scope="col"><?= $telefono['precio_venta'] ?></td>
                <td>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#vender_cosa_<?= $telefono['id'] ?>">
                        vender
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="vender_cosa_<?= $telefono['imei'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="vender_cosa_<?= $telefono['imei'] ?>Label" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="vender_cosa_<?= $telefono['imei'] ?>Label">Vender <?= $telefono['modelo'] ?></h5>
                                    <button type="button" class="btn-close cerrar_modal_venta" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <div class="modal-body">
                                    <style>
                                        .autocomplete {
                                            /*the container must be positioned relative:*/
                                            position: relative;
                                            /* display: inline-block; */
                                        }

                                        input {
                                            border: 1px solid transparent;
                                            background-color: #f1f1f1;
                                            padding: 10px;
                                            font-size: 16px;
                                        }

                                        input[type=text] {
                                            background-color: #f1f1f1;
                                            width: 100%;
                                        }

                                        .autocomplete-items {
                                            position: absolute;
                                            border: 1px solid #d4d4d4;
                                            border-bottom: none;
                                            border-top: none;
                                            z-index: 99;
                                            /*position the autocomplete items to be the same width as the container:*/
                                            top: 100%;
                                            left: 0;
                                            right: 0;
                                        }

                                        .autocomplete-items div {
                                            padding: 10px;
                                            cursor: pointer;
                                            background-color: #fff;
                                            border-bottom: 1px solid #d4d4d4;
                                        }

                                        .autocomplete-items div:hover {
                                            /*when hovering an item:*/
                                            background-color: #e9e9e9;
                                        }

                                        .autocomplete-active {
                                            /*when navigating through the items using the arrow keys:*/
                                            background-color: DodgerBlue !important;
                                            color: #ffffff;
                                        }
                                    </style>


                                    <div class="step1_venta" style="display: flex;
                                                                        flex-direction: column;
                                                                        justify-content: center;
                                                                        align-items: center;
                                                                        padding: 20px;">
                                        <H3 class="mb-4">Plan canje?</H3>
                                        <div class="">
                                            <a href="#" class="boton_de_siguiente_en_venta_plan_canje_si btn btn-primary" style="width: 90px;">Si</a>
                                            <a href="#" class="boton_de_siguiente_en_venta_plan_canje_no btn btn-primary" style="width: 90px;">No</a>
                                        </div>
                                    </div>





                                    <div class="step2_venta" style="display: none;">
                                        <form action="" method="post" style="width: 100%;">
                                            <input type="hidden" name="carga_stock_celular" value="1">
                                            <input type="hidden" name="plan_canje" value="1">
                                            <div class="step1_plan_canje">
                                                <?php include '../template/components/stock_telefonos/form_carga_stock_plan_canje.php'; ?>
                                                <div class="btn_step1_plan_canje btn btn-primary">Siguiente</div>
                                            </div>
                                            <div class="step2_plan_canje" style="display: none; flex-direction: column;">
                                            <?php include '../template/components/stock_telefonos/datos_nuevo_telefono_entrante.php'; ?>
                                                <div class="btn_step2_plan_canje btn btn-primary">Volver</div>
                                            </div>
                                        </form>
                                    </div>


                                    <div class="step3_venta" style="display: none;">
                                        <form method="POST" autocomplete="OFF">
                                            <input type="hidden" name="plan_canje" value="0">
                                            <div class="mb-3">
                                                <label for="imei" class="form-label">Imei telefono a vender</label>
                                                <input disabled id="imei_telefono_vender" type="text" name="telefono" placeholder="IMEI" autocomplete="OFF" value="<?= $telefono['imei'] ?>">
                                            </div>
                                            
                                            <?php include '../template/components/stock_telefonos/datos_nuevo_telefono_entrante.php'; ?>


                                            <input type="submit" value="Cargar" class="btn btn-primary">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

    <?php require_once '../template/sections/footer.php'; ?>
</body>
</html>