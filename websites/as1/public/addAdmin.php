<?php
session_start();
include './extras/header.php';
if (isset($_SESSION['loggedin'])) {
    ?>

    <form action="addadmin.php" method="POST">
    <label>New username</label> <input type="text" name="username" />
    <label>Email</label> <input type="email" name="email"/>
    <label>Password</label> <input type="password" name="password"/>
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
    echo'user registered';
    echo'<li><a href="admincategories.php"> Admin List</a></li>';

}

} else {
    echo'Unauthorized accesss!! access denied';
    echo'<li><a href="login.php"> Please Login To View This Page</a></li>';
}
include './extras/footer.php';
?>