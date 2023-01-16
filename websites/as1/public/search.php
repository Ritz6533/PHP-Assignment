<?php 
session_start();
include './extras/header.php';
include './extras/dbconnect.php';

if(isset($_GET['submit'])){
  $search = $_GET['search'];

  $query = $pdo->prepare("SELECT auction.*, category.name as category_name,
      (SELECT MAX(bidAmount) FROM bids WHERE bids.auction_id = auction.auction_id) as highest_bid
      FROM auction
      JOIN category ON auction.categoryId = category.categoryId
      WHERE title LIKE :search OR description LIKE :search
      ORDER BY endDate DESC ");
  $query->execute(array(':search' => "%$search%"));

}
else{
  $query = $pdo->prepare("SELECT auction.*, category.name as category_name,
      (SELECT MAX(bidAmount) FROM bids WHERE bids.auction_id = auction.auction_id) as highest_bid
      FROM auction
      JOIN category ON auction.categoryId = category.categoryId
      ORDER BY endDate DESC ");
  $query->execute();
}

?>

<main>
  <h1>Search Results</h1>
  <form action="auction.php" method="get">
    <input type="text" name="search" placeholder="Search for auctions">
    <input type="submit" name="submit" value="Search">
  </form>

  <?php
  if($query->rowCount()>0){
    foreach($query as $auction){
  ?>

  <ul class="productList">
    <li>
      <img src="product.png" alt="product name">
      <article>
        <h2><?php  echo $auction['title'] ?></h2><br>
        <h3><?php echo $auction['category_name'];  ?></h3><br>
        <h3><?php echo $auction['endDate'];  ?></h3><br>
        <p><?php echo $auction['description'];  ?></p>

        <p class="price">Current bid:<?php echo $auction['highest_bid'];  ?></p>
        <?php echo '<a href="viewProduct.php?id='.$auction['auction_id'].'" class="more auctionLink" >More &gt;&gt;</a>'; ?>
      </article>
    </li>
  </ul>

  <?php
    }
  }
  else{
    echo 'No results found';
  }
  include './extras/footer.php';
  ?>
