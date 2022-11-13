<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark py-0" id="navMenu">
    <div class="container-fluid">
        <a class="navbar-brand mx-5" href="#">
            <img src="../template/assets/img/logo.png" style="width: 120px; margin-right: 35px;">
            Ventas
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <!--  -->
            </ul>
            <ul class="navbar-nav logoPerfil">
                <li class="nav-item dropdown ml-3 ">
                    <a class="nav-link active dropdown-toggle logoPerfil" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="logoIMG"><img class="imagenPerfil" src="../template/assets/img/perfil.jpg" alt="Logo de perfil"></div>
                    </a>
                    <ul class="dropdown-menu" style="left: -150%;">
                        <!-- <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li> -->
                        <li><a class="dropdown-item" href="?salir=1">Salir</a></li>
                    </ul>
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
                    <li><a href="productos.php"><i class="fas fa-desktop"></i> Escritorio</a></li>
                    <li><a href="#"><i class="fa fa-handshake"></i> Ventas </a></li>
                    <li><a href="clientes.php"><i class="fa fa-suitcase"></i> Clientes </a></li>
                    <li><a href="proveedores.php"><i class="fa fa-truck"></i> Proovedores </a></li>
                    <li><a href="#"><i class="fa fa-exclamation-triangle"></i> Pendientes </a></li>
                    <li><a href="#"><i class="fa fa-line-chart"></i> Balance </a></li>
                    <li><a href="gastos.php"><i class="far fa-money-bill-alt"></i> Gastos </a></li>
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