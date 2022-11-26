<table class="table">
    <thead>
        <tr>
            <th scope="col">imei</th>
            <th scope="col">modelo</th>
            <th scope="col">color</th>
            <th scope="col">capacidad</th>
            <th scope="col">bateria</th>
            <th scope="col">mayorista</th>
            <th scope="col">costo</th>
            <th scope="col">fecha ingreso</th>
            <th scope="col">precio lista</th>
            <th scope="col">precio venta</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach (Productos::getStock() as $telefono) : ?>
            <tr>
                <td scope="col"><?= $telefono['imei'] ?></td>
                <td scope="col"><?= $telefono['modelo'] ?></td>
                <td scope="col"><?= $telefono['color'] ?></td>
                <td scope="col"><?= $telefono['capacidad'] ?></td>
                <td scope="col"><?= $telefono['bateria'] ?></td>
                <td scope="col"><?= $telefono['precio_mayorista'] ?></td>
                <td scope="col"><?= $telefono['costo'] ?></td>
                <td scope="col"><?= $telefono['fecha_ingreso'] ?></td>
                <td scope="col"><?= $telefono['precio_lista'] ?></td>
                <td scope="col"><?= $telefono['precio_venta'] ?></td>
                <td>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#vender_cosa_<?= $telefono['imei'] ?>">
                        vender
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="vender_cosa_<?= $telefono['imei'] ?>" tabindex="-1" aria-labelledby="vender_cosa_<?= $telefono['imei'] ?>Label" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="vender_cosa_<?= $telefono['imei'] ?>Label">Vender <?= $telefono['modelo'] ?></h5>
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
                                        <div class="step1_venta" style="display: block;">
                                            <H3>Plan canje?</H3>
                                            <a href="#" class="boton_de_siguiente_en_venta_plan_canje_si">Si</a>
                                            <a href="#" class="boton_de_siguiente_en_venta_plan_canje_no">No</a>
                                        </div>





                                        <div class="step2_venta" style="display: none;">
                                            eso tilin
                                        </div>




                                        

                                        <div class="step3_venta" style="display: none;">
                                            <div class="mb-3">
                                                <label for="imei" class="form-label">Imei telefono a vender</label>
                                                <input disabled id="imei_telefono_vender" type="text" name="telefono" placeholder="IMEI" autocomplete="OFF" value="<?= $telefono['imei'] ?>">
                                            </div>
                                            <div class="mb-3">
                                                <select class="form-select" aria-label="Default select example">
                                                    <option selected>Seleccione el cliente</option>
                                                    <?php foreach (Clientes::getClients() as $cliente) : ?>
                                                        <option value="<?= $cliente['id'] ?>"><?= $cliente['name'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="precio_venta" class="form-label">Precio de venta</label>
                                                <input type="number" step="0.01" class="form-control" id="precio_venta" name="precio_venta" value="<?= $telefono['precio_venta'] ?>">
                                            </div>

                                            <div class="mb-3">
                                                <label for="precio_venta" class="form-label">Pago en efectivo</label>
                                                <input type="number" step="0.01" class="form-control" id="precio_venta" name="precio_venta" value="">
                                            </div>

                                            <div class="mb-3">
                                                <label for="precio_venta" class="form-label">Pago en cuenta corriente</label>
                                                <input type="number" step="0.01" class="form-control" id="precio_venta" name="precio_venta" value="">
                                            </div>

                                            <input type="submit" value="Cargar">
                                        </div>
                                        
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>