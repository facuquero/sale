<?php
# use $var_products to fill the data
if (!empty($var_products)) :

?>

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
            <?php foreach ($var_products as $telefono) : ?>
                <tr>
                    <td scope="col" style="font-size: 13px;"><code><?= $telefono['imei'] ?></code></td>
                    <td scope="col"><?= $telefono['modelo'] ?></td>
                    <td scope="col"><?= $telefono['color'] ?></td>
                    <td scope="col"><?= $telefono['capacidad'] ?> GB</td>
                    <td scope="col"><?= $telefono['bateria'] ?></td>
                    <td scope="col">$<?= $telefono['precio_mayorista'] ?></td>
                    <td scope="col">$<?= $telefono['costo'] ?></td>
                    <td scope="col"><?= explode(' ', $telefono['fecha_ingreso'])[0] ?></td>
                    <td scope="col">$<?= $telefono['precio_lista'] ?></td>
                    <td scope="col">$<?= $telefono['precio_venta'] ?></td>
                    <td>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#vender_cosa_<?= $telefono['imei'] ?>">
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




                                        <div class="step1_venta" style="display: flex; flex-direction: column; justify-content: center; align-items: center; padding: 20px;">
                                            <H3 class="mb-4">Plan canje?</H3>
                                            <div class="">
                                                <a href="#" class="boton_de_siguiente_en_venta_plan_canje_si btn btn-primary" style="width: 90px;">Si</a>
                                                <a href="#" class="boton_de_siguiente_en_venta_plan_canje_no btn btn-primary" style="width: 90px;">No</a>
                                            </div>
                                        </div>





                                        <div class="step2_venta" style="display: none;">
                                            <form action="" method="post" style="width: 100%;" autocomplete="OFF" >
                                                <input type="hidden" name="venta_plan_canje" value="1">
                                                <input name="imei_telefono_vender" type="hidden" value="<?= $telefono['imei'] ?>">
                                                <!-- <input type="hidden" name="carga_stock_celular_2" value="1"> -->
                                                <div class="step1_plan_canje">
                                                    <?php include '../template/components/stock_telefonos/form_carga_stock_plan_canje.php'; ?>
                                                    <div class="btn_step1_plan_canje btn btn-primary">Siguiente</div>
                                                </div>
                                                <div class="step2_plan_canje" style="display: none; flex-direction: column;">
                                                    <?php include '../template/components/stock_telefonos/datos_nuevo_telefono_entrante.php'; ?>
                                                    <div class="d-flex" style="gap:20px">
                                                        <div class="btn_step2_plan_canje btn btn-primary">Volver</div>
                                                        <button class="btn btn-primary" type="submit">Cargar</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>





                                        <div class="step3_venta" style="display: none;">
                                            <form method="POST" autocomplete="OFF">
                                                <input type="hidden" name="venta_plan_canje_no" value="1">
                                                <div class="mb-3">
                                                    <label for="imei" class="form-label">Imei telefono a vender</label>
                                                    <input disabled type="text"  placeholder="IMEI" value="<?= $telefono['imei'] ?>">
                                                    <input type="hidden" name="imei_telefono_vender" placeholder="IMEI" autocomplete="OFF" value="<?= $telefono['imei'] ?>">
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
<?php else : ?>
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
    </table>


<?php endif; ?>
<script>
    $('.boton_de_siguiente_en_venta_plan_canje_si').click(() => {
        $('.step1_venta').css('display', 'none');
        $('.step2_venta').css('display', 'flex');

    })
    $('.boton_de_siguiente_en_venta_plan_canje_no').click(() => {
        $('.step1_venta').css('display', 'none');
        $('.step3_venta').css('display', 'block');
    })
    $('.cerrar_modal_venta').click(() => {
        $('.step1_venta').css('display', 'flex');
        $('.step3_venta').css('display', 'none');
        $('.step2_venta').css('display', 'none');
        $('.step2_plan_canje').css('display', 'none');
        $('.step1_plan_canje').css('display', 'block');

    });
    $('.btn_step1_plan_canje').click(() => {
        $('.step1_plan_canje').css('display', 'none');
        $('.step2_plan_canje').css('display', 'flex');
    });
    $('.btn_step2_plan_canje').click(() => {
        $('.step1_plan_canje').css('display', 'block');
        $('.step2_plan_canje').css('display', 'none');
    });
</script>