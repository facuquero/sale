<?php

class Helper
{
    /**
     * @param string $message Message to display
     */
    public static function success(string $message, bool $toast = false)
    {
        $_SESSION['Notification'] = "<script>success('$message', '$toast')</script>";
    }

    public static function error($x)
    {
        $_SESSION['Notification'] = "<script>error('$x')</script>";
    }

    public static function warning($x)
    {
        $_SESSION['Notification'] = "<script>warning('$x')</script>";
    }

    public static function console($x): void
    {
        echo "<script>console.log('$x')</script>";
    }

    public static function alert($msj, $redirect): void
    {
        $redirect = '<br>
        <a href="' . $redirect . '">Click Aqui.</a>
        ';
        $_SESSION['alert'] = $msj . $redirect;
    }

    public static function validate_input(array $input)
    {

        foreach ($input as $x) {
            $value = $x;
            $permitidos = 'aábcdeéfghiíjklmnoópqrstuúvwxyzAÁBCDEÉFGHIÍJKLMNOÓPQRSTUÚVWXYZ0123456789/@-_. $!¿?¡#%&()=|°:;';
            for ($i = 0; $i < strlen($value); $i++) {
                if (strpos($permitidos, substr($value, $i, 1)) === false) {
                    return false;
                }
            }
            continue;
        }
        return true;
    }

    public static function validate_input_only_letters_characters(array $input)
    {
        foreach ($input as $x) {
            $value = $x;
            $permitidos = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ ';
            for ($i = 0; $i < strlen($value); $i++) {
                if (strpos($permitidos, substr($value, $i, 1)) === false) {
                    return false;
                }
            }
            return true;
        }
    }

    public static function Fsize($dir)
    {
        clearstatcache();
        $cont = 0;
        if (is_dir($dir)) {
            if ($gd = opendir($dir)) {
                while (($archivo = readdir($gd)) !== false) {
                    if ($archivo != "." && $archivo != "..") {
                        if (is_dir($archivo)) {
                            $cont += self::Fsize($dir . "/" . $archivo);
                        } else {
                            $cont += sprintf("%u", filesize($dir . "/" . $archivo));
                        }
                    }
                }
                closedir($gd);
            }
        }
        // echo "PESO DE DESCARGAS: 2,68 GB (2.881.723.298 bytes)</br>";
        return self::formatBytes($cont);
    }

    public static function formatBytes($size, $precision = 2)
    {
        $base = log($size, 1024);
        $suffixes = array('', 'KB', 'MB', 'GB', 'TB');

        return is_nan((float)round(pow(1024, $base - floor($base)), $precision)) ? '0' : round(pow(1024, $base - floor($base)), $precision) . ' ' . $suffixes[floor($base)];
    }

    public static function list_files($directorio)
    {
        $list_files = scandir($directorio);
        return count($list_files) - 2;
    }

    public static function all_unset(array &$values)
    {
        if (count($values) > 0) {
            foreach ($values as $key => $value) {
                unset($values[$key]);
            }
        }
    }

    public static function JsonResponse(array $response)
    {
        echo json_encode($response);
        die;
    }

    public static function clearSpecialsCharacters(string $character): string
    {
        $character = str_replace("[áàâãªä@]", "a", $character);
        $character = str_replace("[ÁÀÂÃÄ]", "A", $character);
        $character = str_replace("[éèêë]", "e", $character);
        $character = str_replace("[ÉÈÊË]", "E", $character);
        $character = str_replace("[íìîï]", "i", $character);
        $character = str_replace("[ÍÌÎÏ]", "I", $character);
        $character = str_replace("[óòôõºö]", "o", $character);
        $character = str_replace("[ÓÒÔÕÖ]", "O", $character);
        $character = str_replace("[úùûü]", "u", $character);
        $character = str_replace("[ÚÙÛÜ]", "U", $character);
        $character = str_replace("[,;.:]", "", $character);
        $character = str_replace("['\"]", "", $character);
        $character = str_replace("[?¿]", "", $character);
        $character = str_replace("[)(]", "", $character);
        $character = str_replace("[\[\]]", "", $character);
        $character = str_replace("[<>]", "", $character);
        $character = str_replace("[-_]", "", $character);
        $character = str_replace("[!¡]", "", $character);
        $character = str_replace("[{}]", "", $character);
        $character = str_replace("[%#$&/|°¬]", "", $character);
        return $character;
    }
}
