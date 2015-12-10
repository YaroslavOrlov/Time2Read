<?php

class QuoteController
{
    public static function actionQuotes()
    {
        $result = Quote::getRandomQuote(10);

        require_once(ROOT . '/views/quote/quotes.php');

        return true;
    }

    public static function actionNext()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $result = json_encode(Quote::getRandomQuote(1), JSON_HEX_TAG |
                JSON_HEX_APOS |
                JSON_HEX_QUOT |
                JSON_HEX_AMP |
                JSON_UNESCAPED_UNICODE);

            echo $result;

            return true;

        }

        header('Location: /quote/quotes');

        return true;
    }

    public static function actionLike($quote_id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $user_id = User::validLogged();
            if (Quote::existUserQuote($quote_id, $user_id)) {
                Quote::removeQuote($quote_id,$user_id);
            } else {
                Quote::addQuote($quote_id,$user_id);
            }

            return true;
        }

        header('Location: /quote/quotes');

        return true;
    }

    public static function actionRemove($quote_id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $user_id = User::validLogged();

            Quote::removeQuote($quote_id,$user_id);

            return true;

        }

        header('Location: /user/profile');

        return true;
    }
}

?>