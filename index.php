<?php
try {
    session_start();
    if (isset($_SESSION['id'])) {
        header('Location: pages/products.php');
    }
    require_once 'config/config_local.php';
    require_once 'src/Class/DB.php';
    require_once 'src/Services/Response.php';
    require_once 'src/Services/Helper.php';
    require_once 'src/Entitys/User.php';
    require_once 'src/Entitys/Business.php';
    require_once 'src/Controller/NotificationsController.php';
    
    if (isset($_REQUEST['firebase_email'])) {
        require('./src/Security/validations.php');
        verify_login();
    }

} catch (Exception $e) {

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doc</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Sweet Alert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <style>
        body {
            background: var(--bs-dark);
            color: var(--bs-light);
            display: flex;
            height: 100vh;
            justify-content: center;
            align-items: center;
        }
    </style>

</head>

<body>

    <div class="" style="width: 400px;">
        <form>
            <div class="mb-3">
                <label for="email" class="form-label">Correo</label>
                <input type="email" class="form-control" id="email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Clave</label>
                <input type="password" class="form-control" id="password">
            </div>
            <button type="submit" class="btn btn-primary mt-3" style="width: 100%;">Entrar</button>
            <button style="width: 100%; padding: 10px; border-radius: 10px;" class="my-3">
                <a href="#" id="googleLogin" style="text-decoration: none;">
                    <img src="https://gesprender.com/app/template/assets/img/iconos/googleIcon.svg" alt="Google Icon" width="30px">
                    Ingresar con Google
                </a>
            </button>
        </form>
    </div>


    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>

    <script type="module" src="template/assets/js/firebase.js"></script>

</body>

</html>