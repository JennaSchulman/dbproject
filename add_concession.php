<?php
require('databasePDO.php');

$concessionName = $_REQUEST['name'];
$location = $_REQUEST['loc'];
$operatonCost = $_REQUEST['opCost'];
$employeeID = $_REQUEST['emp'];
$products = $_REQUEST['products'];

$query = "INSERT INTO concessions (concessionName, location, employeeID, operationCost) VALUES (:concessionName, :location, :employeeID, :operationCost)";

$statement = $db->prepare($query);
$statement->bindValue(':concessionName', $concessionName);
$statement->bindValue(':location', $location);
$statement->bindValue(':employeeID', $employeeID);
$statement->bindValue(':operationCost', $operatonCost);
$statement->execute();
$statement->closeCursor();

$query = "UPDATE employees SET is_assigned = 1 WHERE employeeID = :employeeID";

$statement = $db->prepare($query);
$statement->bindValue(':employeeID', $employeeID);
$statement->execute();
$statement->closeCursor();


$getIDquery = "SELECT max(concessionID) as conID FROM concessions";
$getID = $db->query($getIDquery);
$get = $getID->fetch();
$ID = $get['conID'];

if (!empty($products)) {
    foreach ($products as $prod) {
        $query = "INSERT INTO productamountsold (concessionID, productID) VALUES (:concessionID, :productID)";

        $statement = $db->prepare($query);
        $statement->bindValue(':concessionID', $ID);
        $statement->bindValue(':productID', $prod);
        $statement->execute();
        $statement->closeCursor();
    }
}

header("Location: concessions.php");
?>