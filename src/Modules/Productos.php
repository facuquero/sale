<?php
class Productos
{

    function __construct()
    {
        // return getProducts();
    }

    public static function getTelefonos(): ?array
    {
        try {
            $Telefonos = DB::get(['*'], 'telefonos');
            return is_bool($Telefonos) ? $Telefonos = [] : $Telefonos;
        } catch (Exception $e) {
            Logger::error('Products', 'Error in add_product ->' . $e->getMessage());
        }
    }

    public static function getStock(): ?array
    {
        try {
            $TelefonosStock = DB::get(['*'], 'stock_telefonos', ['vendido' => 0]);
            if($TelefonosStock){
                foreach ($TelefonosStock as &$stock) {
                    $producto = DB::get(['*'], 'telefonos', ['id' => $stock['product_id']])[0];
                    $stock['modelo'] = $producto['modelo'];
                    $stock['color'] = $producto['color'];
                }
            }
            return is_bool($TelefonosStock) ? $TelefonosStock = [] : $TelefonosStock;
        } catch (Exception $e) {
            Logger::error('Products', 'Error in add_product ->' . $e->getMessage());
        }
    }

    public static function buscador_page_stock()
    {
        try {
            $search = $_REQUEST['search'];
            $query = "SELECT * FROM `stock_telefonos` S  
            JOIN `telefonos` T ON S.product_id = T.id 
            WHERE T.nombre 
            LIKE '%$search%' 
            OR T.modelo LIKE '%$search%'  
            OR S.imei LIKE '%$search%'
            ";
            $TelefonosStock = DB::query($query, true);
            $var_products = $TelefonosStock;
            require '../template/components/stock_telefonos/tabla_productos.php';
            die;
        } catch (Exception $e) {
            Logger::error('Products', 'Error in buscador_page_stock ->' . $e->getMessage());
        }
    }

