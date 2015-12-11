<?php

class HomeController
{
    public static function actionHome()
    {
        require_once(ROOT . '/views/home/home.php');

        return true;
    }

    public static function actionCollection()
    {
        require_once(ROOT . '/views/home/collection.php');

        return true;
    }

    public static function actionPopular()
    {

        $authors = Author::getPopularAuthor();

        $books = Book::getPopularBooks();

        require_once(ROOT . '/views/home/popular.php');

        return true;
    }
}

?>