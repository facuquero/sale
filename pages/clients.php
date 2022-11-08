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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- CSS Custom -->
    <link rel="stylesheet" href="../template/assets/style.css">
</head>

<body>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark py-0" id="navMenu">
        <div class="container-fluid">
            <a class="navbar-brand mx-5" href="#">Ventas</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <!--  -->
                </ul>
                <ul class="navbar-nav logoPerfil">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Agregar</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="javascript:;" onclick="addVenta()" role="button">Agregar Venta</a></li>
                            <li><a class="dropdown-item" href="javascript:;" onclick="addGasto()" role="button">Agregar Gasto</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown ml-3 ">
                        <a class="nav-link active dropdown-toggle logoPerfil" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Cuenta
                            <div class="logoIMG"><img class="imagenPerfil" src="assets/img/perfil.jpg" alt="Logo de perfil"></div>
                        </a>
                        <ul class="dropdown-menu mt-0" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Configuracion</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Cerrar sesión</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex" onsubmit="event.preventDefault()">
                    <input class="form-control me-2" type="search" name="searchCliente" id="searchCliente" placeholder="Buscar cliente..." autocomplete="off" aria-label="Search">
                    <input type="hidden" name="id" id="id" value="1">
                    <button class="btn btn-outline-success">Search</button>
                    <div class="mx-5"></div>
                </form>
            </div>
        </div>
    </nav>

    <div class="contenedor">
        <div class="navegacion">
            <div class="c">
                <div class="">
                    <div class="logo">GESPRENDER</div>
                    <ul>
                        <li><a href="products.php"><i class="fas fa-desktop"></i> Escritorio</a></li>
                        <li><a href="sales.php"><i class="far fa-money-bill-alt"></i> Ventas </a></li>
                        <li><a href="clients.php"><i class="far fa-money-bill-alt"></i> Clientes </a></li>
                        <li><a href="#"><i class="far fa-money-bill-alt"></i> Proovedores </a></li>
                        <li><a href="#"><i class="far fa-money-bill-alt"></i> Pendientes </a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="content">
            <div id="navMenuMovil">
                <div class="card my-1 bg-dark text-white">
                    <div class="card-body py-0">
                        <nav class="navbar">
                            <!-- Boton nav menu-->
                            <div class="menu-btn ">
                                <i class="fas fa-bars fa-2x"></i>
                            </div>
                            <ul class="nav justify-content-center ">
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="#">Configuracion</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="#">Cerrar sesión</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="card mb-2">
                    <div class="card-body py-0 px-0">
                        <ul class="nav">
                            <li class="nav-item"><a class="nav-link py-1 px-1" href="javascript:;" onclick="addVenta()" role="button">+ Venta</a></li>

                            <li class="nav-item"><a class="nav-link py-1 px-1" href="javascript:;" onclick="addGasto()" role="button">+ Gasto</a></li>

                            <li class="nav-item"><a class="nav-link py-1 px-1" href="javascript:;" onclick="addStock()" role="button">+ Gasto de Stock</a></li>

                            <li class="nav-item"><a class="nav-link py-1 px-1" href="javascript:;" onclick="addCliente()" role="button">+ Cliente</a></li>

                            <li class="nav-item"><a class="nav-link py-1 px-1" href="javascript:;" onclick="addProducto()" role="button">+ Producto</a></li>

                        </ul>
                    </div>
                </div>
                <form class="d-flex mb-1" onsubmit="event.preventDefault()">
                    <input class="form-control me-2" type="search" name="searchClienteVM" id="searchClienteVM" placeholder="Buscar cliente..." autocomplete="off" aria-label="Search">
                    <input type="hidden" name="idVM" id="idVM" value="<?= $_SESSION['user']->info['id'] ?>">
                    <button class="btn btn-outline-success">Search</button>
                    <div class="mx-5"></div>
                </form>
            </div>
            <button type="button" class="btn btn-primary" style= align left>Crear nuevo cliente</button>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($_SESSION['Clients']::getClients() as $client): ?>
                    <tr>
                        <th scope="row"><?= $client['id'] ?></th>
                        <td><?= $client['name'] ?></td>
                    </tr>
                    <?php endforeach; ?>
                    
                </tbody>
            </table>



            <!-- font Awasome-->
            <script src="https://kit.fontawesome.com/fb56d1a6d2.js" crossorigin="anonymous"></script>
            <!-- JQuery -->
            <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
            <!-- Bootstrap -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
            <!-- My scripts -->
            <script src="../temassets/scripts.js"></script>
</body>

</html>