<?php
require('databasePDO.php');

$concessionID = $_REQUEST['cida'];
$productID = $_REQUEST['pida'];
$amt = $_REQUEST['amt'];

$query = "UPDATE productamountsold SET numSold = numSold + :amt WHERE concessionID = :concessionID AND productID = :productID";

$statement = $db->prepare($query);
$statement->bindValue(':amt', $amt);
$statement->bindValue(':concessionID', $concessionID);
$statement->bindValue(':productID', $productID);
$statement->execute();
$statement->closeCursor();

header("Location: manage_concession.php");
exit();

?>