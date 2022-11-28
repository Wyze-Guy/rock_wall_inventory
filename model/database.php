<?php
   $dsn = 'mysql:host=localhost;dbname=rock_wall_db';
   $username = 'rock_wall_admin';
   $password = 'INFO4430ROCKWALL';
  
   try {
       $db = new PDO($dsn, $username, $password);
   } catch (PDOException $e) {
       $error_message = $e->getMessage();
       echo 'Error Message ' . $error_message;
       exit();
   }
?>