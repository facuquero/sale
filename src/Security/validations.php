<?php

function verify_login(){
    if((isset($_REQUEST['login_email']) && isset($_REQUEST['login_password']))){
        
        require('./config/config_local.php');
        $data = false;
        $email = $_REQUEST['login_email'];
        $RES = mysqli_query($_SESSION['connection'], "SELECT id, uid FROM users WHERE email = '$email'");
        $data = $RES->fetch_array(MYSQLI_ASSOC);
        if(!$data){
            $response = [
                'ok' => false,
                'message' => 'User not found'
            ];
            echo json_encode($response); die;
        }
        
        if($data['uid'] == md5($_REQUEST['login_password']) ){
            
            $_SESSION['id'] = $data['id'];
            
            header("Location: pages/productos.php");
        }else{
        
        }

    }
}