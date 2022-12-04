<input require list='select_phone' class="bg-fff b-1" name="plan_canje_modelo_telefono" placeholder="Seleccione Telefono" autocomplete="OFF" style="width: 100%;">

<datalist id="select_phone">
    <?php foreach (Productos::getTelefonos() as $tel) : ?>
        <option value="<?= $tel['nombre'] . " " . $tel['modelo'] . " " . $tel['color'] . " - "  . " | ID: " . $tel['id']  ?>"></option>
    <?php endforeach; ?>
</datalist>
<div class="d-flex mt-3" style="gap: 20px">
    <div class="form-check">
        <input require class="form-check-input" type="radio" name="plan_canje_productoSellado" id="flexRadioDefault1" value="1">
        <label class="form-check-label" for="flexRadioDefault1">
            Sellado
        </label>
    </div>
    <div class="form-check">
        <input require class="form-check-input" type="radio" name="plan_canje_productoSellado" id="flexRadioDefault2" value="0" checked>
        <label class="form-check-label" for="flexRadioDefault2">
            Usado
        </label>
    </div>
</div>

<div class="mb-3">
    <label for="plan_canje_imei" class="form-label">Imei</label>
    <input require type="text" class="form-control bg-fff" name="plan_canje_imei">
</div>
<select class="form-select mb-3" name="plan_canje_capacidad">
    <option selected>Capacidad</option>
    <option value="64">64 GB</option>
    <option value="128">128 GB</option>
    <option value="256">256 GB</option>
    <option value="512">512 GB</option>
</select>
<div class="mb-3">
    <label for="precio_lista" class="form-label">Precio de lista</label>
    <input require type="number" step="0.01" class="form-control" id="precio_lista" name="plan_canje_precio_lista">
</div>
<div class="mb-3">
    <label for="precio_mayorista" class="form-label">Precio mayorista</label>
    <input require type="number" step="0.01" class="form-control" id="precio_mayorista" name="plan_canje_precio_mayorista">
</div>
<div class="mb-3">
    <label for="precio_venta" class="form-label">Precio de venta</label>
    <input require type="number" step="0.01" class="form-control" id="precio_venta" name="plan_canje_precio_venta">
</div>
<div class="mb-3">
    <label for="costo" class="form-label">Costo</label>
    <input require type="number" step="0.01" class="form-control" id="costo" name="plan_canje_costo">
</div>
<div class="mb-3">
    <label for="fecha_ingreso" class="form-label">Fecha de ingreso</label>
    <input require type="date" class="form-control" id="fecha_ingreso" name="plan_canje_fecha_ingreso">
</div>
<div class="mb-3">
    <label for="bateria" class="form-label">Bateria</label>
    <input require type="number" step="0.1" min="0" max="100" class="form-control" id="bateria" name="plan_canje_bateria">
</div>