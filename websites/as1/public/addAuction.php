<?php
session_start();
include './extras/header.php';
include './extras/dbconnect.php'; 
if (isset($_SESSION['loggedin'])) {
    ?><h1>Add auction</h1>
    <form action="addAuction.php" method="POST" enctype="multipart/form-data">
<label>Title</label> <input name="title" type="text" placeholder="Auction Title"/>
<label>End Date</label> <input name="endDate" type="date"/>
<label>Description</label> <textarea name="description" style="width: 438px; height: 249px;" ></textarea>
<input name="submit" type="submit" value="Submit" />
</form><?php

if (isset($_POST['submit'])) {
        $query = $pdo->prepare('INSERT INTO auction(title,endDate,description)
        VALUES( :title, :endDate, :description)');
    
        $values = [
            'title'=> $_POST['title'],
            'endDate'=> $_POST['endDate'],
            'description'=> $_POST['description']
        ];
    
        $query->execute($values);
        echo'Auction sucessfully added';
        echo'<li><a href="auction.php"> Go to Auction Page</a></li>';

    }
}
else {
    echo'Unauthorized accesss!! access denied';
    echo'<li><a href="login.php"> Please Login To View This Page</a></li>';
}
include './extras/footer.php';
?>