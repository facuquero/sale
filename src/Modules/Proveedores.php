<?php
class Proveedores
{

    function __construct()
    {
        // return getProducts();
    }

    public static function getProveedores():? array
    {
        try {
            $Proveedor = DB::get(['*'] ,'supplier');
            return is_bool($Proveedor) ? $Proveedor = [] : $Proveedor;
        } catch (Exception $e) {
            Logger::error('Proveedor', 'Error in add_proveedor ->' . $e->getMessage());
        }
    }

    public static function addProveedor()
    {
        try {
            $nombre = $_REQUEST['proveedor_nombre'];
            $telefono = $_REQUEST['proveedor_telefono'];

            DB::insert('supplier', [
                'nombre' => $nombre,
                'telefono' => $telefono,
            ]);

            $_SESSION['notifications'] = Helper::success('Proveedor agregado');
        } catch (Exception $e) {
            Logger::error('Proveedor', 'Error in add proveedor ->' . $e->getMessage());
        }
    }

    public static function updateProveedor()
    {
        try {
            $id = $_REQUEST['proveedor_update_id'];
            $nombre = $_REQUEST['proveedor_update_nombre'];
            $telefono = $_REQUEST['proveedor_update_telefono'];


            $update_status = DB::update('supplier', [
                'nombre' => $nombre,
                'telefono' => $telefono,
            ], [
                'id' => $id
            ]);

            if ($update_status) {
                $_SESSION['notifications'] = Helper::success('Proveedor actualizado');
            } else {
                $_SESSION['notifications'] = Helper::error('Error el proveedor no se pudo actualizar');
            }
        } catch (Exception $e) {
            Logger::error('Clients', 'Error in add client ->' . $e->getMessage());
        }
    } 

    public static function deleteProveedor()
    {
        try {
            $id = $_REQUEST['id_proveedor_delete'];
            $status_delete = DB::deleteById('supplier', $id);
            if ($status_delete) {
                $_SESSION['notifications'] = Helper::success('Proveedor eliminado');
                Response::json([
                    'status' => true,
                    'message' => 'Product delete'
                ]);
            } else {
                $_SESSION['notifications'] = Helper::error('Error al tratar de eliminar el proveedor');
                Response::json([
                    'status' => false
                ]);
            }
        } catch (Exception $e) {
            Logger::error('Proveedor', 'Error in deleteProduct ->' . $e->getMessage());
        }
    }
}