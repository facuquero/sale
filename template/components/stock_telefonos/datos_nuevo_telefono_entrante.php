<div class="mb-3">

    <input require list='select_cliente' class="b-1 bg-fff" name="plan_canje_nuevo_telefono_cliente" placeholder="Cliente" autocomplete="OFF" style="width: 100%;">
    <datalist id="select_cliente">
        <?php foreach (Clientes::getClients() as $cliente) : ?>
            <option value="<?= $cliente['name'] ?> | ID: <?= $cliente['id'] ?>"></option>
        <?php endforeach; ?>
    </datalist>
</div>
<label for="precio_venta" class="form-label">Precio de venta</label>
<div class="input-group mb-3">
    <span class="input-group-text">$</span>
    <input require type="text" class="form-control bg-fff" name="plan_canje_nuevo_telefono_precio_venta" value="<?= $telefono['precio_venta'] ?>">
</div>

<label for="plan_canje_nuevo_telefono_pago_en_efectivo" class="form-label">Pago en efectivo</label>
<div class="input-group mb-3">
    <span class="input-group-text">$</span>
    <input require type="text" class="form-control bg-fff" name="plan_canje_nuevo_telefono_pago_en_efectivo">
</div>

<label for="plan_canje_nuevo_telefono_pago_cc" class="form-label">Pago en cuenta corriente</label>
<div class="input-group mb-3">
    <span class="input-group-text">$</span>
    <input require type="text" class="form-control bg-fff" name="plan_canje_nuevo_telefono_pago_cc">
</div>

<div class="mb-3 d-flex">
    <div class="form-floating" style="width: 100%;">
        <textarea class="form-control" name="plan_canje_nuevo_telefono_detalle" placeholder="Deja un comentario" id="floatingTextarea2" style="height: 100px"></textarea>
        <label for="floatingTextarea2">Detalle</label>
    </div>
</div>