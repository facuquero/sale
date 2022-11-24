<?php
class Pendientes
{

    function __construct()
    {
    }

    public static function getPendienteDePago(): ?array
    {
        try {
            $Pendiente = DB::get(['*'], 'pending', ['por_pagar_a_proveedores' => true]);
            return is_bool($Pendiente) ? $Pendiente = [] : $Pendiente;
        } catch (Exception $e) {
            Logger::error('Pendiente', 'Error in add_product ->' . $e->getMessage());
        }
    }

    public static function addPendiente()
    {
        try {
            $concepto = $_REQUEST['pending_concepto'];
            $por_pagar = $_REQUEST['pending_por_pagar'];
            $por_cobrar = $_REQUEST['pending_por_cobrar'];
            $monto = $_REQUEST['pending_monto'];
            $proveedor = $_REQUEST['pending_proveedor'];
            $cliente = $_REQUEST['pending_cliente'];


            DB::insert('pending', [
                'concepto' => $concepto,
                'por_pagar' => $por_pagar,
                'por_cobrar' => $por_cobrar,
                'monto' => $monto,
                'proveedor' => $proveedor,
                'cliente' => $cliente
            ]);

            $_SESSION['notifications'] = Helper::success('Cliente agregado');
        } catch (Exception $e) {
            Logger::error('Pendiente', 'Error in add pending ->' . $e->getMessage());
        }
    }

    public static function updatePendiente()
    {
        try {
            $concepto = $_REQUEST['pending_update_concepto'];
            $por_pagar = $_REQUEST['pending_update_por_pagar'];
            $por_cobrar = $_REQUEST['pending_update_por_cobrar'];
            $monto = $_REQUEST['pending_update_monto'];
            $proveedor = $_REQUEST['pending_update_proveedor'];
            $cliente = $_REQUEST['pending_update_cliente'];
            
            $id = $_REQUEST['pending_update_id'];
            $update_status = DB::update('pending', [
                'concepto' => $concepto,
                'por_pagar' => $por_pagar,
                'por_cobrar' => $por_cobrar,
                'monto' => $monto,
                'proveedor' => $proveedor,
                'cliente' => $cliente
            ], [
                'id' => $id
            ]);

            if ($update_status) {
                $_SESSION['notifications'] = Helper::success('Cliente actualizado');
            } else {
                $_SESSION['notifications'] = Helper::error('Error el pendinge no se pudo actualizar');
            }
        } catch (Exception $e) {
            Logger::error('Pendiente', 'Error in updateClient ->' . $e->getMessage());
        }
    }


    public static function deletePending()
    {
        try {
            $id = $_REQUEST['id_pending_delete'];
            $status_delete = DB::deleteById('pending', $id);

            if ($status_delete) {
                $_SESSION['notifications'] = Helper::success('Cliente eliminado');
                Response::json([
                    'status' => true,
                    'message' => 'Cliente delete'
                ]);
            } else {
                $_SESSION['notifications'] = Helper::error('Error al tratar de eliminar el pendinge');
                Response::json([
                    'status' => false
                ]);
            }
        } catch (Exception $e) {
            Logger::error('Pendiente', 'Error in deleteClient ->' . $e->getMessage());
        }
    }
}
