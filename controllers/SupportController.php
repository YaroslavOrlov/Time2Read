<?php

class SupportController
{
    public function actionContact()
    {
        $mail = 'eagles_96@mail.ru';
        $subject = 'Header';
        $content = 'content';
        $headers = 'From: kidjimoshi96@gmail.com';

        mail($mail, $subject, $content, $headers);

        header('Location: /home/home');

        return true;
    }
}

?>