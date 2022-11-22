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
        </tr>
    </thead>
    <tbody>
        <?php foreach(Productos::getStock() as $telefono): ?>
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
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>