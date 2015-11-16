<?php

class User
{

    public static function registration($login, $password, $email)
    {
        $db = Db::getConnection();
        $query = "INSERT INTO Users (Login, Email, Password) VALUES ('$login', '$email','$password')";

        $result = mysqli_query($db, $query);

        return $result;
    }

    public static function validEmail($email)
    {
        if (preg_match('/^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$/', $email)) {
            return true;
        }
        return false;
    }

    public static function existEmail($email)
    {
        $db = Db::getConnection();
        $query = "SELECT * FROM Users WHERE Email = '$email'";
        $result = mysqli_query($db, $query);
        return ($result->fetch_row() ? true : false);
    }

    public static function validPassword($password)
    {
        if (preg_match('/(?=^.{7,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/', $password)) {
            return true;
        }
        return false;
    }

    public static function equalPassword($password, $repeatPassword)
    {
        if($password == $repeatPassword){
            return true;
        }
        return false;
    }

    public static function validLogin($login)
    {
        if (preg_match('/^[a-zA-Z](.[a-zA-Z0-9_-]*)$/', $login)) {
            return true;
        }
        return false;
    }

    public static function validUser($email, $password)
    {
        $db = Db::getConnection();

        $query = "SELECT * FROM Users WHERE Email = '$email' AND Password = '$password'";

        $user = mysqli_query($db, $query)->fetch_array();

        if ($user) {
            return $user['UserId'];
        }

        return false;
    }

    public static function auth($userId)
    {
        $_SESSION['user'] = $userId;
    }

    public static function validLogged()
    {
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }

        header("Location: /user/login/");
    }

    public static function Logged()
    {
        if (isset($_SESSION['user'])) {
            return true;
        }
        return false;
    }

}

?>