<?php include '../view/header.php'; ?>
<main>
   <section>
       <h1><?=$message?></h1>
       <table style="border: 1px solid black">
        <tr>
         <td>Title</td>
         <td>Author</td>
         <td>Checkout Date</td>
         <td>Due Date</td>
        </tr>
       <tr>
        <td width="400"><?=$book['title']?></td>
        <td width="400"><?=$book['authors']?></td>
        <td width="400"><?=$book['checkout_date']?></td>
        <td width="400"><?=$book['due_date']?></td>
       </tr>
       </table>

       <h1>Books currently checked out</h1>
       <table style="border: 1px solid black">
           <tr>
            <td>Title</td>
            <td>Author</td>
            <td>Checkout Date</td>
            <td>Due Date</td>
           </tr>
           <?php foreach($checked_out_books as $checked_out_book): ?>
       <tr>
       <td width="400"><?=$checked_out_book['title']?></td>
        <td width="400"><?=$checked_out_book['authors']?></td>
        <td width="400"><?=$checked_out_book['checkout_date']?></td>
        <td width="400"><?=$checked_out_book['due_date']?></td>
       </tr>
       <?php endforeach;?>
       </table>
   </section>
</main>
<?php include '../view/footer.php';?>
