<hr class="mt-4">
<div class="d-flex mt-2" style="width: 100%; justify-content: space-between; align-content: center;">
    <div style="font-size: 24px; font-weight: 400;">Ventas de accesorios</div>
    <form class="d-flex">
        <input class="form-control me-2" type="search" id="buscador_ventas_accesorios" placeholder="Busca en ventas de accesorios" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Buscar</button>
    </form>
</div>
<table class="table">
    <thead>
        <tr>
            <th scope="col">accesorio</th>
            <th scope="col">Valor cobrado</th>
            <th scope="col">fecha de venta</th>
        </tr>
    </thead>
    <tbody id="content_ventas_accesorios">
        <?php  
        $Ventas_plan_canje = Ventas::getVentasAccesorios();
        if(!empty($Ventas_plan_canje)){
            foreach($Ventas_plan_canje as $venta){
                include '../template/components/ventas/subcomponents/venta_accesorios_component.php'; 
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