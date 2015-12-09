<?php

class Book
{
    public static function getBookById($id)
    {
        $db = Db::getConnection();

        $query = "SELECT a.FullName, b.BookId, b.AuthorId, b.Name,
                         b.Description, b.StoreLink, b.AudioLink, b.Cover
                         FROM Books b
                         INNER JOIN Authors a
                         ON b.BookId = $id
                         AND b.AuthorId = a.AuthorId";

        return mysqli_query($db, $query)->fetch_all();
    }

    public static function getMarksBookById($id)
    {
        $db = Db::getConnection();

        $query = "SELECT COUNT(m.BookId), SUM(m.Mark)
                         FROM Marks m
                         WHERE m.BookId = $id";

        return mysqli_query($db, $query)->fetch_all();
    }

    public static function getCountBooks()
    {
        $db = DB::getConnection();

        $query = "SELECT COUNT(BookId) FROM Books";

        return mysqli_query($db, $query)->fetch_row()[0];
    }

    public static function existUserBook($userId, $bookId)
    {
        $db = Db::getConnection();

        $query = "SELECT * FROM UserBooks
                  WHERE UserId = $userId
                  AND BookId = $bookId";

        $result = mysqli_query($db, $query)->fetch_row();

        if (isset($result)) {
            return true;
        }
        return false;
    }

    public static function updateUserBook($userId, $bookId, $category)
    {
        $db = Db::getConnection();

        $query = "UPDATE UserBooks SET Category=$category
                  WHERE UserId = $userId AND BookId = $bookId";

        return mysqli_query($db, $query);

    }

    public static function getUserMark($bookId, $userId)
    {
        $db = Db::getConnection();

        $query = "SELECT * FROM Marks
                  WHERE BookId = $bookId
                  AND UserId = $userId";

        return mysqli_query($db, $query)->fetch_array();
    }

    public static function addToAlreadyRead($userId, $bookId)
    {
        $db = Db::getConnection();

        $query = "INSERT INTO UserBooks(UserId, BookId, Category)
                  VALUES ($userId,$bookId,1)";

        return mysqli_query($db, $query);
    }

    public static function addToReading($userId, $bookId)
    {
        $db = Db::getConnection();

        $query = "INSERT INTO UserBooks(UserId, BookId, Category)
                  VALUES ($userId,$bookId,2)";

        return mysqli_query($db, $query);
    }

    public static function addToWantRead($userId, $bookId)
    {
        $db = Db::getConnection();

        $query = "INSERT INTO UserBooks(UserId, BookId, Category)
                  VALUES ($userId,$bookId,3)";

        return mysqli_query($db, $query);
    }

    public static function removeBook($userId, $bookId)
    {
        $db = Db::getConnection();

        $query = "DELETE FROM UserBooks
                  WHERE UserId = $userId
                  AND BookId = $bookId";

        return mysqli_query($db, $query);
    }

    public static function isInList($bookId, $category)
    {
        $userId = User::returnUser();

        if (isset($userId)) {
            $db = Db::getConnection();

            $query = "SELECT * FROM UserBooks
                  WHERE UserId = $userId
                  AND BookId = $bookId
                  AND Category = $category";

            $result = mysqli_query($db, $query)->fetch_row();

            if (isset($result)) {
                return true;
            }
            return false;
        }
        return false;
    }

    public static function addMarkToBook($bookId, $userId, $mark)
    {
        $db = Db::getConnection();

        $query = "INSERT INTO Marks(BookId, UserId, Mark) VALUES ($bookId,$userId, $mark)";

        return mysqli_query($db, $query);
    }

    public static function existBookMark($userId, $bookId)
    {
        $db = Db::getConnection();

        $query = "SELECT * FROM Marks
                  WHERE UserId = $userId
                  AND BookId = $bookId";

        $result = mysqli_query($db, $query)->fetch_row();

        if (isset($result)) {
            return true;
        }
        return false;
    }

    public static function updateMarkToBook($bookId, $userId, $mark)
    {
        $db = Db::getConnection();

        $query = "UPDATE Marks SET Mark = $mark
                  WHERE BookId = $bookId
                  AND UserId = $userId";

        return mysqli_query($db, $query);
    }

}

?>