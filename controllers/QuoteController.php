<?php

class QuoteController
{
    public static function actionQuotes()
    {
        require_once(ROOT.'/views/quote/quotes.php');

        return true;
    }
}

?>