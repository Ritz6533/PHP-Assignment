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