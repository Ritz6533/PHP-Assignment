<?php
session_start();
include './extras/header.php';
include './extras/dbconnect.php'; 
if (isset($_SESSION['loggedin'])) {
    echo'<br><a href="categorylist.php"> category Menu</a>';
     ?>

<form action="addCategory.php" method="POST">
<label>ID</label> <input type="text" name="categoryId" />

    <label>name</label> <input type="text" name="name" />

    <input type="submit" value="add" name="addCategory" />
</form>

<?php
if(isset($_POST['addCategory'])){
    $query = $pdo->prepare('INSERT INTO category(name,categoryId)
    VALUES( :name, :categoryId)');

    $values = [
        'name'=> $_POST['name'],
        'categoryId'=> $_POST['categoryId']
    ];

    $query->execute($values);
    echo'category sucessfully added';

}
}
else {
    echo'Unauthorized accesss!! access denied';
    echo'<li><a href="login.php"> Please Login To View This Page</a></li>';
}
include './extras/footer.php';
?>