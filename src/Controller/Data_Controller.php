<?php


function load_data(){
    # Principal entities
    $_SESSION['Productos'] = new Productos();
    $_SESSION['Clientes'] = new Clientes();
    $_SESSION['Proveedores'] = new Proveedores();
    $_SESSION['Gastos'] = new Gastos();
    $_SESSION['Accesorios'] = new Accesorios();
    $_SESSION['Pendiente'] = new Pendientes();

}


