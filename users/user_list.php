<?php include '../view/header.php'; ?>
<main>
    <section>
        <h1>All Users</h1>
        <table style = "border: 1px solid black">
        <tr>
        <td>firstname</td> 
        <td>lastname</td>
        <td>Email</td>
        <td>Action</td>   
        </tr>
        <?php foreach($users as $user): ?>
        <tr>
            <td><?=$user['first_name']?></td>
            <td><?=$user['last_name']?></td>
            <td><?=$user['email']?></td>
            <td><a href="../checkouts/index.php?action=checked_out_by_user&user_id=<?=$user['user_id']?>">Books Checked Out</a></td>
        </tr>
        <?php endforeach;?> 

        </table>
    </section>
</main>
<?php include '../view/footer.php';?>
