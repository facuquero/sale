<?php


function load_data(){
    # Principal entities
    $_SESSION['Products'] = new Products();
    $_SESSION['Clients'] = new Clients();
    $_SESSION['Proveedor'] = new Proveedor();

}


