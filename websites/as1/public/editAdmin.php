<?php
session_start();
include './extras/header.php';
include './extras/dbconnect.php'; 
if (isset($_SESSION['loggedin'])) {

?>
    <li><a href="admincategories.php"> Admin List</a></li>
    <form action="editadmin.php" method="POST">
    <label>Admin Email</label> <input type="text" name="email" />
    <label>New password</label> <input type="password" name="password" />
    <input type="submit" value="update" name="update" />
</form><?php

    if(isset($_POST['update'])){
        $query = $pdo->prepare('UPDATE user
                            SET  password = :password
                            WHERE email = :email');


    $values = [
        'email' => $_POST['email'],
        'password' => sha1($_POST['password'])
    ];
    $query->execute($values);
    echo'Password has been sucessfully Updated';
    }

    }
 else {
echo 'Sorry, you must be logged in to view this page.';
}

include './extras/footer.php';
?>