<?php
require('database.php');

function get_all_books(){
 global $db;
 $query= 'SELECT book_id,title, authors FROM books';
 $statement = $db->prepare($query);
 $statement->execute();
 $books =$statement->fetchAll();
 $statement-> closeCursor();
 return $books;
}

function get_availible_books(){
    global $db;
    $query= 'SELECT book_id,title, authors 
        FROM books
        WHERE book_id NOT IN(SELECT book_id FROM checkouts WHERE actual_return_date is NUll)';
    $statement = $db->prepare($query);
    $statement->execute();
    $books =$statement->fetchAll();
    $statement-> closeCursor();
    return $books;
}