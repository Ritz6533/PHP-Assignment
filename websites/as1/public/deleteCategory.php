<?php
session_start();
include './extras/header.php';
include './extras/dbconnect.php'; 
if (isset($_SESSION['loggedin'])) {

?>
    <main>

<h1>DELETE CATEGORY </h1>
<p style="float:right;"><a href="addCategory.php"> Add category</p>
<p style="float:right;"><a href="editCategory.php"> Edit </a></p>
    <form action="deleteCategory.php" method="POST">
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

    <input type="submit" value="DELETE" name="submit" />
</form>

<?php

if(isset($_POST['submit'])){
    $query = $pdo->prepare('DELETE FROM category WHERE  categoryId = :categoryId');

$values = [
    'categoryId' => $_POST['categoryId']
                
];
$query->execute($values);
echo'Category  is sucessfully deleted';
}

    }
 else {
echo 'Sorry, you must be logged in to view this page.';
}

include './extras/footer.php';
?>