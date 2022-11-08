<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark py-0" id="navMenu">
    <div class="container-fluid">
        <a class="navbar-brand mx-5" href="#">
            <img src="../template/assets/img/logo.png" style="width: 120px; margin-right: 35px;">
            Ventas
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <!--  -->
            </ul>
            <ul class="navbar-nav logoPerfil">
                <!-- Example single danger button -->
                <div class="btn-group">
                    <button type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Action
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Separated link</a></li>
                    </ul>
                </div>
                <li class="nav-item dropdown ml-3 ">
                    <a class="nav-link active dropdown-toggle logoPerfil" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="logoIMG"><img class="imagenPerfil" src="../template/assets/img/perfil.jpg"
                                alt="Logo de perfil"></div>
                    </a>

                </li>
            </ul>

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
                    <li><a href="sales.php"><i class="fa fa-handshake"></i> Ventas </a></li>
                    <li><a href="clients.php"><i class="fa fa-suitcase"></i> Clientes </a></li>
                    <li><a href="#"><i class="fa fa-truck"></i> Proovedores </a></li>
                    <li><a href="#"><i class="fa fa-exclamation-triangle"></i> Pendientes </a></li>
                    <li><a href="#"><i class="fa fa-line-chart"></i> Balance </a></li>
                    <li><a href="#"><i class="far fa-money-bill-alt"></i> Gasto </a></li>
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
                        <li class="nav-item"><a class="nav-link py-1 px-1" href="javascript:;" onclick="addVenta()"
                                role="button"> Venta</a></li>

                        <li class="nav-item"><a class="nav-link py-1 px-1" href="javascript:;" onclick="addGasto()"
                                role="button"> Gasto</a></li>

                        <li class="nav-item"><a class="nav-link py-1 px-1" href="javascript:;" onclick="addStock()"
                                role="button"> Gasto de Stock</a></li>

                        <li class="nav-item"><a class="nav-link py-1 px-1" href="javascript:;" onclick="addCliente()"
                                role="button"> Cliente</a></li>

                        <li class="nav-item"><a class="nav-link py-1 px-1" href="javascript:;" onclick="addProducto()"
                                role="button"> Producto</a></li>

                    </ul>
                </div>
            </div>
            <form class="d-flex mb-1" onsubmit="event.preventDefault()">
                <input class="form-control me-2" type="search" name="searchClienteVM" id="searchClienteVM"
                    placeholder="Buscar cliente..." autocomplete="off" aria-label="Search">
                <input type="hidden" name="idVM" id="idVM" value="<?= $_SESSION['user']->info['id'] ?>">
                <button class="btn btn-outline-success">Search</button>
                <div class="mx-5"></div>
            </form>
        </div>

        <!-- <script>
                Swal.mixin({
                    confirmButtonText: 'Siguiente →',
                    cancelButtonText: 'omitir',
                    showCancelButton: true,
                    progressSteps: ['1', '2', '3']
                }).queue([{
                        title: 'Modulo de gestión de clientes',
                        html: `<p style="text-align: left; padding: 0 7px; font-weight: 400; font-size: 15px;">Hola!😁 <br> Te quiero dar una breve explicación sobre este modulo que has instalado para tu negocio.</p>`
                    },
                    {
                        title: '🤔 Sobre su uso',
                        html: `<p style="text-align: left; padding: 0 7px; font-weight: 400; font-size: 15px;">Este modulo fue pensado para poder tener los datos de nuestros clientes a mano, poder enviarles de manera rapida un mensaje por whatsapp, saber su correo, instagram, hasta incluso poder dejar una anotación por casos como "Este cliente es moroso" ó "Tiene un saldo a favor" (pequeñas notas que nos ayudan a recordar).</p>`
                    },
                    {
                        title: '😬 Sacale provecho',
                        html: `<p style="text-align: left; padding: 0 7px; font-weight: 400; font-size: 15px;">
          Ahora verás que el modulo te aparece en el panel izquierdo. <br>Te invito a sacarle el máximo provecho y en caso de necesitar ayuda, te recuerdo que podes enviarnos un whatsapp con todas tus dudas 😀.</p>`
                    }
                ])
            </script> -->
