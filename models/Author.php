<?php

class Author
{
    public static function getAuthorBooks($id)
    {
        $db = Db::getConnection();

        $query = "SELECT b1.BookId, b1.Name,
                  COUNT(m1.BookId), SUM(m1.Mark)
                  FROM  Books b1
                  RIGHT JOIN Marks m1
                  ON b1.BookId = m1.BookId
                  WHERE b1.AuthorId = $id
                  GROUP BY m1.BookId
                  UNION ALL
                  SELECT b2.BookId, b2.Name,
                  0,0
                  FROM Books b2
                  WHERE b2.AuthorId = $id
                  AND b2.BookId NOT IN
                  (SELECT BookId FROM Marks)";


        return mysqli_query($db, $query)->fetch_all();

    }

    public static function getAuthorById($id)
    {
        $db = Db::getConnection();

        $query = "SELECT * FROM Authors WHERE AuthorId = $id";

        return mysqli_query($db, $query)->fetch_row();
    }
}

?>