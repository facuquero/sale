<?php
class Logger {
    public static function error($module, $message){
        $message = is_string($message) ? $message : json_encode($message);
        self::registerLog("[".date("r")."] Error en modulo $module : $message\r\n");
    }
    public static function registerLog($errorLog){
        $file_errors = fopen('../Logs/errors.log','a');
        fwrite($file_errors, $errorLog);
        fclose($file_errors);
        unset($_SESSION['LoggError']);
    }
}