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
            return $Products;
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
                $_SESSION['notifications'] = Helper::success('Cliente actualizado');
            } else {
                $_SESSION['notifications'] = Helper::error('Error el cliente no se pudo actualizar');
            }
        } catch (Exception $e) {
            Logger::error('Clients', 'Error in add client ->' . $e->getMessage());
        }
    } 
}