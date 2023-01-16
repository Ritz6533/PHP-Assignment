<?php
session_start();
include './extras/header.php';
include './extras/dbconnect.php'; 
if (isset($_SESSION['loggedin'])) {

?>
    <main>

<h1>EDIT CATEGORY LIST</h1>
<p style="float:right;"><a href="addCategory.php"> Add category</p>
<p style="float:right;"><a href="deleteCategory.php"> Delete </a></p>
    <form action="editCategory.php" method="POST">
    <label for = "category">Category Name</label>
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

    <label>New Category Name</label> <input type="text" name="name" />
    <input type="submit" value="submit" name="submit" />
</form>

<?php

if(isset($_POST['submit'])){
    $query = $pdo->prepare('UPDATE category
                        SET categoryId=:categoryId, name = :name
                        WHERE categoryId = :categoryId');

$values = [
    'categoryId' => $_POST['categoryId'],
    'name' => $_POST['name']
                
];
$query->execute($values);
echo'Category Name is sucessfully updated';
}

    }
 else {
echo 'Sorry, you must be logged in to view this page.';
}

include './extras/footer.php';
?>