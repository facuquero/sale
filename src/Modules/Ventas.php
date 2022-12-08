<?php


class Ventas {

    public static function getVentasPlanCanje($search = false)
    {
        try {
            if($search){
                $search = " 
                WHERE 
                    t.nombre LIKE '%$search%'
                OR  t.modelo LIKE '%$search%'
                OR  t.color LIKE '%$search%' 
                OR  vpc.detalle LIKE '%$search%'
                ";
            }
            $query = "
                SELECT 
                    vpc.*, 
                    CONCAT(t.nombre, ' ', t.modelo, ' ', t.color) AS telefono
                FROM ventas_plan_canje vpc
                INNER JOIN stock_telefonos st ON vpc.id_stock_vendido = st.id 
                INNER JOIN telefonos t ON st.product_id = t.id 
                $search
            ";
            $result = DB::query($query, 1);
            
            return $result ? $result : [];
        } catch (Exception $e) {
            return [];
        }
    }

    public static function getVentasPlanCanje_search(){
        try {
            $search = $_POST['search'];
            $result = self::getVentasPlanCanje($search);
            foreach($result as $venta){
                require '../template/components/ventas/subcomponents/venta_component.php'; 
            }
            die;
        }catch (Exception $e) {
            Response::json([], 500);
        }
    }

    public static function getVentasAccesorios($search = false)
    {
        try {
            if($search){
                $search = " 
                WHERE 
                    acc.tipo LIKE '%$search%'
                OR  acc.modelos LIKE '%$search%'
                OR  va.valor_cobrado LIKE '%$search%' 
                ";
            }
            $query = "
                SELECT 
                    va.*,
                    sa.costo AS costo,
                    sa.precio_venta AS precio_venta,
                    sa.fecha_venta AS fecha_venta ,
                    CONCAT(acc.tipo, ' ', acc.modelos) AS accesorio
                FROM ventas_accesorios va
                INNER JOIN stock_accesorios sa ON va.id_accesorio_stock_vendido = sa.id 
                INNER JOIN accesorios acc ON sa.id_accesorio = acc.id
                
                $search
            ";
            $result = DB::query($query, 1);
            
            return $result ? $result : [];
        } catch (Exception $e) {
            return [];
        }
    }

    public static function getVentasAccesorios_search(){
        try {
            $search = $_POST['search'];
            $result = self::getVentasAccesorios($search);
            foreach($result as $venta){
                require '../template/components/ventas/subcomponents/venta_accesorios_component.php'; 
            }
            die;
        }catch (Exception $e) {
            Response::json([], 500);
        }
    }
}