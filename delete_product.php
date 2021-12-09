<?php
require('databasePDO.php');

$id = $_REQUEST['id'];
$query = "DELETE FROM products WHERE productID = :id";

$statement = $db->prepare($query);
$statement->bindValue(':id', $id);
$statement->execute();
$statement->closeCursor();

header("Location: products.php");
exit();
?>