<?php

class Db
{
    public static function getConnection()
    {
        $paramPath = ROOT . '/config/db_params.php';

        $params = include($paramPath);

        $db = mysqli_connect($params['host'], $params['user'], $params['password'], $params['dbname']);

        $db->set_charset("utf8");

        return $db;
    }
}

?>