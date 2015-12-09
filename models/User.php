<?php

class User
{

    public static function registration($login, $password, $email)
    {
        $db = Db::getConnection();
        $query = "INSERT INTO Users (Login, Email, Password) VALUES ('$login', '$email','$password')";

        $result = mysqli_query($db, $query);

        return $result;
    }

    public static function validEmail($email)
    {
        if (preg_match('/^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$/', $email)) {
            return true;
        }
        return false;
    }

    public static function existEmail($email)
    {
        $db = Db::getConnection();
        $query = "SELECT * FROM Users WHERE Email = '$email'";
        $result = mysqli_query($db, $query);
        return ($result->fetch_row() ? true : false);
    }

    public static function validPassword($password)
    {
        if (preg_match('/(?=^.{7,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/', $password)) {
            return true;
        }
        return false;
    }

    public static function equalPassword($password, $repeatPassword)
    {
        if ($password == $repeatPassword) {
            return true;
        }
        return false;
    }

    public static function validLogin($login)
    {
        if (preg_match('/^[a-zA-Z][a-zA-Z0-9-_\.]{1,8}$/', $login)) {
            return true;
        }
        return false;
    }

    public static function validUser($email, $password)
    {
        $db = Db::getConnection();

        $query = "SELECT * FROM Users WHERE Email = '$email' AND Password = '$password'";

        $user = mysqli_query($db, $query)->fetch_array();

        if ($user) {
            return $user['UserId'];
        }

        return false;
    }

    public static function auth($userId)
    {
        $_SESSION['user'] = $userId;
    }

    public static function logOut()
    {
        unset($_SESSION['user']);

        header("Location: /user/login");
    }

    public static function validLogged()
    {
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }

        header("Location: /user/login");
    }

    public static function returnUser()
    {
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }
    }

    public static function Logged()
    {
        if (isset($_SESSION['user'])) {
            return true;
        }
        return false;
    }

    public static function getUserBookReview($userId)
    {
        $db = DB::getConnection();

        $query = "SELECT b.Name, r.Review, m.Mark
                  FROM Reviews r, Books b, Marks m
                  WHERE b.BookId = m.BookId
                  AND r.BookId = b.BookId
                  AND r.UserId = $userId
                  GROUP BY m.BookId
                  UNION
                  SELECT b.Name, '', m.Mark
                  FROM Books b, Marks m
                  WHERE b.BookId = m.BookId
                  AND m.UserId = $userId";

        return mysqli_query($db, $query)->fetch_all();
    }

    public static function getUserQuotes($userId)
    {
        $db = DB::getConnection();

        $query = "SELECT uq.QuoteId, q.Quote, a.FullName
                  FROM Quotes q, Authors a, Books b, UserQuotes uq
                  WHERE uq.UserId = $userId
                  AND uq.QuoteId = q.QuoteId
                  AND q.BookId = b.BookId
                  AND b.AuthorId = a.AuthorId
                  GROUP BY  q.QuoteId";

        return mysqli_query($db, $query)->fetch_all();
    }

    public static function getUserLikeBook($userId, $category)
    {
        $db = DB::getConnection();

        $query = "SELECT b.BookId, b.Name, a.FullName, a.AuthorId, b.Cover
                  FROM Books b, Authors a, UserBooks ub
                  WHERE b.AuthorId = a.AuthorId
                  AND ub.UserId = $userId
                  AND ub.Category = $category
                  AND ub.BookId = b.BookId";

        return mysqli_query($db, $query)->fetch_all();
    }

    public static function countReviews($userId)
    {
        $db = DB::getConnection();

        $query = "SELECT COUNT(Review)
                  FROM Reviews
                  WHERE UserId = $userId";

        return mysqli_query($db, $query)->fetch_array();
    }

    public static function getAlreadyRead($userId)
    {
        $db = DB::getConnection();

        $query = "SELECT COUNT(UserId)
                  FROM UserBooks
                  WHERE UserId = $userId
                  AND Category = 3";

        return mysqli_query($db, $query)->fetch_array();
    }

    public static function getUserLogin($userId)
    {
        $db = DB::getConnection();

        $query = "SELECT Login
                  FROM Users
                  WHERE UserId = $userId";

        return mysqli_query($db, $query)->fetch_array();
    }

}

?>