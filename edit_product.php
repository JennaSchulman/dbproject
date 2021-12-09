<?php
    require('databasePDO.php');

    if($_POST['price'] != "") {
        $sql = "UPDATE products SET price = :price WHERE productID = :productID";
        $statement = $db->prepare($sql);
        $statement->bindValue(':price', $_POST['price']);
        $statement->bindValue(':productID', $_POST['productID']);
        $statement->execute();
        $statement->closeCursor();
    }

    header("Location: products.php");
?>