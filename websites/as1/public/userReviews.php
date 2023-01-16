<?php
session_start();
include './extras/header.php';
include './extras/dbconnect.php';

if(isset($_POST['auction_id']) && isset($_POST['review_desc'])){
    $auction_id = $_POST['auction_id'];
    $review_desc = $_POST['review_desc'];
    $Query=$pdo->prepare("INSERT INTO review (auction_id, review_desc) VALUES (:auction_id, :review_desc)");
    $Query->bindValue(':auction_id', $auction_id);
    $Query->bindValue(':review_desc', $review_desc);
    $Query->execute();
    echo "Review submitted successfully!";
} else {
    echo "Error: Missing review information.";
}

include './extras/footer.php';
?>
