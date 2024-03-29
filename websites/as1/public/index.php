<?php session_start();
include './extras/header.php';
include './extras/dbconnect.php'; ?>


		<main>
			<h1>RECENT AUCTIONS</h1>
    
					<?php
				$Query=$pdo->prepare('SELECT auction.*, category.name as category_name,
				(SELECT MAX(bidAmount) FROM bids WHERE bids.auction_id = auction.auction_id) as highest_bid FROM auction
				JOIN category ON auction.categoryId = category.categoryId
				ORDER BY endDate DESC LIMIT 10 ');
						$Query->execute();
						 foreach($Query as $auction){
						?>
			
                <ul class="productList">
				<li>
					<img src="product.png" alt="product name">
					<article>
						<h2><?php  echo $auction['title'] ?></h2>
						<h3><?php echo $auction['endDate'];  ?></h3>
						<h3><?php echo $auction['category_name'];  ?></h3>
						<p><?php echo $auction['description'];  ?></p>

						<p class="price">Current bid:<?php echo $auction['highest_bid'];  ?></p>
						<?php echo '<a href="viewProduct.php?id='.$auction['auction_id'].'" class="more auctionLink" >More &gt;&gt;</a>'; ?>
					
					</article>
				</li>
						 </ul>
				 <?php
						 }
                        
                         include './extras/footer.php';
                         ?>