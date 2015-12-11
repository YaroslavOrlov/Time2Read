<?php

class BookController
{
    public function actionBook($id)
    {

        $book = Book::getBookById($id);

        $marks = Book::getMarksBookById($id);

        $bookreviews = Book::getBookReviews($id);

        $similarbooks = Book::getSimilarBooks($id);

        if (User::Logged()) {
            $bookmark = Book::getUserMark($id, User::returnUser());
        }

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

    public function actionMarked($bookId, $mark)
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $userId = User::validLogged();

            if (Book::existBookMark($userId, $bookId)) {
                Book::updateMarkToBook($bookId, $userId, $mark);
            } else {
                Book::addMarkToBook($bookId, $userId, $mark);
            }

            $result = json_encode(Book::getMarksBookById($bookId),
                JSON_HEX_TAG |
                JSON_HEX_APOS |
                JSON_HEX_QUOT |
                JSON_HEX_AMP |
                JSON_UNESCAPED_UNICODE);

            echo $result;

            return true;
        }

        header('Location: /book/book/1');

        return true;

    }

    public function actionSearch()
    {
        $searchresult = '%';
        $tagresult = '%';
        $genre = '%';
        $bookorauthor = '%';
        $user_id = User::validLogged();

        if (isset($_POST['submit'])) {
            $searchresult = $_POST['searchresult'];
            $tagresult = $_POST['tagresult'];
            $genre = $_POST['genre'];
            $bookorauthor = $_POST['bookorauthor'];


            $books = Book::getSearchBooks($searchresult, $tagresult, $genre, $bookorauthor, $user_id);
        } else {
            $books = Book::getSearchBooks($searchresult, $tagresult, $genre, $bookorauthor, $user_id);
        }

        require_once(ROOT . '/views/book/search.php');

        return true;
    }

    public function actionAddReview()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $header = '';
            $review = '';
            $rating = '';
            $bookId = '';

            $errors = false;

            $user_id = User::validLogged();

            if (isset($_POST['submit'])) {
                $header = $_POST['header'];
                $review = $_POST['userreviews'];
                $rating = $_POST['rating'];
                $bookId = $_POST['bookId'];


                if(!preg_match('/[A-Za-z0-9_-]{500,1000}/', $review)){
                    $errors[0] = 'Количество введенных символов должно быть от 500 до 1000';
                }

                if($errors == false){

                    Book::addUserReview($header, $review, $rating, $bookId, $user_id);

                    header("Location: /book/book/" . $bookId);
                }

            }
            header("Location: /book/book/" . $bookId);

            return true;

        }

        header('Location: /book/book/1');

        return true;

    }

    public function isSelf($secondId) {
        if ($_SESSION["similarbookid"] == $secondId) {
            return true;
        }
        return false;
    }

    public function actionSimilar()
    {
        $_SESSION["similarbookid"] = $_POST['idBook'];

        $searchresult = '%';
        $tagresult = '%';
        $genre = '%';
        $bookorauthor = '%';
        $user_id = User::returnUser();

        if (isset($_POST['submit'])) {
            $searchresult = $_POST['searchresult'];
            $tagresult = $_POST['tagresult'];
            $genre = $_POST['genre'];
            $bookorauthor = $_POST['bookorauthor'];


            $books = Book::getSearchBooks($searchresult, $tagresult, $genre, $bookorauthor, $user_id);
        } else {
            $books = Book::getSearchBooks($searchresult, $tagresult, $genre, $bookorauthor, $user_id);
        }

        require_once(ROOT . '/views/book/similar.php');

        return true;
    }

    public function actionAddSimilar($secondId)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if (!(Book::existSimilarBook($_SESSION["similarbookid"], $secondId))) {
                Book::addSimilarBook($_SESSION["similarbookid"], $secondId);
                return true;
            }

        }
    }

}

?>