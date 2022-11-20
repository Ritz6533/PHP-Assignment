<?php session_start();
include './extras/header.php';
include './extras/dbconnect.php'; ?>

<li><a href="addCategory.php"> Add category</a></li>

<ul><main><ul class="productList"><article>
<?php
    $query = $pdo->prepare('SELECT * FROM category');

    $query->execute();

    foreach($query as $row){

        echo '<h2>CATEGORY ID-      ' . $row['categoryId'] . '</h2>';
        echo '<h3>CATEGORY NAME-    ' . $row['name'] . '</h3>';
        echo '<li><a href="deletecategory.php">delete</a></li>';
        echo '<li><a href="editcategory.php?categoryId='. $row['categoryId'].'">'. 'edit ' . $row['name']. '</a></li>';

    }

?>
</article>
</ul>
</ul>

    <?php
   include './extras/footer.php';
   ?>