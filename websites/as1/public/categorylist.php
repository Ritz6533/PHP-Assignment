<?php session_start();
include './extras/header.php';
include './extras/dbconnect.php'; ?>
<main>

<h1>CATEGORY LIST</h1>
<p style="float:right;"><a href="addCategory.php"> Add category</p>
<p style="float:right;"><a href="editCategory.php"> Edit </a></p>
<p style="float:right;"><a href="deleteCategory.php"> Delete </a></p>



<ul><main><ul class="productList"><article>
<?php
    $query = $pdo->prepare('SELECT * ,(SELECT COUNT(CategoryId) FROM auction WHERE auction.CategoryId = category.CategoryId) as auctionObj
    FROM category');

    $query->execute();

    foreach($query as $row){

        
        echo  $row['name'] ;
        echo ' - '.$row['auctionObj'];
        echo '<br>';
    }

?>
</article>
</ul>
</ul>

    <?php
   include './extras/footer.php';
   ?>