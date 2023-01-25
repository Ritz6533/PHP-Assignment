<?php session_start();
include './extras/header.php';
include './extras/dbconnect.php';

if(isset($_GET['id'])){
    $auction_id = $_GET['id'];
    $Query=$pdo->prepare("SELECT auction.*, category.name as category_name, 
    (SELECT MAX(bidAmount) FROM bids WHERE bids.auction_id = auction.auction_id) as highest_bid FROM auction
				JOIN category ON auction.categoryId = category.categoryId 
    WHERE auction_id = :auction_id ");
    $Query->bindValue(':auction_id', $auction_id);
						$Query->execute();
    $auction = $Query->fetch();
    if($auction){
						?>
    <main>
    <p style="float:right;"><a href="addauction.php"> Add auction</a></p>
		<p style="float:right;"><a href="editauction.php"> Edit auction</a></p>
        <h1><?php echo $auction['title']; ?></h1>
					<img src="product.png" alt="product name">
                    <h3>Category: <?php echo $auction['category_name']; ?></h3><br>
                    <h4>Description:</h4><p><?php echo $auction['description']; ?></p><br>
        
                    <h3>End Date: <?php echo $auction['endDate']; ?></h3><br>
                    <h2 style="color:red">Current Bid:$ <?php echo $auction['highest_bid']; ?></h2>
   
    <form action="bid.php" method="post">
    <label for="bidAmount">Enter Bid Amount:</label>
    <input type="number" name="bidAmount">
    <input type="hidden" name="auction_id" value="<?php echo $auction_id; ?>">
    <input type="submit" value="Submit Bid">
    </form>
    <form action="userReviews.php" method="post">
    <label>Write a Review</label> <textarea name="review_desc" style="width: 438px; height: 149px;" ></textarea>
    <input type="hidden" name="auction_id" value="<?php echo $auction_id; ?>">
    <input type="submit" value="Submit Review" >
    </form><br>
				 <?php
                 $reviewQuery = $pdo->prepare("SELECT review_desc FROM review WHERE auction_id = :auction_id  ORDER BY review_desc DESC LIMIT 3");
                 $reviewQuery->bindValue(':auction_id', $auction_id);
                 $reviewQuery->execute();
                 $review = $reviewQuery->fetchAll();
                 if($review){
                     echo "<h3>Latest Reviews</h3>";
                     foreach($review as $review){
                         echo "<p>" . $review['review_desc'] . "</p><br>";
                     }
                 } else {
                     echo "No reviews found for this auction.";
                 }
    } else {
        echo "Auction not found";
						 }
                        }
                        
                         include './extras/footer.php';
                         ?>