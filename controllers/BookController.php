<?php

class BookController
{
    public function actionBook($id)
    {

        $book = Book::getBookById($id);

        $marks = Book::getMarksBookById($id);

        require_once(ROOT . '/views/book/book.php');

        return true;
    }

    public function actionAlreadyRead($bookId)
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $userId = User::validLogged();

            if (Book::existUserBook($userId, $bookId)) {
                Book::updateUserBook($userId, $bookId, 1);
            } else {
                Book::addToAlreadyRead($userId, $bookId);
            }

            return true;

        }

        header('Location: /book/book/1');

        return true;
    }

    public function actionReading($bookId)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $userId = User::validLogged();

            if (Book::existUserBook($userId, $bookId)) {
                Book::updateUserBook($userId, $bookId, 2);
            } else {
                Book::addToReading($userId, $bookId);
            }

            return true;
        }

        header('Location: /book/book/1');

        return true;
    }

    public function actionWantRead($bookId)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $userId = User::validLogged();

            if (Book::existUserBook($userId, $bookId)) {
                Book::updateUserBook($userId, $bookId, 3);
            } else {
                Book::addToWantRead($userId, $bookId);
            }

            return true;
        }

        header('Location: /book/book/1');

        return true;
    }

    public function actionRemoveUserBook($bookId)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $userId = User::validLogged();

            Book::removeBook($userId, $bookId);
        }

        header('Location: /book/book/1');

        return true;
    }
}

?>