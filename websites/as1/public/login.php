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
<main>

<h1>USER LOGIN</h1>
<form action="login.php" method="POST">
    <label>email</label> <input type="email" name="email"/>
    <label>password</label> <input type="password" name="password"/>
    <input type="submit" value="Login" name="login" />
</form>


<?php
// Check the username and password in the database
if(isset($_POST['login'])){
    $stmt = $pdo->prepare('SELECT * FROM user WHERE email = :email');
    $values = [
        'email' => $_POST['email']
    ];
    $stmt->execute($values);
    if($stmt->rowCount()>0){
        $user = $stmt->fetch();
        if (password_verify($_POST['password'], $user['password'])) {
            $_SESSION['loggedin'] = true;
            echo 'You are now logged in';
        }
        else {
            echo '<p>Sorry, your email and password could not be found</p>';
            echo'<br><a href="register.php"> Register to make a new account!!</a>';
        }
    }else{
        echo '<p>Sorry, your email and password could not be found</p>';
        echo'<br><a href="register.php"> Register to make a new account!!</a>';
        }
}
}