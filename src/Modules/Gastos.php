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
            $gastosFijo = DB::get(['*'] ,'pending', ['from_module' => 'gastos_fijos']);
            return is_bool($gastosFijo) ? $gastosFijo = [] : $gastosFijo;
        } catch (Exception $e) {
            Logger::error('Proveedor', 'Error in add_proveedor ->' . $e->getMessage());
        }
    }

    public static function getGastosVariables():? array
    {
        try {
            $gastosVariable = DB::get(['*'] ,'pending', ['from_module' => 'gastos_variables']);
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
            $pagado_cobrado  = $_REQUEST['gasto_fijo_pagado_cobrado'];
            $fechaVencimiento = $_REQUEST['gasto_fijo_fecha_vencimiento'];
            $creado = date('Y-m-d H:i:s');
            DB::insert('pending', [
                'concepto' => $concepto,
                'monto' => $monto,
                'creado' => $creado,
                'fecha_vencimiento' => $fechaVencimiento,
                'por_pagar_a_proveedores' => 1,
                'por_cobrar' => 0,
                'pagado_cobrado' => 0,
                'from_module' => 'gastos_fijos',
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
            $pagado_cobrado  = $_REQUEST['gasto_variable_pagado_cobrado'];
            $fechaVencimiento = $_REQUEST['gasto_variable_fecha_vencimiento'];
            $creado = date('Y-m-d H:i:s');
            $update_status=  DB::insert('pending', [
                'concepto' => $concepto,
                'creado' => $creado,
                'monto' => $monto,
                'fecha_vencimiento' => $fechaVencimiento,
                'por_pagar_a_proveedores' => 1,
                'por_cobrar' => 0,
                'pagado_cobrado' => 0,
                'from_module' => 'gastos_variables',
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
            $pagado_cobrado  = isset($_REQUEST['gasto_fijo_update_pagado_cobrado']) ? $_REQUEST['gasto_fijo_update_pagado_cobrado'] : 0;
            $fechaVencimiento = $_REQUEST['gasto_fijo_update_fecha_vencimiento'];

            $update_status = DB::update('pending', [
                'concepto' => $concepto,
                'monto' => $monto,
                'pagado_cobrado' => $pagado_cobrado,
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
            $pagado_cobrado  = isset($_REQUEST['gasto_variable_update_pagado_cobrado']) ? $_REQUEST['gasto_fijo_update_pagado_cobrado'] : 0;
            $fechaVencimiento = $_REQUEST['gasto_variable_update_fecha_vencimiento'];

            $update_status = DB::update('pending', [
                'concepto' => $concepto,
                'monto' => $monto,
                'pagado_cobrado' => $pagado_cobrado,
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