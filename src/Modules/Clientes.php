<?php
class Clientes
{

    function __construct()
    {
    }

    public static function getClients(): ?array
    {
        try {
            $Clients = DB::get(['*'], 'client');
            return is_bool($Clients) ? $Clients = [] : $Clients;
        } catch (Exception $e) {
            Logger::error('Clients', 'Error in add_product ->' . $e->getMessage());
        }
    }

    public static function addClients()
    {
        try {
            $nombre = $_REQUEST['client_name'];

            DB::insert('client', [
                'name' => $nombre
            ]);

            $_SESSION['notifications'] = Helper::success('Cliente agregado');
        } catch (Exception $e) {
            Logger::error('Clients', 'Error in add client ->' . $e->getMessage());
        }
    }

    public static function updateClient()
    {
        try {
            $nombre = $_REQUEST['client_update'];
            $id = $_REQUEST['client_id'];
            $update_status = DB::update('client', [
                'name' => $nombre,
            ], [
                'id' => $id
            ]);

            if ($update_status) {
                $_SESSION['notifications'] = Helper::success('Cliente actualizado');
            } else {
                $_SESSION['notifications'] = Helper::error('Error el cliente no se pudo actualizar');
            }
        } catch (Exception $e) {
            Logger::error('Clients', 'Error in updateClient ->' . $e->getMessage());
        }
    }


    public static function deleteClient()
    {
        try {
            $id = $_REQUEST['id_client_delete'];
            $status_delete = DB::deleteById('client', $id);

            if ($status_delete) {
                $_SESSION['notifications'] = Helper::success('Cliente eliminado');
                Response::json([
                    'status' => true,
                    'message' => 'Cliente delete'
                ]);
            } else {
                $_SESSION['notifications'] = Helper::error('Error al tratar de eliminar el cliente');
                Response::json([
                    'status' => false
                ]);
            }
        } catch (Exception $e) {
            Logger::error('Clients', 'Error in deleteClient ->' . $e->getMessage());
        }
    }
}
