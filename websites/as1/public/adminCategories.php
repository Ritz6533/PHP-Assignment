<?php
session_start();
include './extras/header.php';
include './extras/dbconnect.php'; 
if (isset($_SESSION['loggedin'])) {
    ?>
    <main>

    <h1>ADMIN LIST</h1>
     <p style="float:right"><a href="deleteadmin.php">delete admins </a></p>
     <p style="float:right"><a href="editadmin.php">edit </a></p>
     <p style="float:right"><a href="addadmin.php">add </a></p>

    <ul>
    <?php
        $query = $pdo->prepare('SELECT * FROM user');
    
        $query->execute();
    
        foreach($query as $row){
    
            echo '<br><p>EMAIL--' . $row['email'] . '</p>';
            echo '<p>USERNAME--' . $row['username'] . '</p>';
            echo '<p>PASSWORD--' . $row['password'] . '</p>';
            
    
        }
    
    }
    else {
        echo'Unauthorized accesss!! access denied';
        echo'<li><a href="login.php"> Please Login To View This Page</a></li>';
    }
    include './extras/footer.php';
    ?>