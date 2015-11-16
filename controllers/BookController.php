<?php

class BookController
{
    public function actionBook()
    {
        require_once(ROOT. '/views/book/book.php');

        return true;
    }
}

?>