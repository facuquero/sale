<div class="d-flex mt-2" style="width: 100%; justify-content: space-between; align-content: center;">
    <div style="font-size: 24px; font-weight: 400;">Ventas plan canje</div>
    <form class="d-flex">
        <input class="form-control me-2" type="search" id="buscador_ventas_plan_canje" placeholder="Busca en ventas" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Buscar</button>
    </form>
</div>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Telefono</th>
            <th scope="col">Detalle</th>
            <th scope="col">Valor <br> Cobrado</th>
            <th scope="col">Pago en <br> Efectivo</th>
            <th scope="col">Pago en <br> CC</th>
        </tr>
    </thead>
    <tbody id="content_ventas_plan_canje">
        <?php  
        $Ventas_plan_canje = Ventas::getVentasPlanCanje();
        if(!empty($Ventas_plan_canje)){
            foreach($Ventas_plan_canje as $venta){
                include '../template/components/ventas/subcomponents/venta_component.php'; 
            }
        }else{
            // echo '<td> No hay ventas registradas </td> <td></td><td></td><td></td><td></td>';
            echo '<div class="alert alert-primary mt-3" role="alert">
            No hay ventas registradas aun.
          </div>';
        }
        ?>

    </tbody>
</table>