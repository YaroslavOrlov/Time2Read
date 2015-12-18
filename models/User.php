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

    public static function updateUser($userId, $login, $email, $password, $avatar)
    {
        $db = Db::getConnection();
        $query = "UPDATE Users SET Login='$login',Email='$email',Password='$password',Avatar='$avatar'
                  WHERE UserId = $userId";

        return mysqli_query($db, $query);

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

        $query = "SELECT b.Name, r.Review, m.Mark,
                  b.BookId, r.Header, r.Types
                  FROM Reviews r, Books b, Marks m
                  WHERE b.BookId = m.BookId
                  AND r.BookId = b.BookId
                  AND r.UserId = $userId
                  GROUP BY m.BookId
                  UNION
                  SELECT b.Name, '', m.Mark,
                  b.BookId, '', ''
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

        $result = mysqli_query($db, $query)->fetch_array();
        return $result[0];
    }

    public static function countUserBooks($userId, $category)
    {
        $db = DB::getConnection();

        $query = "SELECT COUNT(UserId)
                  FROM UserBooks
                  WHERE UserId = $userId
                  AND Category = $category";

        $result = mysqli_query($db, $query)->fetch_array();
        return $result[0];
    }

    public static function countUserQuotes($userId) {
        $db = DB::getConnection();

        $query = "SELECT COUNT(QuoteId)
                  FROM UserQuotes
                  WHERE UserId = $userId";

        $result = mysqli_query($db, $query)->fetch_array();
        return $result[0];
    }

    public static function countUserRate($userId) {
        $db = DB::getConnection();

        $query = "SELECT COUNT(UserId)
                  FROM Marks
                  WHERE UserId = $userId";

        $result = mysqli_query($db, $query)->fetch_array();
        return $result[0];
    }

    public static function getUserAchieves($userId)
    {
        $db = DB::getConnection();

        $query = "SELECT a.Name, a.Description, a.Cover
                  FROM Achieves a, UnlockedAchieves ua
                  WHERE ua.UserId = $userId
                  AND a.AchieveId = ua.AchievesId";

        return mysqli_query($db, $query)->fetch_all();
    }

    public static function existUserAchieve($userId, $achieveId) {
        $db = Db::getConnection();

        $query = "SELECT COUNT(UserId)
                  FROM UnlockedAchieves
                  WHERE UserId = $userId
                  AND AchievesId = $achieveId";
        $result = mysqli_query($db, $query)->fetch_array();
        return  $result[0];
    }

    public static function addUserAchieve($userId, $achieveId) {
        $db = Db::getConnection();

        $query = "INSERT INTO UnlockedAchieves(UserId, AchievesId)
                  VALUES ($userId, $achieveId)";

        $result = mysqli_query($db, $query);

        User::updateUserLevel($userId);

        return $result;
    }

    public static function getUserRate($userId, $mark) {
        $db = DB::getConnection();

        $query = "SELECT BookId
                  FROM Marks
                  WHERE UserId = $userId
                  AND Mark = $mark";

        return mysqli_query($db, $query)->fetch_all();
    }

    public static function getUserRecommends($userId) {
        $topRated = User::getUserRate($userId, 5);
        $recommends = array();
        foreach($topRated as $bookId) {
            $similar = Book::getSimilarBooks($bookId[0]);
            foreach ($similar as $book) {
                array_push($recommends, $book);
            }
        }
        return $recommends;
    }

    public static function getUserLogin($userId)
    {
        $db = DB::getConnection();

        $query = "SELECT Login, UserId, Avatar, Email
                  FROM Users
                  WHERE UserId = $userId";

        return mysqli_query($db, $query)->fetch_array();
    }

    public static function getUserLevel($userId) {
        $db = DB::getConnection();

        $query = "SELECT l.Name
                  FROM Levels l, Users us
                  WHERE us.UserId = $userId
                  AND us.LevelId = l.LevelId";

        return mysqli_query($db, $query)->fetch_array();
    }

    public static function updateUserLevel($userId) {
        $db = DB::getConnection();

        $countAchieves = count(User::getUserAchieves($userId));

        $query = "SELECT LevelId
                  FROM Levels
                  WHERE AchievesQuantity = $countAchieves";

        $levelId = mysqli_query($db, $query)->fetch_array();

        if (isset($levelId)) {
            $query = "UPDATE Users SET LevelId = $levelId[0]
                      WHERE UserId = $userId";

            return mysqli_query($db, $query);
        }
    }

}

?>