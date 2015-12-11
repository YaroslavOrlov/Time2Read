<?php

return array(

    'user/registration' => 'user/registration',
    'user/login' => 'user/login',
    'user/edit' => 'user/edit',
    'support' => 'support/contact',
    'author/author/([1-9]+)' => 'author/author/$1',
    'book/book/([1-9]+)' => 'book/book/$1',
    'book/book' => 'book/book/1',
    'book/AddSimilar/([1-9]+)' => 'book/AddSimilar/$1',
    'book/similar' => 'book/similar',
    'book/search' => 'book/search',
    'book/AlreadyRead/([1-9]+)' => 'book/AlreadyRead/$1',
    'book/Reading/([1-9]+)' => 'book/Reading/$1',
    'book/WantRead/([1-9]+)' => 'book/WantRead/$1',
    'book/RemoveUserBook/([1-9]+)' => 'book/RemoveUserBook/$1',
    'book/AddReview' => 'book/AddReview',
    'book/marked/([0-9]+)/([1-5])'=>'book/marked/$1/$2',
    'quote/quotes' => 'quote/quotes',
    'quote/next' => 'quote/next',
    'quote/remove/([1-9]+)' => 'quote/remove/$1',
    'quote/like/([1-9]+)' => 'quote/like/$1',
    'user/logout' => 'user/logout',
    'user/profile' => 'user/profile',
    'home/popular' => 'home/popular',
    'home/collection' => 'home/collection',
    'home' => 'home/home',
    '' => 'home/home'
);

?>