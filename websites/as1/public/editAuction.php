<?php
session_start();
include './extras/header.php';
include './extras/dbconnect.php'; 
if (isset($_SESSION['loggedin'])) {
    echo'<br><a href="auction.php"> Auction Menu</a>';
?>

<form action="editAuction.php" method="POST" enctype="multipart/form-data">
<label>Title</label> <input name="title" type="text" placeholder="Auction Title"/>
<label>New End Date</label> <input name="endDate" type="date"/>
<input name="submit" type="submit" value="Submit" />
</form>
    <?php

    if(isset($_POST['edit'])){
        $query = $pdo->prepare('UPDATE auction
                            SET endDate = :endDate, title = :title
                            WHERE title = :title');


    $values = [
        'endDate' => $_POST['endDate']
    ];
    $query->execute($values);
    echo'Auction Date sucessfully edited';
    }

    }
 else {
echo 'Sorry, you must be logged in to view this page.';
}

include './extras/footer.php';
?>