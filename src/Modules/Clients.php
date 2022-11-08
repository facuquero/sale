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
 

}
