<?php
session_start();
if (isset($_SESSION['loggedin'])) {
echo 'You are already logged in';
} else {
    ?>
<?php
include './extras/header.php';
include './extras/dbconnect.php';
?>

<form action="login.php" method="POST">
    <label>email</label> <input type="email" name="email"/>
    <label>password</label> <input type="password" name="password"/>
    <input type="submit" value="Login" name="login" />
</form>


<?php

if(isset($_POST['login'])){
    $stmt = $pdo->prepare('SELECT * FROM user WHERE email = :email AND password = :password');
$values = [
'email' => $_POST['email'],
'password' => sha1($_POST['password'])
];

$stmt->execute($values);

    if ($stmt->rowCount() > 0) {
        $_SESSION['loggedin'] = true;
        echo 'You are now logged in';
    }
    else {
        echo 'Sorry, your email and password could not be found';
        echo'<br><a href="register.php"> Register to make a new account!!</a>';
    }
}
};