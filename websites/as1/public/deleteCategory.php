<?php
session_start();
include './extras/header.php';
include './extras/dbconnect.php'; 
if (isset($_SESSION['loggedin'])) {
    ?>
    <form action="deletecategory.php" method="POST">
    <label>category ID</label> <input type="text" name="categoryId" />
    <label>category Name</label> <input type="text" name="name" />
    <input type="submit" value="delete" name="delete" />
</form>
li><a href="categorylist.php"> Category page</a></li>';

<?php
if(isset($_POST['delete'])){
    $query = $pdo->prepare('DELETE FROM category
    WHERE name = :name AND categoryId = :categoryId');

    $values = [
        'name'=> $_POST['name'],
        'categoryId'=> $_POST['categoryId']
        
    ];

    $query->execute($values);
    echo'category has been deleted';
}
}else {
echo 'Sorry, you must be logged in to view this page.';
}

include './extras/footer.php';
?>