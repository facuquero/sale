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
    <?php require_once '../template/sections/head.php'; ?>
</head>

<body>
    <?php require_once '../template/sections/navbar.php'; ?>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Product</th>
                <th scope="col">modelo</th>
                <th scope="col">color</th>
                <th scope="col">capacidad</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($_SESSION['Products']::getProducts() as $product): ?>
            <tr>
                <th scope="row">
                    <?= $product['id'] ?>
                </th>
                <td>
                    <?= $product['nombre'] ?>
                </td>
                <td>
                    <?= $product['modelo'] ?>
                </td>
                <td>
                    <?= $product['color'] ?>
                </td>
                <td>
                    <?= $product['capacidad'] . 'gb' ?>
                </td>
            </tr>
            <?php endforeach; ?>

        </tbody>
    </table>


    <?php require_once '../template/sections/footer.php'; ?>

</body>

</html>