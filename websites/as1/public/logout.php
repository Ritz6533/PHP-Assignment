<?php session_start(); ?>

<?php include './extras/header.php';;  
// ob_start();
///if the logout.php page executed the following wiil be executed if thes session is login
if (isset($_SESSION['loggedin'])) {
     session_destroy();//session willl destroyed
     unset($_SESSION['loggedin']);//unsetting session login
     echo'<li><a href="categoryMenu.php"> go back</a></li>';

}
?>
<h1>You have been sucessfully logged out!!</h1>
<a href="index.php"> home page</a>