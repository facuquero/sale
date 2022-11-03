<?php


function Requests_Controller()
{   

    # Expenses
    Request::getLocal('getExpenses', function(){ 
        Expenses::getExpenses(); 
    });
    Request::getLocal('addExpense', function(){ 
        Expenses::addExpense(); 
    });
    Request::getLocal('editExpense', function(){ 
        Expenses::editExpense(); 
    });
    Request::getLocal('deleteExpense', function(){ 
        Expenses::deleteExpense(); 
    });
 
    Helper::all_unset($_POST);
    Helper::all_unset($_GET);
}