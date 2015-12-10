<?php

class Quote
{
    public static function getRandomQuote($count)
    {
        $db = Db::getConnection();

        $user_id = User::validLogged();

        $query = "SELECT $user_id, QuoteId, Quote, FullName FROM Quotes q
                  INNER JOIN Books b
                  INNER JOIN Authors a
                  ON q.BookId = b.BookId
                  AND a.AuthorId = b.AuthorId ORDER by rand() LIMIT 0,$count";

        return mysqli_query($db, $query)->fetch_all();
    }

    public static function removeQuote($quoteId, $userId)
    {
        $db = DB::getConnection();

        $query = "DELETE FROM UserQuotes
                  WHERE UserId = $userId
                  AND QuoteId = $quoteId";

        return mysqli_query($db, $query)->fetch_all();

    }

    public static function existUserQuote($quoteId, $userId)
    {
        $db = Db::getConnection();

        $query = "SELECT * FROM UserQuotes
                  WHERE UserId = $userId
                  AND QuoteId = $quoteId";

        $result = mysqli_query($db, $query)->fetch_row();

        if (isset($result)) {
            return true;
        }
        return false;
    }

    public static function addQuote($quoteId, $userId)
    {
        $db = DB::getConnection();

        $query = "INSERT INTO UserQuotes (QuoteId, UserId) VALUES ('$quoteId', '$userId')";

        $result = mysqli_query($db, $query);

        return $result;

    }
}

?>