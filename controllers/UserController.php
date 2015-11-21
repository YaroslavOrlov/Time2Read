<?php

class UserController
{
    public function actionRegistration()
    {
        $login = '';
        $email = '';
        $password = '';
        $repeatPassword = '';
        $result = false;

        if (isset($_POST['submit'])) {
            $login = $_POST['login'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $repeatPassword = $_POST['repeat_password'];

            $errors = false;

            if (!User::validLogin($login)) {
                $errors[1] = 'bad login';
            }

            if (!User::validPassword($password)) {
                $errors[2] = 'bad password';
            }

            if (!User::validEmail($email)) {
                $errors[0] = 'bad email';
            }

            if (!User::equalPassword($password, $repeatPassword)) {
                $errors[3] = 'not equal passwords';
            }

            if (User::existEmail($email)) {
                $errors[4] = 'this email already exist';
            }

            if ($errors == false) {
                $result = User::registration($login, $password, $email);

                header("Location: /user/login/");
            }
        }

        require_once(ROOT . '/views/user/registration.php');

        return true;
    }

    public function actionLogin()
    {
        $email = '';
        $password = '';

        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $errors = false;

            if (!User::validEmail($email)) {
                $errors[0] = 'wrong email';
            }

            if (!User::validPassword($password)) {
                $errors[1] = 'wrong password';
            }

            if ($errors == false) {
                $userId = User::validUser($email, $password);

                if ($userId == false) {
                    $errors[2] = 'wrong user';
                } else {
                    User::auth($userId);

                    header("Location: /home/home/");
                }
            }
        }
        require_once(ROOT . '/views/user/login.php');

        return true;
    }

    public function actionUnset()
    {
        session_start();
        unset($_SESSION['user']);

        header('Location: /home/home');

        return true;
    }
}

?>