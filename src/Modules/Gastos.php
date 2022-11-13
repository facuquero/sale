<?php
class Gastos
{

    function __construct()
    {
        // return getProducts();
    }

    public static function getGastosFijos():? array
    {
        try {
            $gastosFijo = DB::get(['*'] ,'gastos_fijos');
            return is_bool($gastosFijo) ? $gastosFijo = [] : $gastosFijo;
        } catch (Exception $e) {
            Logger::error('Proveedor', 'Error in add_proveedor ->' . $e->getMessage());
        }
    }

    public static function getGastosVariables():? array
    {
        try {
            $gastosVariable = DB::get(['*'] ,'gastos_variables');
            return is_bool($gastosVariable) ? $gastosVariable = [] : $gastosVariable;
        } catch (Exception $e) {
            Logger::error('gastoVariable', 'Error in add_proveedor ->' . $e->getMessage());
        }
    }

    public static function addGastoFijo()
    {
        try {
            $concepto = $_REQUEST['gasto_fijo_concepto'];
            $monto = $_REQUEST['gasto_fijo_monto'];
            $fechaPago  = $_REQUEST['gasto_fijo_fecha_pago'];
            $fechaVencimiento = $_REQUEST['gasto_fijo_fecha_vencimiento'];

            DB::insert('gastos_fijos', [
                'concepto' => $concepto,
                'monto' => $monto,
                'fecha_pago' => $fechaPago,
                'fecha_vencimiento' => $fechaVencimiento
            ]);

            $_SESSION['notifications'] = Helper::success('Gasto fijo agregado');
        } catch (Exception $e) {
            Logger::error('Proveedor', 'Error in add proveedor ->' . $e->getMessage());
        }
    }

    public static function addGastoVariable()
    {
        try {
            $concepto = $_REQUEST['gasto_variable_concepto'];
            $monto = $_REQUEST['gasto_variable_monto'];
            $fechaPago  = $_REQUEST['gasto_variable_fecha_pago'];
            $fechaVencimiento = $_REQUEST['gasto_variable_fecha_vencimiento'];

            $update_status=  DB::insert('gastos_variables', [
                'concepto' => $concepto,
                'monto' => $monto,
                'fecha_pago' => $fechaPago,
                'fecha_vencimiento' => $fechaVencimiento
            ]);

            if ($update_status) {
                $_SESSION['notifications'] = Helper::success('Gasto variable agregado');
            } else {
                $_SESSION['notifications'] = Helper::error('Error el proveedor no se pudo actualizar');
            }
        } catch (Exception $e) {
            Logger::error('Clients', 'Error in add client ->' . $e->getMessage());
        }
    } 

    public static function deleteGastoFijo()
    {
        try {
            $id = $_REQUEST['id_gasto_fijo_delete'];
            $status_delete = DB::deleteById('gastos_fijos', $id);
            if ($status_delete) {
                $_SESSION['notifications'] = Helper::success('Gasto fijo eliminado');
                Response::json([
                    'status' => true,
                    'message' => 'Product delete'
                ]);
            } else {
                $_SESSION['notifications'] = Helper::error('Error al tratar de eliminar el gasto fijo');
                Response::json([
                    'status' => false
                ]);
            }
        } catch (Exception $e) {
            Logger::error('Proveedor', 'Error in deleteProduct ->' . $e->getMessage());
        }
    }

    public static function deleteGastoVariable()
    {
        try {
            $id = $_REQUEST['id_gasto_variable_delete'];
            $status_delete = DB::deleteById('gastos_variables', $id);
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

    public static function updateGastoFijo()
    {
        try {
            $id = $_REQUEST['gasto_fijo_update_id'];
            $concepto = $_REQUEST['gasto_fijo_update_concepto'];
            $monto = $_REQUEST['gasto_fijo_update_monto'];
            $fechaPago  = $_REQUEST['gasto_fijo_update_fecha_pago'];
            $fechaVencimiento = $_REQUEST['gasto_fijo_update_fecha_vencimiento'];

            $update_status = DB::update('gastos_fijos', [
                'concepto' => $concepto,
                'monto' => $monto,
                'fecha_pago' => $fechaPago,
                'fecha_vencimiento' => $fechaVencimiento
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

    public static function updateGastoVariable()
    {
        try {
            $id = $_REQUEST['gasto_variable_update_id'];
            $concepto = $_REQUEST['gasto_variable_update_concepto'];
            $monto = $_REQUEST['gasto_variable_update_monto'];
            $fechaPago  = $_REQUEST['gasto_variable_update_fecha_pago'];
            $fechaVencimiento = $_REQUEST['gasto_variable_update_fecha_vencimiento'];

            $update_status = DB::update('gastos_variables', [
                'concepto' => $concepto,
                'monto' => $monto,
                'fecha_pago' => $fechaPago,
                'fecha_vencimiento' => $fechaVencimiento
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
}