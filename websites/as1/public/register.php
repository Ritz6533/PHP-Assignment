<?php
session_start();
include './extras/header.php';
include './extras/dbconnect.php';
?>
<main>

<h1>REGISTER NEW USER</h1>
<form action="register.php" method="POST">
    <label>username</label> <input type="text" name="username" />
    <label>email</label> <input type="email" name="email"/>
    <label>password</label> <input type="password" name="password"/>
    <input type="submit" value="register" name="register" />
</form>

<?php
if(isset($_POST['register'])){
    $email = $_POST['email'];

    // check if email is valid
        $stmt = $pdo->prepare('SELECT email FROM user WHERE email = :email');
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch();

        if ($user) {
            echo '<p>The email address is already registered !</p>';
        } else {
            $query = $pdo->prepare('INSERT INTO user (username, email, password) VALUES (:username, :email, :password)');

            $values = [
                'username' => $_POST['username'],
                'password' => password_hash($_POST['password'], PASSWORD_DEFAULT), // use password_hash() function to hash the password
                'email' => $_POST['email']
            ];
            $query->execute($values);
            echo 'You have been registered';
            echo '<li><a href="login.php"> Proceed to login</a></li>';
        }
    }
include './extras/footer.php';
?>