<?php
class Productos
{

    function __construct()
    {
        // return getProducts();
    }

    public static function getTelefonos():? array
    {
        try {
            $Telefonos = DB::get(['*'] ,'telefonos');
            return is_bool($Telefonos) ? $Telefonos = [] : $Telefonos;
        } catch (Exception $e) {
            Logger::error('Products', 'Error in add_product ->' . $e->getMessage());
        }
    }

    public static function getStock():? array
    {
        try {
            $TelefonosStock = DB::get(['*'] ,'stock_telefonos');
            foreach ($TelefonosStock as &$stock) {
                $producto = DB::get(['*'] ,'telefonos', ['id' => $stock['product_id']])[0];
                $stock['modelo'] = $producto['modelo'];
                $stock['color'] = $producto['color'];
                $stock['capacidad'] = $producto['capacidad'].'GB';
            }


            return is_bool($TelefonosStock) ? $TelefonosStock = [] : $TelefonosStock;
        } catch (Exception $e) {
            Logger::error('Products', 'Error in add_product ->' . $e->getMessage());
        }
    }
    public static function addProducts()
    {
        try {
            $nombre = $_REQUEST['product_nombre'];
            $modelo = $_REQUEST['product_modelo'];
            $color  = $_REQUEST['product_color'];
            $capacidad = $_REQUEST['product_capacidad'];

            DB::insert('telefonos', [
                'nombre' => $nombre,
                'modelo' => $modelo,
                'color' => $color,
                'capacidad' => $capacidad
            ]);

            $_SESSION['notifications'] = Helper::success('Cliente agregado');
        } catch (Exception $e) {
            Logger::error('Clients', 'Error in add client ->' . $e->getMessage());
        }
    }

    public static function updateProduct()
    {
        try {
            $id = $_REQUEST['product_update_id'];
            $nombre = $_REQUEST['product_update_nombre'];
            $modelo = $_REQUEST['product_update_modelo'];
            $capacidad = $_REQUEST['product_update_capacidad'];
            $color = $_REQUEST['product_update_color'];
           # ddd([$_REQUEST]);
            $update_status = DB::update('telefonos', [
                'nombre' => $nombre,
                'color' => $color,
                'modelo' => $modelo,
                'capacidad' => $capacidad
            ], [
                'id' => $id
            ]);
            if ($update_status) {
                $_SESSION['notifications'] = Helper::success('Producto actualizado');
            } else {
                $_SESSION['notifications'] = Helper::error('Error el producto no se pudo actualizar');
            }
        } catch (Exception $e) {
            Logger::error('Clients', 'Error in add client ->' . $e->getMessage());
        }
    } 

    public static function deleteProduct()
    {
        try {
            $id = $_REQUEST['id_product_delete'];
            $status_delete = DB::deleteById('telefonos', $id);
            if ($status_delete) {
                $_SESSION['notifications'] = Helper::success('Producto eliminado');
                Response::json([
                    'status' => true,
                    'message' => 'Product delete'
                ]);
            } else {
                $_SESSION['notifications'] = Helper::error('Error al tratar de eliminar el producto');
                Response::json([
                    'status' => false
                ]);
            }
        } catch (Exception $e) {
            Logger::error('Products', 'Error in deleteProduct ->' . $e->getMessage());
        }
    }

    public static function addStockTelefon()
    {
        try {
            [   // data environments
                'productoSellado' => $productoSellado,
                'imei' => $imei,
                'precio_lista' => $precio_lista,
                'precio_mayorista' => $precio_mayorista,
                'precio_venta' => $precio_venta,
                'costo' => $costo,
                'fecha_ingreso' => $fecha_ingreso,
                'bateria' => $bateria,
                'plan_canje' => $plan_canje,
                'telefono' => $telefono,
            ] = $_REQUEST;
            $id_telefono = explode('|', $telefono)[1];
            

            $statusInsert = DB::insert('stock_telefonos', [
                'product_id ' => $id_telefono,
                'imei' => $imei,
                'precio_lista' => $precio_lista,
                'precio_mayorista' => $precio_mayorista,
                'bateria' => $bateria,
                'precio_venta' => $precio_venta,
                'costo' => $costo,
                'producto_sellado' => (boolean)$productoSellado,
                'plan_canje' => $plan_canje,
                'fecha_ingreso' => $fecha_ingreso
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
}