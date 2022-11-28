<?php
session_start();
require('../model/checkouts_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
   $action = filter_input(INPUT_GET, 'action');
   if ($action == NULL) {
       $action = 'list_available_books';
   }
}

if ($action == 'list_available_books') {
   header('location:/rock_wall/books/index.php?action=list_available_books');
}
else if ($action == 'checkout') {
  $book_id= filter_input(INPUT_GET, 'book_id');
  $user_id= $_SESSION['user_id'];
  $message='';
   if(check_out_book($user_id,$book_id)==1){ 
    $message = 'Book sucessfully checked out';
   } else{
    $message= 'Book was already checked out';
   }
   $book= get_book_info($book_id);
   $checked_out_books= get_checked_out_books($user_id);

   include('books_checkouts.php');
}
else if($action == 'checked_out_by_user') {
   $user_id = filter_input(INPUT_GET, 'user_id');
   $user = get_user_info($user_id);
   $checked_out_books = get_checked_out_books($user_id);
   include('books_checkouts_by_user.php');
}
