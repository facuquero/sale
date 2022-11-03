<?php

class NotificationController
{

    public static function viewNotification()
    {
        $n = isset($_SESSION['Notification']) ? $_SESSION['Notification'] : NULL;
        if (!is_null($n) || $n != '') {
            echo $n;
            // $_SESSION['Notification'] = NULL;
        }
        unset($_SESSION['Notification']);
    }

    public static function newNotificacion(string $message)
    {
        $_SESSION['Notification'] = Helper::success($message);
    }

    public static function scriptPersist(string $script){
        $_SESSION['Notification'] = "<script type='text/babel'> $script  </script>";
    }
}

function dump()
{
    $n = isset($_SESSION['dump']) ? $_SESSION['dump'] : NULL;
    if (!is_null($n) || $n != '') {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
        var_dump($n);
        echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        unset($_SESSION['dump']);
    }
}
