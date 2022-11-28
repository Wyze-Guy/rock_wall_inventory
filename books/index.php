
<?php
session_start();
require('../model/books_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
   $action = filter_input(INPUT_GET, 'action');
   if ($action == NULL) {
       $action = 'list_all_books';
   }
}

if ($action == 'list_all_books') {
   $books = get_all_books();
   include('books_lists_all.php');
} 
else if ($action == 'list_available_books') {
    $books = get_availible_books();
   include('books_list_availible.php');
}
