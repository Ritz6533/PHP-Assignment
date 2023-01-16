<?php
session_start();
include './extras/header.php';
include './extras/dbconnect.php'; 
if (isset($_SESSION['loggedin'])) {

?>
    <main>

    <h1>DELETE AUCTION</h1>
 <p style="float:right"><a href="editadmin.php">edit admins</a></p>
 <p style="float:right"><a href="addadmin.php">add </a></p>
    <form action="deleteauction.php" method="POST">
    <label for = "auction">Auction Name</label>
    <?php
$stmt = $pdo->prepare('SELECT * FROM auction');

$stmt->execute();
echo '<select name="auction_id">';
while ($auction =$stmt->fetch())
{
    echo '<option value="'. $auction['auction_id']. '">'.$auction['title'].'</option>';
}
echo '</select>';
?>

    <input type="submit" value="DELETE" name="submit" />
</form>

<?php

if(isset($_POST['submit'])){
    $query = $pdo->prepare('DELETE FROM auction WHERE  auction_id = :auction_id');

$values = [
    'auction_id' => $_POST['auction_id']
                
];
$query->execute($values);
echo'Auction is sucessfully deleted';
}

    }
 else {
echo 'Sorry, you must be logged in to view this page.';
}

include './extras/footer.php';
?>