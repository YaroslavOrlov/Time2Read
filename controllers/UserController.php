<?php

class UserController
{
    public function actionRegister()
    {
        $login = '';
        $email = '';
        $password = '';
        $result = false;

        if (isset($_POST['submit'])) {
            $login = $_POST['login'];
            $email = $_POST['email'];
            $password = $_POST['password_text'];

            $errors = false;

            if (!User::validLogin($login)) {
                $errors[] = 'bad login';
            }

            if (!User::validPassword($password)) {
                $errors[] = 'bad password';
            }

            if (!User::validEmail($email)) {
                $errors[] = 'bad email';
            }

            if (User::existEmail($email)) {
                $errors[] = 'this email already exist';
            }

            if ($errors == false) {
                $result = User::register($login, $password, $email);

                header("Location: /user/login/");
            }
        }

        require_once(ROOT . '/views/user/register.php');

        return true;
    }

    public function actionLogin()
    {
        $email = '';
        $password = '';

        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password_text'];

            $errors = false;

            if (!User::validEmail($email)) {
                $errors[] = 'wrong email';
            }

            if (!User::validPassword($password)) {
                $errors[] = 'wrong password';
            }

            $userId = User::validUser($email, $password);

            if ($userId == false) {
                $errors[] = 'wrong user';
            } else {
                User::auth($userId);

                header("Location: /user/login/");
            }

        }
        require_once(ROOT . '/views/user/login.php');

        return true;
    }
}

?>