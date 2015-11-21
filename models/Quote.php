<?php

class Quote
{
    public static function getRandomQuote($count)
    {
        $db = Db::getConnection();

        $query = "SELECT Quote, FullName FROM Quotes q
                  INNER JOIN Books b
                  INNER JOIN Authors a
                  ON q.BookId = b.BookId
                  AND a.AuthorId = b.AuthorId ORDER by rand() LIMIT 0,$count";

        return mysqli_query($db, $query)->fetch_all();
    }
}

?>