    public static function addProducts()
    {
        try {
            $nombre = $_REQUEST['product_nombre'];
            $modelo = $_REQUEST['product_modelo'];
            $color  = $_REQUEST['product_color'];

            DB::insert('telefonos', [
                'nombre' => $nombre,
                'modelo' => $modelo,
                'color' => $color,
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
            $color = $_REQUEST['product_update_color'];
            # ddd([$_REQUEST]);
            $update_status = DB::update('telefonos', [
                'nombre' => $nombre,
                'color' => $color,
                'modelo' => $modelo,
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
            $id_telefono = explode('ID: ', $telefono);
            if(!isset($id_telefono[1])){
                $_SESSION['notifications'] = Helper::error('Hubo un dato mal cargado. Revisar nuevamente');
                return;
            }
            $id_telefono = $id_telefono[1];


            $statusInsert = DB::insert('stock_telefonos', [
                'product_id ' => $id_telefono,
                'imei' => $imei,
                'precio_lista' => $precio_lista,
                'precio_mayorista' => $precio_mayorista,
                'bateria' => $bateria,
                'precio_venta' => $precio_venta,
                'costo' => $costo,
                'producto_sellado' => (bool)$productoSellado,
                'plan_canje' => $plan_canje,
                'fecha_ingreso' => $fecha_ingreso
            ]);

            if ($statusInsert) {
                $_SESSION['notifications'] = Helper::success('Stock agregado');
            } else {
                $_SESSION['notifications'] = Helper::error('Hubo un error, quejate con Quero');
            }
        } catch (Exception $e) {
            Logger::error('Clients', 'Error in add client ->' . $e->getMessage());
        }
    }

    public static function addVentaPlanCaje()
    {
        try {
            # Agregamos el nuevo celular a stock por plan canje
            [   // data environments
                'plan_canje_modelo_telefono' => $plan_canje_modelo_telefono,
                'plan_canje_productoSellado' => $plan_canje_productoSellado,
                'plan_canje_imei' => $plan_canje_imei,
                'plan_canje_capacidad' => $plan_canje_capacidad,
                'plan_canje_precio_lista' => $plan_canje_precio_lista,
                'plan_canje_precio_mayorista' => $plan_canje_precio_mayorista,
                'plan_canje_precio_venta' => $plan_canje_precio_venta,
                'plan_canje_costo' => $plan_canje_costo,
                'plan_canje_fecha_ingreso' => $plan_canje_fecha_ingreso,
                'plan_canje_bateria' => $plan_canje_bateria,
                'plan_canje_nuevo_telefono_cliente' => $plan_canje_nuevo_telefono_cliente,
                'plan_canje_nuevo_telefono_precio_venta' => $plan_canje_nuevo_telefono_precio_venta,
                'plan_canje_nuevo_telefono_pago_en_efectivo' => $plan_canje_nuevo_telefono_pago_en_efectivo,
                'plan_canje_nuevo_telefono_pago_cc' => $plan_canje_nuevo_telefono_pago_cc,
                'plan_canje_nuevo_telefono_detalle' => $plan_canje_nuevo_telefono_detalle,
                'imei_telefono_vender' => $imei_telefono_vender
            ] = $_REQUEST;

            # Obtenemos id el modelo
            $id_telefono = explode('ID: ', $plan_canje_modelo_telefono)[1];
            
            # Insert en tabla Telefonos
            $status = DB::insert('stock_telefonos', [
                'product_id' => $id_telefono,
                'imei' => $plan_canje_imei,
                'bateria' => $plan_canje_bateria,
                'capacidad' => $plan_canje_capacidad,
                'precio_lista' => $plan_canje_precio_lista,
                'precio_mayorista' => $plan_canje_precio_mayorista,
                'precio_venta' => $plan_canje_precio_venta,
                'costo' => $plan_canje_costo,
                'producto_sellado' => $plan_canje_productoSellado,
                'plan_canje' => 1,
                'fecha_ingreso' => $plan_canje_fecha_ingreso,
                'vendido' => 0,
            ]);

            $stock_recibido = DB::query("SELECT LAST_INSERT_ID();", true);
            $id_stock_recibido = reset($stock_recibido);
            $id_stock_recibido = $id_stock_recibido['LAST_INSERT_ID()'];
            $stock_telefonos_insert = DB::findById('stock_telefonos', $id_stock_recibido);
            $id_stock_recibido = $stock_telefonos_insert['id'];
            
            if (!$status) {
                $_SESSION['notifications'] = Helper::error('Hubo un error.');
                throw new Exception('No se pudo hacer el insert::stock_telefonos');
            }
            # Objengo id del registro insertado
            $stock_telefonos_insert = DB::query("SELECT LAST_INSERT_ID();", true);
            $id = reset($stock_telefonos_insert);
            $id = $id['LAST_INSERT_ID()'];
            $stock_telefonos_insert = DB::findById('stock_telefonos', $id);
            
            if (!$stock_telefonos_insert) {
                $_SESSION['notifications'] = Helper::error('Hubo un error.');
                throw new Exception('No se pudo hacer el findById::stock_telefonos');
            }
            
            # Insert en ventas_plan_canje
            // necesitamos imei de telefono vendido para sacar sus datos.
            $telefono_vendido = DB::findBy('stock_telefonos', ['imei' => $imei_telefono_vender]);
            // id cliente
            $id_cliente = explode('ID: ', $plan_canje_nuevo_telefono_cliente)[1];
            $telefono_vendido = reset($telefono_vendido);
            $status = DB::insert('ventas_plan_canje', [
                'id_stock_vendido' => $telefono_vendido['id'],
                'id_stock_recibido' => $id_stock_recibido,
                'id_client' => $id_cliente,
                'id_vendedor' => 1,
                'valor_cobrado' => $plan_canje_nuevo_telefono_precio_venta,
                'pago_en_efectivo' => $plan_canje_nuevo_telefono_pago_en_efectivo,
                'pago_en_CC' => $plan_canje_nuevo_telefono_pago_cc,
                'detalle' => $plan_canje_nuevo_telefono_detalle
            ]);
            
            if (!$status) {
                $_SESSION['notifications'] = Helper::error('Hubo un error.');
                throw new Exception('No se pudo hacer el insert::ventas_plan_canje');
            }

            # Actualizamos stock de celular vendido
            $status = DB::query("UPDATE stock_telefonos SET fecha_venta = now(), vendido = 1 WHERE id = " .  $telefono_vendido['id']);

            $_SESSION['notifications'] = Helper::success('Stock agregado');
        } catch (Exception $e) {
            Logger::error('Products', 'Error in addVentaPlanCaje ->' . $e->getMessage());
        }
    }

    public static function addVentaPlanCajeNo()
    {
        try {
            # Agregamos el nuevo celular a stock por plan canje
            [   // data environments
                'imei_telefono_vender' => $imei_telefono_vender,
                'plan_canje_nuevo_telefono_cliente' => $plan_canje_nuevo_telefono_cliente,
                'plan_canje_nuevo_telefono_precio_venta' => $plan_canje_nuevo_telefono_precio_venta,
                'plan_canje_nuevo_telefono_pago_en_efectivo' => $plan_canje_nuevo_telefono_pago_en_efectivo,
                'plan_canje_nuevo_telefono_pago_cc' => $plan_canje_nuevo_telefono_pago_cc,
                'plan_canje_nuevo_telefono_detalle' => $plan_canje_nuevo_telefono_detalle
            ] = $_REQUEST;

            # Objetengo datos telefono a vender
            $telefono_vendido = DB::findBy('stock_telefonos', ['imei' => $imei_telefono_vender]);
            $telefono_vendido = reset($telefono_vendido);

            # Objetengo ID cliente
            $id_cliente = explode('ID: ', $plan_canje_nuevo_telefono_cliente)[1];

            # Insert de venta
            $status = DB::insert('ventas_plan_canje', [
                'id_stock_vendido' => $telefono_vendido['id'],
                'id_client' => $id_cliente,
                'id_vendedor' => 1,
                'valor_cobrado' => $plan_canje_nuevo_telefono_precio_venta,
                'pago_en_efectivo' => $plan_canje_nuevo_telefono_pago_en_efectivo,
                'pago_en_CC' => $plan_canje_nuevo_telefono_pago_cc,
                'detalle' => $plan_canje_nuevo_telefono_detalle
            ]);

            if (!$status) {
                $_SESSION['notifications'] = Helper::error('Hubo un error.');
                throw new Exception('No se pudo hacer el insert::ventas_plan_canje');
            }

            # Actualizamos stock de celular vendido
            $status = DB::query("UPDATE stock_telefonos SET fecha_venta = now(), vendido = 1 WHERE id = " .  $telefono_vendido['id']);

            $_SESSION['notifications'] = Helper::success('Stock agregado');
        } catch (Exception $e) {
            Logger::error('Products', 'Error in addVentaPlanCajeNo ->' . $e->getMessage());
        }
    }
}
