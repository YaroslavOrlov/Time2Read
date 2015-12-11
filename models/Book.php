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

    public static function getSearchBooks($searchresult, $tagresult,
                                          $genre, $bookorauthor, $userId)
    {
        $db = Db::getConnection();

        $query = "SELECT a1.FullName, b1.BookId, b1.AuthorId, b1.Name, b1.Cover,
                      COUNT(m1.BookId), SUM(m1.Mark), $userId
                      FROM Books b1, Authors a1, Marks m1
                      WHERE a1.AuthorId = b1.AuthorId
                      AND b1.BookId = m1.BookId
                      AND b1.Name LIKE " . "'%" . "$searchresult" . "%'" . "
                      GROUP BY m1.BookId
                      UNION ALL
                      SELECT a2.FullName, b2.BookId, b2.AuthorId, b2.Name, b2.Cover,
                      0, 0, $userId
                      FROM Books b2, Authors a2
                      WHERE b2.BookId NOT IN
                      (SELECT BookId FROM Marks)
                      AND a2.AuthorId = b2.AuthorId
                      AND b2.Name LIKE " . "'%" . "$searchresult" . "%'" . "
                      GROUP BY b2.BookId";

        if ($bookorauthor == 'author') {
            $query = "SELECT a1.FullName, b1.BookId, b1.AuthorId, b1.Name, b1.Cover,
                      COUNT(m1.BookId), SUM(m1.Mark), $userId
                      FROM Books b1, Authors a1, Marks m1
                      WHERE a1.AuthorId = b1.AuthorId
                      AND b1.BookId = m1.BookId
                      AND a1.FullName LIKE " . "'%" . "$searchresult" . "%'" . "
                      GROUP BY m1.BookId
                      UNION ALL
                      SELECT a2.FullName, b2.BookId, b2.AuthorId, b2.Name, b2.Cover,
                      0, 0, $userId
                      FROM Books b2, Authors a2
                      WHERE b2.BookId NOT IN
                      (SELECT BookId FROM Marks)
                      AND a2.AuthorId = b2.AuthorId
                      AND a2.FullName LIKE " . "'%" . "$searchresult" . "%'" . "
                      GROUP BY b2.BookId";
        }


        return mysqli_query($db, $query)->fetch_all();
    }

    public static function getBookReviews($bookId)
    {
        $db = Db::getConnection();

        $query = "SELECT u.Login, r.Header, r.Review, r.Types
                  FROM Reviews r, Users u
                  WHERE r.BookId = $bookId
                  AND r.UserId = u.UserId";

        return mysqli_query($db, $query)->fetch_all();
    }

    public static function getSimilarBooks($bookId)
    {
        $db = Db::getConnection();

        $query = "SELECT b.BookId, b.Name, b.Cover, a.FullName, a.AuthorId
                  FROM Books b, Authors a, SimilarBooks sb
                  WHERE sb.FirstBook = $bookId
                  AND sb.SecondBook = b.BookId
                  AND b.AuthorId = a.AuthorId";

        return mysqli_query($db, $query)->fetch_all();
    }

    public static function addUserReview($header, $review, $rating, $bookId, $userId)
    {
        $db = Db::getConnection();

        $query = "INSERT INTO Reviews(UserId, BookId, Header, Review, Types)
                  VALUES ($userId, $bookId, '$header', '$review', '$rating')";

        return mysqli_query($db, $query);
    }

    public static function getPopularBooks()
    {
        $db = Db::getConnection();

        $query = "SELECT b.BookId, b.Name, b.Cover, Count(m.Mark)
                  FROM Books b, Marks m, Authors a
                  WHERE b.BookId = m.BookId
                  AND b.AuthorId = a.AuthorId
                  GROUP BY m.BookId
				  ORDER BY Count(m.Mark) DESC
				  LIMIT 0,6";

        return mysqli_query($db, $query)->fetch_all();
    }

    public static function existSimilarBook($firstId, $secondId)
    {
        $db = Db::getConnection();

        $query = "SELECT * FROM SimilarBooks
                  WHERE FirstBook = $firstId
                  AND SecondBook = $secondId";

        $result = mysqli_query($db, $query)->fetch_row();

        if (isset($result)) {
            return true;
        }
        return false;
    }

    public static function addSimilarBook($firstId, $secondId) {
        $db = Db::getConnection();

        $query = "INSERT INTO SimilarBooks (FirstBook, SecondBook) VALUES ('$firstId', '$secondId')";

        $result = mysqli_query($db, $query);

        return $result;
    }


}

?>