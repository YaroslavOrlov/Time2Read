<?php

class AuthorController
{
    public function actionAuthor($id)
    {
        $author = Author::getAuthorById($id);

        $books = Author::getAuthorBooks($id);

        require_once(ROOT. '/views/author/author.php');

        return true;
    }
}

?>