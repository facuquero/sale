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
    
    #Products
    Request::getLocal('product_nombre', function(){ 
        Products::addProducts();
    });

    Request::getLocal('product_update_id', function(){ 
        Products::updateProduct();
    });

    Helper::all_unset($_POST);
    Helper::all_unset($_GET);
}