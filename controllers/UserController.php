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
                $errors[1] = 'Введите логин в формате не более 8 символов например exam2000';
            }

            if (!User::validPassword($password)) {
                $errors[2] = 'Введите пароль в формате например PAss2000';
            }

            if (!User::validEmail($email)) {
                $errors[0] = 'Введите e-mail в формате например example@mail.com';
            }

            if (!User::equalPassword($password, $repeatPassword)) {
                $errors[3] = 'Пароли не совпадают';
            }

            if (User::existEmail($email)) {
                $errors[4] = 'Такой e-mail уже зарегистрирован';
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
                $errors[0] = 'Не верно введен e-mail';
            }

            if (!User::validPassword($password)) {
                $errors[1] = 'Не верно указан пароль';
            }

            if ($errors == false) {
                $userId = User::validUser($email, $password);

                if ($userId == false) {
                    $errors[2] = 'Такой пользователь не существует';
                } else {
                    User::auth($userId);

                    if (!User::existUserAchieve($userId ,9)) {
                        User::addUserAchieve($userId, 9);
                    }

                    header("Location: /home/home/");
                }
            }
        }
        require_once(ROOT . '/views/user/login.php');

        return true;
    }

    public function actionProfile()
    {
        $user_id = User::validLogged();

        $reviews = User::getUserBookReview($user_id);

        $quotes = User::getUserQuotes($user_id);

        $countReview = User::countReviews($user_id);

        $countRead = User::countUserBooks($user_id, 1);

        $countReading = User::countUserBooks($user_id, 2);

        $countWantRead = User::countUserBooks($user_id, 3);

        $alreadyread = User::getUserLikeBook($user_id, 1);

        $reading = User::getUserLikeBook($user_id, 2);

        $wantread = User::getUserLikeBook($user_id, 3);

        $login = User::getUserLogin($user_id);

        $level = User::getUserLevel($user_id);

        $achieves = User::getUserAchieves($user_id);

        $recommends = User::getUserRecommends($user_id);


        require_once(ROOT . '/views/user/profile.php');

        return true;
    }

    public function actionEdit()
    {

        $user_Id = User::validLogged();

        $user = User::getUserLogin($user_Id);

        $avatar = '';
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
                $errors[1] = 'Введите логин в формате не более 8 символов например exam2000';
            }

            if (!User::validPassword($password)) {
                $errors[2] = 'Введите пароль в формате например PAss2000';
            }

            if (!User::validEmail($email)) {
                $errors[0] = 'Введите e-mail в формате например example@mail.com';
            }

            if (!User::equalPassword($password, $repeatPassword)) {
                $errors[3] = 'Пароли не совпадают';
            }

            if ($errors == false) {
                $path = ROOT.'/template/images/'.$_FILES['avatar']['name'];
                $name = $_FILES['avatar']['name'];
                move_uploaded_file($_FILES['avatar']['tmp_name'], $path);
                $result = User::updateUser($user_Id, $login, $email, $password, $name);

                header("Location: /user/profile");
            }

        }
        require_once(ROOT . '/views/user/edit.php');

        return true;
    }

    public function actionLogout()
    {
        User::logOut();

        return true;
    }
}

?>