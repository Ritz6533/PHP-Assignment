<?php
include ' configure.php';
unset($_SESSION['logged']);

echo 'you are logged out
<a href="logincheck.php">go to logincheck.php</a>';
?>
