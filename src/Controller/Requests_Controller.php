<?php


function Requests_Controller()
{   

    # Expenses
    // Request::getLocal('getProducts', function(){ 
    //     Products::getProducts(); 
    // });
    
 
    Helper::all_unset($_POST);
    Helper::all_unset($_GET);
}