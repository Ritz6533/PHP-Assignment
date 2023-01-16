<?php
include 'header.php';
include 'configure.php';
?>

<?php

$msql = $pdo->prepare('SELECT * FROM category LIMIT 5')
$msql->execute();

echo'
<h1>category List</h1>
<ul class="categoryList">';
while ($Auctionrow = $msql->fetch()){
$msql = $pdo->prepare('SELECT name FROM category WHERE category_id = '.$Auctionrow['category_id'].'');
$msql->execute();
$categName = $msql2->fetch();
echo'    <li>
<article>';
echo '<h3>'.$categName['name'].'</h3>';
echo'</article>
</li>';
}

?>