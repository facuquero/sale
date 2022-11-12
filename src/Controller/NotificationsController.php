<?php

class NotificationController
{

    public static function viewNotification()
    {
        $n = isset($_SESSION['Notification']) ? $_SESSION['Notification'] : NULL;
        if (!is_null($n) || $n != '') {
            echo $n;
        }
        unset($_SESSION['Notification']);
    }


}
