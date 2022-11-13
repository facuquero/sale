<?php
class Products
{

    function __construct()
    {
        // return getProducts();
    }

    public static function getProducts():? array
    {
        try {
            $Products = DB::get(['*'] ,'m_products');
            return is_bool($Products) ? $Products = [] : $Products;
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

            DB::insert('m_products', [
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
            $update_status = DB::update('m_products', [
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
            $status_delete = DB::deleteById('m_products', $id);
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
}