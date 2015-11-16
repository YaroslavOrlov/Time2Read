<?php

class HomeController
{
    public static function actionHome()
    {
        require_once(ROOT . '/views/home/home.php');

        return true;
    }
}

?>