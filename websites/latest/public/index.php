<?php
include 'header.php';
include 'config.php';

$msql = $pdo->prepare('SELECT * FROM auction LIMIT 10');
$msql->execute();

echo'
<h1> Latest Listings </h1>
<ul class="productList">';
while($Auctionrow = $ql->fetch()){

$msql2 = $pdo->prepare('SELECT name FROM category WHERE category_id = '.$Auctionrow['category_id'].)
$msql2->execute();
$categName = $msql2->fetch();
echo'
<li>
<img src ="product.png" alt= "product name"
<article>';

echo'<h2>'.$auctionrow['title'].'</h2>';
echo'<h3>'.$categname['name'].'</h3>';
echo'<p>'.$auctionrow['description'].'</p>';
echo'<p class="price">Current bid: £123.45</p>';
echo'<a href="auction.php?id='.$Auctionrow['auction_id'].'"class="more auctionLink">
echo'</article>
</li>';

}

<?php
include 'footer.php';
?>




















