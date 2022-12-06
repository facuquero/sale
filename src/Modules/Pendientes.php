<?php
class Pendientes
{

    function __construct()
    {
    }

    public static function getPendienteDePago(): ?array
    {
        try {
            $Pendiente = DB::query('SELECT * FROM pending WHERE por_pagar_a_proveedores = 1 AND pagado_cobrado = 0', 'fetch_array');
            foreach ($Pendiente as &$pendiente) {
                if($pendiente['proveedor']){
                    $proveedor = DB::get(['*'] ,'supplier', ['id' => $pendiente['proveedor']])[0];
                    $pendiente['proveedor'] = $proveedor['nombre'];
                }
                if($pendiente['cliente']){
                    $cliente = DB::get(['*'] ,'client', ['id' => $pendiente['cliente']])[0];
                    $pendiente['proveedor'] = $cliente['name'];
                }
            }
            return is_bool($Pendiente) ? $Pendiente = [] : $Pendiente;
        } catch (Exception $e) {
            Logger::error('Pendiente', 'Error in add_product ->' . $e->getMessage());
        }
    }

    public static function getPendienteDeCobro(): ?array
    {
        try {
            $Pendiente = DB::query('SELECT * FROM pending WHERE por_cobrar = 1 AND pagado_cobrado = 0', 'fetch_array');
            foreach ($Pendiente as &$pendiente) {
                if($pendiente['proveedor']){
                    $proveedor = DB::get(['*'] ,'supplier', ['id' => $pendiente['proveedor']])[0];
                    $pendiente['proveedor'] = $proveedor['nombre'];
                }
                if($pendiente['cliente']){
                    $cliente = DB::get(['*'] ,'client', ['id' => $pendiente['cliente']])[0];
                    $pendiente['proveedor'] = $cliente['name'];
                }
            }
            return is_bool($Pendiente) ? $Pendiente = [] : $Pendiente;
        } catch (Exception $e) {
            Logger::error('Pendiente', 'Error in add_product ->' . $e->getMessage());
        }
    }
    public static function getTotalAPagar(): ?string
    {
        try {
            $Pendiente = DB::query('SELECT SUM(monto) as total 
            FROM pending
            WHERE por_pagar_a_proveedores = 1 AND pagado_cobrado = 0', 'fetch_assoc');
            return is_bool($Pendiente) ? $Pendiente = [] : $Pendiente[0]['total'];
        } catch (Exception $e) {
            Logger::error('Pendiente', 'Error in add_product ->' . $e->getMessage());
        }
    }
    public static function getTotalACobrar(): ?string
    {
        try {
            $Pendiente = DB::query('SELECT SUM(monto) as total 
            FROM pending
            WHERE por_cobrar = 1 AND pagado_cobrado = 0', 'fetch_assoc');
            return is_bool($Pendiente) ? $Pendiente = [] : $Pendiente[0]['total'];
        } catch (Exception $e) {
            Logger::error('Pendiente', 'Error in add_product ->' . $e->getMessage());
        }
    }


    public static function addPendiente()
    {
        try {
            $concepto = $_REQUEST['pending_concepto'];
            $monto = $_REQUEST['pending_monto'];
            $proveedor = $_REQUEST['pending_proveedor'];
            $cliente = $_REQUEST['pending_cliente'];
            $por_cobrar = 0;
            $por_pagar = 0;
            if($_REQUEST['porPagar'] == "1") {
            $por_pagar = 1;
            }
            if($_REQUEST['porPagar'] == "2"){
            $por_cobrar = 1;
            }
            if($proveedor){
                $proveedor = explode('ID: ', $proveedor)[1];
            }
            if($cliente){
                $cliente = explode('ID: ', $cliente)[1];
            }
            $pagado = 0;
            $from_module = 'pending';

            DB::insert('pending', [
                'concepto' => $concepto,
                'monto' => $monto,
                'proveedor' => $proveedor,
                'cliente' => $cliente,
                'por_pagar_a_proveedores' => $por_pagar,
                'por_cobrar' => $por_cobrar,
                'pagado_cobrado' => $pagado,
                'from_module' => $from_module
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
