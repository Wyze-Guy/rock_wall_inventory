<?php
session_start();
include 'view/header.php';
?>
<main>
   <h1>Menu</h1>
   <ul>
       <li>
           <a href="users">Users</a>
       </li>
       <li>
           <a href="books">Books</a>
       </li>
       <li>
           <a href="checkouts/index.php?action=list_available_books">Checkout</a>
       </li>
       <li>
           <a href="waitlists">Waitlist</a>
       </li>
   </ul>
</main>
<?php include 'view/footer.php'; ?>