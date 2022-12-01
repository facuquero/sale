<div class="d-flex" style="width: 100%; justify-content: space-between; align-content: center;">
    <div class="">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Cargar Stock telefono
        </button>
    </div>
    <form class="d-flex">
        <input class="form-control me-2" type="search" id="buscador_stock" placeholder="Busca en stock" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Buscar</button>
    </form>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cargar stock telefono</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form method="POST" autocomplete="OFF">

                    <input list='select_phone' class="bg-fff b-1" name="telefono" placeholder="Seleccione Telefono" autocomplete="OFF" style="width: 100%;">
                    <datalist id="select_phone">
                        <?php foreach (Productos::getTelefonos() as $telefono) : ?>
                            <option value="<?= $telefono['nombre'] . " " . $telefono['modelo'] . " " . $telefono['color'] . " - "  . " | ID: " . $telefono['id']  ?>"></option>
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
                        <input type="text" class="form-control bg-fff" id="imei" name="imei">
                    </div>
                    <select class="form-select mb-3" aria-label="Default select example">
                        <option selected>Capacidad</option>
                        <option value="64">64 GB</option>
                        <option value="128">128 GB</option>
                        <option value="256">256 GB</option>
                        <option value="512">512 GB</option>
                    </select>
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
                    <input type="submit" value="Cargar" class="btn btn-primary">
                </form>

            </div>
        </div>
    </div>
</div>