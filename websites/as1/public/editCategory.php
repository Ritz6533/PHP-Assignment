<?php
session_start();
include './extras/header.php';
include './extras/dbconnect.php'; 
if (isset($_SESSION['loggedin'])) {
    echo'<br><a href="categorylist.php"> category Menu</a>';
?>

    <form action="editcategory.php" method="POST">
    <label>category ID</label> <input type="text" name="categoryId" />
    <label>New category Name</label> <input type="text" name="name" />
    <input type="submit" value="edit" name="edit" />
</form>
    <?php

    if(isset($_POST['edit'])){
        $query = $pdo->prepare('UPDATE category
                            SET name = :name, categoryId = :categoryId
                            WHERE categoryId = :categoryId');


    $values = [
        'categoryId' => $_POST['categoryId'],
        'name' => $_POST['name']
    ];
    $query->execute($values);
    echo'category sucessfully edited';
    }

    }
 else {
echo 'Sorry, you must be logged in to view this page.';
}

include './extras/footer.php';
?>