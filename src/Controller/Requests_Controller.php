<?php


function Requests_Controller()
{   

    # Clients
    Request::getLocal('client_name', function(){ 
        Clients::addClients(); 
    });
    
    
 
    Helper::all_unset($_POST);
    Helper::all_unset($_GET);
}