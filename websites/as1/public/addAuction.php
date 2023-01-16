<?php
session_start();
include './extras/header.php';
include './extras/dbconnect.php'; 
if (isset($_SESSION['loggedin'])) {

    ?>
    <main>

    <h1>ADD AUCTIONS</h1>
    <p style="float:right;"><a href="editauction.php"> Edit Auction</p>
    <p style="float:right;"><a href="deleteauction.php"> Delete </a></p>

    <form action="addAuction.php" method="POST" enctype="multipart/form-data">
<label>Title</label> <input name="title" type="text" placeholder="Auction Title"/>
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
</form><?php

if (isset($_POST['submit'])) {
        $query = $pdo->prepare('INSERT INTO auction(title,endDate,description,categoryId)
        VALUES( :title, :endDate, :description, :categoryId)');
    
        $values = [
            'title'=> $_POST['title'],
            'endDate'=> $_POST['endDate'],
            'description'=> $_POST['description'],
            'categoryId'=> $_POST['categoryId']
        ];
    
        $query->execute($values);
        echo' Auction sucessfully added';
        echo'<li><a href="auction.php"> Go to Auction Page</a></li>';

    }
}
else {
    echo'Unauthorized accesss!! access denied';
    echo'<li><a href="login.php"> Please Login To View This Page</a></li>';
}
include './extras/footer.php';
?>