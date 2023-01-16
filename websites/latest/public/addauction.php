<?php
include 'header.php';
include 'configure.php';
?>

<form action="addauction.php" method="POST">
<label>Auction</label> <input type="Add auction"/>
<label>Title</label> <input type="Title"/>
<label>Description</label> <input type="Description"/>
<label>Category_id</label> <input type="Category_id"/>
<label>End date</label> <input type="End date"/>

<input type="submit" value="Add auction" name="addauction"/>


</form>

<?php


if(isset($_POST['login'])){

$stmt = $pdo->prepare('SELECT user WHERE email = :email AND password = :password');
$values = [
'email' => $_POST['EMAIL'],
'password' => $_POST['password']

];
$stmt->execute($values);

if ($tmt->rowCount() > 0){

$_SESSION['loggedin'] = true;
echo 'You have successfully logged in';

}
else{
    echo 'You have entered the incorrect username or password';
}

}
?>













