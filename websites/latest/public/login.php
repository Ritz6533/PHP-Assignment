<?php
include 'header.php';
include 'configure.php';
?>

<?php
if(isset($_POST['login'])){
$stmt = $pdo->prepare('SELECT * FROM users WHERE email = :email AND password = :password');
$values = [
'email' => $_POST['email'],
'password' => $_POST['password']


];
$stmt->execute($values);

if ($stmt->rowCount() > 0) {
echo 'You have successfully logged in';

}
else {
echo 'You have entered the incorrect username or password';



};

}

?>
<form action="login.php" method="POST">
<label>email</label> <input type="email" name= "email address"/>
<label>password</label> <input type="password" name= "password"/>
<input type="submit" value="login" name= "login"/>
</form>


<?php
include 'footer.php'
?>


}




















