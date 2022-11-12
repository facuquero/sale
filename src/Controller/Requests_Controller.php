<?php


function Requests_Controller()
{   

    # Clients
    Request::getLocal('client_name', function(){ 
        Clients::addClients(); 
    });
    Request::getLocal('client_update', function(){ 
        Clients::updateClient(); 
    });
    Request::getLocal('id_client_delete', function(){ 
        Clients::deleteClient(); 
    });
    
    
 
    Helper::all_unset($_POST);
    Helper::all_unset($_GET);
}