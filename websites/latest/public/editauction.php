<?php
include 'header.php';
include 'configure.php';
?>
<form action="editauction.php" method="POST">
<input type="hidden" name="id" value="<?php echo $auctionrow['id']; ?>"/>

<label>auction:</label>
<input type="text" name="auction" value="<?php echo $auctionrow['addauction']; ?>"/>
<label>title:</label>
<input type="text" name="title" value="<?php echo $auctionrow['title']; ?>"/>
<label>description:</label>
<input type="text" name="description" value="<?php echo $auctionrow['description']; ?>"/>
<label>category_id:</label>
<input type="text" name="category_id" value="<?php echo $auctionrow['category_id']; ?>"/>
<select name="user">
<?php

$stmt = $pdo->prepare('SELECT * FROM user');
$stmt->execute();

foreach ($stmt as $row){
if ($row['id'] == $auctionrow['user_id']){
echo '<option value="' . $row['id'] . '" selected="selected">' . $row['name'] . '</option>';
}
else{
echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';


}


}

?>
</select>

<input type="submit" name="submit" value="add"/>

</form>




































