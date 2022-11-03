<?php

function validate_session(){
    //  VERIFICAMOS QUE EL USUARIO ESTÉ LOGEADO
    if(empty($_SESSION['id']) || !isset($_SESSION['id'])){
        header('Location: ../index.php');
    }
}