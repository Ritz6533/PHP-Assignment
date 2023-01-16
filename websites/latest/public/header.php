<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ibuy Auction</title>
    <link rel="stylesheet" href="ibuy.css" />
</head>
<body>
    <header>
<h1><span class="i">i</span><span class="b">b</span><span class="u">u</span><span class="y">y</span></h1>
<form action="#">
    <input type="text" name="search" placeholder="search for anything"/>
    <input type="submit" name="submit" value="search"/>
</form>

    </header>
    <nav>
<ul>
<li><a href="sign up.php" href="sign up.php">sign up</a></li>
<li><a href="login.php" href="login.php">login</a></li>


<?php
include 'configure.php';
$msql = $pdo->prepare('SELECT * FROM category');
$msql->execute();
while($categ = $msql->fetch()){
    echo'<li><a class= "categoryLink" href="category.php?id='.$categ['category_id'].'">'.$categ['name'].'</a></li>';
}
?>



</ul>





    </nav>
    
</body>
</html>