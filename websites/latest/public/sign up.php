<?php
include 'header.php';
include 'configure.php';
?>

<form action="sign up.php" method="POST">
<label>firstname</label> <input text="firstname" name= "firstname"/>
<label>surname</label> <input text="surname" name= "surname"/>
<label>email</label> <input type="email" name= "email address"/>
<label>password</label> <input type="password" name= "password"/>
<input type="submit" value="signup" name= "signup"/>

</form>

<?php
if(isset($_POST['sign up'])){
$msql = $pdo->prepare('INSERT INTO user(name, email, password)
VALUES(:name, :email, :password)');

$values = [ 
'name'=> $_POST['name'],
'email'=> $_POST['email'],
'password'=> $_POST['password'],
];

$msql->execute($values);
echo 'user has been registerd';
}
?>
<?php
include 'footer.php';
?>

