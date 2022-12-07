<?php
class Accesorios
{

    function __construct()
    {
        // return getProducts();
    }
    public static function venderAccesorio():? array
    {
        try {
            $accesorio = DB::get(['*'] ,'stock_accesorios', ['id' =>  $_REQUEST['accesorio_venta_id']])[0];
            $id_accesorio_stock = $accesorio['id_accesorio'];
            $id = $_REQUEST['accesorio_venta_id'];
            $costo = $accesorio['costo'];
            $vendido = 1;
            $precio_venta = $_REQUEST['venta_precio_accesorio'];
            $fecha_venta = date('Y-m-d H:i:s');
            
            $update_status = DB::update('stock_accesorios', [
                'id_accesorio' => $id_accesorio_stock,
                'costo' => $costo,
                'vendido' => $vendido,
                'precio_venta' => $precio_venta,
                'fecha_venta' => $fecha_venta
            ], [
                'id' => $id
            ]);
            $insert_status= DB::insert('ventas_accesorios', [
                'id_accesorio_stock_vendido' => $_REQUEST['accesorio_venta_id'],
                'id_vendedor' => '1',
                'valor_cobrado' => $precio_venta
            ]);

            return is_bool($insert_status) ? $insert_status = [] : $insert_status;
        } catch (Exception $e) {
            Logger::error('Proveedor', 'Error in add_accesorio ->' . $e->getMessage());
        }
    }
    public static function getAccesorios():? array
    {
        try {
            $Proveedor = DB::get(['*'] ,'accesorios');
            return is_bool($Proveedor) ? $Proveedor = [] : $Proveedor;
        } catch (Exception $e) {
            Logger::error('Proveedor', 'Error in add_accesorio ->' . $e->getMessage());
        }
    }

    public static function addAccesorio()
    {
        try {
            $tipo = $_REQUEST['accesorio_tipo'];
            $modelos = $_REQUEST['accesorio_modelos'];

            DB::insert('accesorios', [
                'tipo' => $tipo,
                'modelos' => $modelos,
            ]);

            $_SESSION['notifications'] = Helper::success('Accesorio agregado');
        } catch (Exception $e) {
            Logger::error('Accesorio', 'Error in add accesorio ->' . $e->getMessage());
        }
    }

    public static function getStockAccesorios():? array
    {
        try {
            $TelefonosStock = DB::get(['*'] ,'stock_accesorios', ['vendido' => 0]);
            if($TelefonosStock){
            foreach ($TelefonosStock as &$stock) {
                $producto = DB::get(['*'] ,'accesorios', ['id' => $stock['id_accesorio']])[0];
                $stock['tipo'] = $producto['tipo'];
                $stock['modelo'] = $producto['modelos'];
            }
        }
            return is_bool($TelefonosStock) ? $TelefonosStock = [] : $TelefonosStock;
        } catch (Exception $e) {
            Logger::error('Products', 'Error in add_product ->' . $e->getMessage());
        }
    }

    public static function addStockAccesorio()
    {
        try {
            [   // data environments
                'precio_venta_accesorio' => $precio_venta,
                'costo_accesorio' => $costo,
                'accesorio' => $telefono,
            ] = $_REQUEST;
            $id_telefono = explode(':', $telefono)[1];            

            $statusInsert = DB::insert('stock_accesorios', [
                'id_accesorio ' => $id_telefono,
                'precio_venta' => $precio_venta,
                'costo' => $costo
            ]);

            if($statusInsert){
                $_SESSION['notifications'] = Helper::success('Stock agregado');
            }else{
                $_SESSION['notifications'] = Helper::error('Hubo un error, quejate con Quero');
            }

        } catch (Exception $e) {
            Logger::error('Clients', 'Error in add client ->' . $e->getMessage());
        }
    }

    public static function updateAccesorio()
    {
        try {
            $id = $_REQUEST['accesorio_update_id'];
            $tipo = $_REQUEST['accesorio_update_tipo'];
            $modelos = $_REQUEST['accesorio_update_modelos'];


            $update_status = DB::update('accesorios', [
                'tipo' => $tipo,
                'modelos' => $modelos,
            ], [
                'id' => $id
            ]);

            if ($update_status) {
                $_SESSION['notifications'] = Helper::success('Accesorio actualizado');
            } else {
                $_SESSION['notifications'] = Helper::error('Error el accesorio no se pudo actualizar');
            }
        } catch (Exception $e) {
            Logger::error('Clients', 'Error in add client ->' . $e->getMessage());
        }
    } 

    public static function deleteAccesorio()
    {
        try {
            $id = $_REQUEST['id_accesorio_delete'];
            $status_delete = DB::deleteById('accesorios', $id);
            if ($status_delete) {
                $_SESSION['notifications'] = Helper::success('Accesorio eliminado');
                Response::json([
                    'status' => true,
                    'message' => 'Product delete'
                ]);
            } else {
                $_SESSION['notifications'] = Helper::error('Error al tratar de eliminar el accesorio');
                Response::json([
                    'status' => false
                ]);
            }
        } catch (Exception $e) {
            Logger::error('Accesorio', 'Error in deleteProduct ->' . $e->getMessage());
        }
    }
}