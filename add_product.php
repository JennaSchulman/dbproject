<?php
require('databasePDO.php');

$name = $_REQUEST['prodName'];
$price = $_REQUEST['price'];

$query = "INSERT INTO products (productName, price) VALUE (:prodName, :price)";

$statement = $db->prepare($query);
$statement->bindValue(':prodName', $name);
$statement->bindValue(':price', $price);
$statement->execute();
$statement->closeCursor();

header("Location: products.php");
?>