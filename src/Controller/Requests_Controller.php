<?php


function Requests_Controller()
{   

    # Clients
    Request::getLocal('client_name', function(){ 
        Clientes::addClients(); 
    });
    Request::getLocal('client_update', function(){ 
        Clientes::updateClient(); 
    });
    Request::getLocal('id_client_delete', function(){ 
        Clientes::deleteClient(); 
    });
    
    #Products
    Request::getLocal('product_nombre', function(){ 
        Productos::addProducts();
    });

    Request::getLocal('product_update_id', function(){ 
        Productos::updateProduct();
    });

    Request::getLocal('id_product_delete', function(){ 
        Productos::deleteProduct(); 
    });

        #Proveedor
    Request::getLocal('proveedor_nombre', function(){ 
        Proveedores::addProveedor();
    });

    Request::getLocal('proveedor_update_id', function(){ 
        Proveedores::updateProveedor();
    });

    Request::getLocal('id_proveedor_delete', function(){ 
        Proveedores::deleteProveedor(); 
    });
     # Gastos
    Request::getLocal('gasto_fijo_concepto', function(){
        Gastos::addGastoFijo();
    });
    Request::getLocal('gasto_variable_concepto', function(){
        Gastos::addGastoVariable();
    });

    Request::getLocal('gasto_fijo_update_id', function(){ 
        Gastos::updateGastoFijo();
    });

    Request::getLocal('gasto_variable_update_id', function(){ 
        Gastos::updateGastoVariable();
    });

    Request::getLocal('id_gasto_fijo_delete', function(){ 
        Gastos::deleteGastoFijo(); 
    });

    Request::getLocal('id_gasto_variable_delete', function(){ 
        Gastos::deleteGastoVariable(); 
    });

    Helper::all_unset($_POST);
    Helper::all_unset($_GET);
}