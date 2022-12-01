<?php
require('../config/core.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock</title>
    <!-- bootstrap 4.6 css -->
    <?php require_once '../template/sections/head.php'; ?>
    <link rel="stylesheet" href="../template/assets/css/pages/stock.css">

</head>

<body>
    <?php
    # Nav
    require_once '../template/sections/navbar.php';


    require_once '../template/components/stock_telefonos/btn_carga_stock.php';
    $var_products = Productos::getStock();
    ?>
    <div id='content_stock_table'>
        <?php require_once '../template/components/stock_telefonos/tabla_productos.php'; ?>
    </div>

    <?php
    # Footer
    require_once '../template/sections/footer.php';
    ?>
   
    <script src="../template/assets/js/pages/stock.js"></script>
</body>

</html>