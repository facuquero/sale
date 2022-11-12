<?php
class Clients
{

    function __construct()
    {
       
    }

    public static function getClients():? array
    {
        try {
            $Clients = DB::get(['*'] ,'client');
            return $Clients;
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
 

}
