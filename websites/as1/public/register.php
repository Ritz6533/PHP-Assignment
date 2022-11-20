<?php
session_start();
include './extras/header.php';
include './extras/dbconnect.php';
?>

<form action="register.php" method="POST">
    <label>username</label> <input type="text" name="username" />
    <label>email</label> <input type="email" name="email"/>
    <label>password</label> <input type="password" name="password"/>
    <input type="submit" value="register" name="register" />
</form>

<?php
if(isset($_POST['register'])){
    $query = $pdo->prepare('INSERT INTO user(username, email, password)
    VALUES( :username, :email, :password)');

   // $password = $_POST['password'];

   // $hash = password_hash($password, PASSWORD_DEFAULT);


    $values = [
        'username'=> $_POST['username'],
        'password'=> sha1($_POST['password']),
        'email'=> $_POST['email']
    ];
    $query->execute($values);
    echo'You have been registered';
    echo'<li><a href="login.php"> Proceed to login</a></li>';

}
include './extras/footer.php';
?>