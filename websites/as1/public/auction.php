<?php session_start();
include './extras/header.php';
include './extras/dbconnect.php'; ?>

<li><a href="addAuction.php"> Add Auction</a></li>

    <main><ul class="productList"><article>
<?php
    $query = $pdo->prepare('SELECT * FROM auction');

    $query->execute();

    foreach($query as $row){

        echo '<h2>Auction Title-        ' . $row['title'] . '</h2>';
        echo '<h3>End Date-             ' . $row['endDate'] . '</h3>';
        echo '<p>Description-          ' . $row['description'] . '</p>';
        echo '<li><a href="editauction.php">delete</a></li>';   
            
    }

?>
  </article>
</ul>

    <?php
   include './extras/footer.php';
   ?>