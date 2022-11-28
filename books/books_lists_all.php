<?php include '../view/header.php'; ?>
<main>
   <section>
       <h1>All Books</h1>
       <table style="border: 1px solid black">
       <tr>
        <td>Title</td>
        <td>Author</td>
        <td>Action</td>
       </tr>

       <?php foreach($books as $book): ?>
       <tr>
        <td width="400"><?=$book['title']?></td>
        <td width="200"><?=$book['authors']?></td>
        <td >Edit | Delete </td>
       </tr>
       <?php endforeach;?>
      <tr></tr>
       </table>
       <?php //var_dump($books); ?>
   </section>
</main>
<?php include '../view/footer.php'; ?>
