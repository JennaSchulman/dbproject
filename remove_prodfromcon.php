<?php
require('databasePDO.php');

$concessionID = $_REQUEST['cidr'];
$productID = $_REQUEST['pidr'];

if(!isset($_SESSION['cida']) && !isset($_SESSION['cidr'])) {
    $_SESSION['cidr'] = $concessionID;
}

$query = "DELETE FROM productamountsold WHERE concessionID = :concessionID AND productID = :productID";

$statement = $db->prepare($query);
$statement->bindValue(':concessionID', $concessionID);
$statement->bindValue(':productID', $productID);
$statement->execute();
$statement->closeCursor();

header("Location: manage_concession.php");
exit();
?>