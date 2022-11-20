<?php
session_start();
include './extras/header.php';
include './extras/dbconnect.php'; 
if (isset($_SESSION['loggedin'])) {
    ?>
     <a href="admincategories.php"> Admin Lists</a>

    <ul>
    <?php
        $query = $pdo->prepare('SELECT * FROM user');
    
        $query->execute();
    
        foreach($query as $row){
    
            echo '<h2>EMAIL--' . $row['email'] . '</h2>';
            echo '<h2>USERNAME--' . $row['username'] . '</h2>';
            echo '<h2>PASSWORD--' . $row['password'] . '</h2>';
            echo '<li><a href="deleteadmin.php">delete </a></li>';
            echo '<li><a href="editadmin.php">edit </a></li>';
    
        }
    
    }
    else {
        echo'Unauthorized accesss!! access denied';
        echo'<li><a href="login.php"> Please Login To View This Page</a></li>';
    }
    include './extras/footer.php';
    ?>