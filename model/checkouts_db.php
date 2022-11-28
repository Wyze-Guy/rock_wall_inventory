<?php
require('database.php');

function get_equipment_checked_out(){
 global $db;
 $query= 'SELECT CheckoutID, CheckoutDate, authors FROM books';
 $statement = $db->prepare($query);
 $statement->execute();
 $equipment =$statement->fetchAll();
 $statement-> closeCursor();
 return $books;
}











function get_books_checked_out(){
 global $db;
 $query= 'SELECT book_id,title, authors FROM books WHERE';
 $statement = $db->prepare($query);
 $statement->execute();
 $books =$statement->fetchAll();
 $statement-> closeCursor();
 return $books;
}

function check_out_book($user_id,$book_id){
    global $db;
    $query1= 'SELECT book_id
        FROM checkouts
        WHERE book_id = :book_id' ;
    $statement1 = $db->prepare($query1);
    $statement1->bindParam(':book_id', $book_id);
    $statement1->execute();
    $books =$statement1->fetch();
    $already_checked_out = $statement1->rowCount()>0;
    $statement1-> closeCursor();
    if(!$already_checked_out){
        $query2 = 'INSERT INTO checkouts (user_id, book_id, checkout_date, due_date)
        VALUES(:user_id, :book_id, now(), now() +INTERVAL 45 DAY)';
        $statement2 =$db->prepare($query2);
        $statement2->bindParam(':user_id', $user_id);
        $statement2->bindParam(':book_id', $book_id);
        $statement2 ->execute();
        return $statement2 ->rowCount();
    }else{
    return 0;
    }
}
function get_book_info($book_id){
    global $db;
    $query= 'SELECT b.book_id, b.title, b.authors,c.checkout_date, c.due_date
    FROM books b 
    JOIN checkouts c ON b.book_id = c.book_id
    WHERE b.book_id = :book_id';
    $statement = $db->prepare($query);
    $statement->bindParam(':book_id',$book_id);
    $statement->execute();
    $book =$statement->fetch();
    $statement-> closeCursor();
    return $book;
}

function get_checked_out_books($user_id){
    global $db;
    $query= 'SELECT b.book_id, b.title, b.authors, c.checkout_date, c.due_date
    FROM books b 
    JOIN checkouts c ON b.book_id = c.book_id
    JOIN users u ON c.user_id = u.user_id
    WHERE u.user_id =:user_id' ;
    $statement = $db->prepare($query);
    $statement->bindParam(':user_id',$user_id);
    $statement->execute();
    $checked_out_books =$statement->fetchAll(PDO::FETCH_BOTH);
    $statement-> closeCursor();
    return $checked_out_books;
}
function get_user_info($user_id){
    global $db;
    $query= 'SELECT user_id, first_name, last_name, email
    FROM users
    WHERE user_id= :user_id' ;
    $statement = $db->prepare($query);
    $statement->bindParam(':user_id',$user_id);
    $statement->execute();
    $user =$statement->fetch();
    $statement-> closeCursor();
    return $user;
}
