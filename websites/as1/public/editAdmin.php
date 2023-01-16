<?php
session_start();
include './extras/header.php';
include './extras/dbconnect.php'; 
if (isset($_SESSION['loggedin'])) {

?><main>

<h1>EDIT ADMIN</h1>
 <p style="float:right"><a href="deleteadmin.php">delete admins</a></p>
 <p style="float:right"><a href="addadmin.php">add </a></p>
    <form action="editadmin.php" method="POST">
    <label for = "user">User Names</label>
    <?php
$stmt = $pdo->prepare('SELECT * FROM user');

$stmt->execute();
echo '<select name="username">';
while ($user =$stmt->fetch())
{
    echo '<option value="'. $user['username']. '">'.$user['email'].'</option>';
}
echo '</select>';
?>

    <label>Admin Email</label> <input type="text" name="email" />
    <label>New password</label> <input type="password" name="password" />
    <input type="submit" value="submit" name="submit" />
</form>



<?php

if(isset($_POST['submit'])){
    $query = $pdo->prepare('UPDATE user
                        SET password = :password, email = :email
                        WHERE username = :username');

$values = [
                'username' => $_POST['username'],
                'password' => password_hash($_POST['password'], PASSWORD_DEFAULT), // use password_hash() function to hash the password
                'email' => $_POST['email']
];
$query->execute($values);
echo'User email and password is sucessfully updated';
}

    }
 else {
echo 'Sorry, you must be logged in to view this page.';
}

include './extras/footer.php';
?>