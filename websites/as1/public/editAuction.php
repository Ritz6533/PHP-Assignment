<?php
session_start();
include './extras/header.php';
include './extras/dbconnect.php'; 
if (isset($_SESSION['loggedin'])) {
?>
<main>

<h1>EDIT AUCTIONS</h1>
<p style="float:right;"><a href="addauction.php"> Add Auction</p>
<p style="float:right;"><a href="deleteauction.php"> Delete </a></p>
<form action="editauction.php" method="POST" >
<label for = "auction">Auction Title</label>

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

<label>New Auction Title</label> <input name="title" type="text"/>
<label>End Date</label> <input name="endDate" type="date"/>
<label>Description</label> <textarea name="description" style="width: 438px; height: 249px;" ></textarea>
<label for = "category">Category</label>



<?php
$stmt = $pdo->prepare('SELECT * FROM category');

$stmt->execute();
echo '<select name="categoryId">';
while ($category =$stmt->fetch())
{
    echo '<option value="'. $category['categoryId']. '">'.$category['name'].'</option>';
}
echo '</select>';
?>
<input name="submit" type="submit" value="Submit" />
</form>
<?php

    if(isset($_POST['submit'])){
        $query = $pdo->prepare('UPDATE auction
                            SET title = :title, endDate = :endDate, description= :description, categoryId=:categoryId
                            WHERE auction_id = :auction_id');

    $values = [
        'title'=> $_POST['title'],
        'endDate'=> $_POST['endDate'],
        'description'=> $_POST['description'],
        'categoryId'=> $_POST['categoryId'],
        'auction_id'=> $_POST['auction_id']
    ];
    $query->execute($values);
    echo'Auction is sucessfully edited';
    }

    }
 else {
echo 'Sorry, you must be logged in to view this page.';
}

include './extras/footer.php';
?>
