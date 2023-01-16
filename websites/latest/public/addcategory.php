<?php
include 'header.php';
include 'configure.php';
?>

<form action="addcategory.php" method= "POST">

<label>name</label>  <input type="addcategory"/>
<input type="submit" value= "add category" name= "addcategory"/>

</form>
<?php
if(isset($_POST['addcategory'])){
    $msql = $pdo->prepare('INSERT INTO category(name)
    VALUES(:name)')


$values = [
'name'=> $_POST ['name']


];



$msql->execute($values);
echo'category has been added';

?>

<?php
include 'footer.php';
?>




