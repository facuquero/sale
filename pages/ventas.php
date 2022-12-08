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

    <?php require_once '../template/components/ventas/tabla_ventas_plan_canje.php'; ?>
    <?php require_once '../template/components/ventas/tabla_ventas_accesorios.php'; ?>

    <?php require_once '../template/sections/footer.php'; ?>
    <script src="../template/assets/js/pages/ventas.js"></script>
</body>


</html>