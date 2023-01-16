<?php
session_start();
include './extras/header.php';
include './extras/dbconnect.php'; 
if (isset($_SESSION['loggedin'])) {

?>
    <main>

    <h1>DELETE ADMIN</h1>
 <p style="float:right"><a href="editadmin.php">edit admins</a></p>
 <p style="float:right"><a href="addadmin.php">add </a></p>
    <form action="deleteadmin.php" method="POST">
    <label for = "user">Admin Name</label>
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

    <input type="submit" value="DELETE" name="submit" />
</form>

<?php

if(isset($_POST['submit'])){
    $query = $pdo->prepare('DELETE FROM user WHERE  username = :username');

$values = [
    'username' => $_POST['username']
                
];
$query->execute($values);
echo'Admin  is sucessfully deleted';
}

    }
 else {
echo 'Sorry, you must be logged in to view this page.';
}

include './extras/footer.php';
?>