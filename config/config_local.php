<?php
/*======================================================
|   [Zona horaria]
|   Definimos zona horaria ARGENTINA
======================================================*/
date_default_timezone_set('America/Argentina/Buenos_Aires');

/*======================================================
|   [Connect SQL]
======================================================*/   
$connection = new mysqli('localhost', 'root', '', 'project_sale');
$_SESSION['connection'] = $connection;
if($connection->connect_error){
     // var_dump ($connection); die;
    echo '<center>Hay un problema en el servidor. Contacta con un administrador, gracias.</center>';
    die();
}

?>