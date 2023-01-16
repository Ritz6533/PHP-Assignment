<?php session_start(); ?>

<?php include './extras/header.php';;  
// ob_start();
///if the logout.php page executed the following wiil be executed if thes session is login
if (isset($_SESSION['loggedin'])) {
     session_destroy();//session willl destroyed
     unset($_SESSION['loggedin']);//unsetting session login
     echo'<p>You have been sucessfully logged out!!</p1>';
     echo'<a href="index.php"> home page</a>';
     
}
else{
     echo'<p>You are already logged out!!<p>';
     echo'<a href="login.php"> login</a>';}
?>
