<?php

require 'define.inc.php';

class Core
{

    function __construct()
    {
        session_start();
        # Incluimos todas las dependencias que ocupa la plataforma
        $this->loadIncludes();

        # Validamos session 
        validate_session();

        # Si la session dió Ok cargamos datos
        load_data();

        # Controlador de peticiones
        Requests_Controller();
    }

    private function loadIncludes()
    {
        require_once CONFIG;

        #   [Configuración general]
        #   Enlazamos todos los modulos requeridos
        include("../src/Security/session_validate.php");
        include("../src/Security/validations.php");
        include("../src/Security/Permissions.php");
        
        #   [Servicios]
        #   Cargamos todos los servicios antes que los repositorys
        require_once '../src/Services/Helper.php';
        require_once '../src/Services/Response.php';
        require_once '../src/Services/Request.php';
        
        #   [Entitys]
        #   Enlazamos todas las entidades
        require("../src/Entitys/User.php");
        require("../src/Entitys/BusinessData.php");
        require("../src/Entitys/Business.php");
        require("../src/Entitys/Adm.php");

        #   [Modules]
        #   Enlazamos tododos los modulos
        require("../src/Modules/Products.php");
        
        #   [Controllers]
        #   Enlazamos todos los controladores
        include("../src/Controller/Data_Controller.php");
        include("../src/Controller/Requests_Controller.php");
        include("../src/Controller/NotificationsController.php");

        
        #   [Class]
        #   Enlazamos todas las classes globales
        require("../src/Class/DB.php");
        require("../src/Class/Upload.php");
        require("../src/Class/Logger.php");
        // try {
        // } catch (Exception $e) {
        //     Logger::error('CORE', 'Error in loadIncludes -> ' . $e->getMessage());
        // }
    }
}

$Core = new Core();

