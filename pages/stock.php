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
        Cargar Stock telefono
    </button>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cargar stock telefono</h5>
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

                        <input list='select_phone' name="telefono" placeholder="Seleccione Telefono" autocomplete="OFF">

                        <datalist id="select_phone">
                            <?php foreach (Productos::getTelefonos() as $telefono) : ?>
                                <option value="<?= $telefono['modelo'] . " " . $telefono['color'] . " - " . $telefono['capacidad'] . "GB |" . $telefono['id']  ?>"></option>
                            <?php endforeach; ?>
                        </datalist>
                        <div class="d-flex mt-3" style="gap: 20px">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="productoSellado" id="flexRadioDefault1" value="1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Sellado
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="productoSellado" id="flexRadioDefault2" value="0" checked>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Usado
                                </label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="imei" class="form-label">Imei</label>
                            <input type="text" class="form-control" id="imei" name="imei">
                        </div>
                        <div class="mb-3">
                            <label for="precio_lista" class="form-label">Precio de lista</label>
                            <input type="number" step="0.01" class="form-control" id="precio_lista" name="precio_lista">
                        </div>
                        <div class="mb-3">
                            <label for="precio_mayorista" class="form-label">Precio mayorista</label>
                            <input type="number" step="0.01" class="form-control" id="precio_mayorista" name="precio_mayorista">
                        </div>
                        <div class="mb-3">
                            <label for="precio_venta" class="form-label">Precio de venta</label>
                            <input type="number" step="0.01" class="form-control" id="precio_venta" name="precio_venta">
                        </div>
                        <div class="mb-3">
                            <label for="costo" class="form-label">Costo</label>
                            <input type="number" step="0.01" class="form-control" id="costo" name="costo">
                        </div>
                        <div class="mb-3">
                            <label for="fecha_ingreso" class="form-label">Fecha de ingreso</label>
                            <input type="date" class="form-control" id="fecha_ingreso" name="fecha_ingreso">
                        </div>
                        <div class="mb-3">
                            <label for="bateria" class="form-label">Bateria</label>
                            <input type="number" step="0.1" min="0" max="100" class="form-control" id="bateria" name="bateria">
                        </div>

                        <input type="hidden" name="carga_stock_celular" value="1">
                        <input type="hidden" name="plan_canje" value="0">
                        <input type="submit" value="Cargar">
                    </form>

                </div>
            </div>
        </div>
    </div>
    <?php require_once '../template/components/stock_telefonos/tabla_productos.php'; ?>


    <?php require_once '../template/sections/footer.php'; ?>
</body>

<script>
 
    $('.boton_de_siguiente_en_venta_plan_canje_si').click(() => {
        $('.step1_venta').css('display', 'none');
        $('.step2_venta').css('display', 'block');
    })
    $('.boton_de_siguiente_en_venta_plan_canje_no').click(() => {
        $('.step1_venta').css('display', 'none');
        $('.step3_venta').css('display', 'block');
    })
</script>

</html>