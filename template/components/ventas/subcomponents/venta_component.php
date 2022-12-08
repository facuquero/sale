<tr>
    <td><?= $venta['telefono'] ?></td>
    <td><?= $venta['detalle'] ?></td>
    <td>$<?= number_format($venta['valor_cobrado'], 2, ',', '.') ?></td>
    <td>$<?= number_format($venta['pago_en_efectivo'], 2, ',', '.') ?></td>
    <td>$<?= number_format($venta['pago_en_CC'], 2, ',', '.') ?></td>
</tr>