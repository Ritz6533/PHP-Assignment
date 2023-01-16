<?php
session_start();
include './extras/header.php';
include './extras/dbconnect.php'; 
if (isset($_SESSION['loggedin'])) {
     ?>
<main>

<h1>ADD CATEGORY </h1>
<p style="float:right;"><a href="editCategory.php"> Edit </a></p>
<p style="float:right;"><a href="deleteCategory.php"> Delete </a></p>
<form action="addCategory.php" method="POST">
    <label>Category Name</label> <input type="text" name="name" />

    <input type="submit" value="add" name="addCategory" />
</form>

<?php
if(isset($_POST['addCategory'])){
    $query = $pdo->prepare('INSERT INTO category(name)
    VALUES( :name)');

    $values = [
        'name'=> $_POST['name']    ];

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