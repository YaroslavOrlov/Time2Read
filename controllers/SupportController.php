<?php

class SupportController
{
    public function actionContact()
    {
        $user_id = User::validLogged();

        if(isset($_POST['submit']) and isset($_POST['support_text'])){
            $mail = 'eagles_96@mail.ru';
            $subject = 'Help our service!';
            $content = $_POST['support_text'];

            $user = User::getUserLogin($user_id);

            $headers = "From: $user[3]";

            mail($mail, $subject, $content, $headers);
        }

        header('Location: /home/home');

        return true;
    }
}

?>