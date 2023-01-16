<?php
session_start();
include './extras/header.php';
include './extras/dbconnect.php'; 
if (isset($_SESSION['loggedin'])) { 

if(isset($_POST['auction_id']) && isset($_POST['bidAmount'])){
    $auction_id = $_POST['auction_id'];
    $bid_amount = $_POST['bidAmount'];
    $query = $pdo->prepare("INSERT INTO bids (auction_id, bidAmount) VALUES (:auction_id, :bidAmount)");
    $query->bindValue(':auction_id', $auction_id);
    $query->bindValue(':bidAmount', $bid_amount);
    if($query->execute()){
        echo "Bid placed successfully!";
    } else {
        echo "An error occurred, please try again later.";
    }
}
else {
    echo "Invalid request.";}}
     else {
    echo "Please login to bid.";
}
?>
