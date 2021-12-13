<?php
require('databasePDO.php');

if($_POST['cname'] != "") {
    $query = "UPDATE concessions SET concessionName = :concessionName WHERE concessionID = :concessionID";
    $statement = $db->prepare($query);
    $statement->bindValue(':concessionName', $_POST['cname']);
    $statement->bindValue(':concessionID', $_POST['id']);
    $statement->execute();
    $statement->closeCursor();
}

if($_POST['location'] != "") {
    $query = "UPDATE concessions SET location = :locationID WHERE concessionID = :concessionID";
    $statement = $db->prepare($query);
    $statement->bindValue(':locationID', $_POST['loc']);
    $statement->bindValue(':concessionID', $_POST['id']);
    $statement->execute();
    $statement->closeCursor();
}

if($_POST['operationCost'] != "") {
    $query = "UPDATE concessions SET operationCost = :operationCost WHERE concessionID = :concessionID";
    $statement = $db->prepare($query);
    $statement->bindValue(':operationCost', $_POST['cost']);
    $statement->bindValue(':concessionID', $_POST['id']);
    $statement->execute();
    $statement->closeCursor();
}

if($_POST['employee'] != "") {
    $query = "UPDATE concessions SET employeeID = :employeeID WHERE concessionID = :concessionID";
    $statement = $db->prepare($query);
    $statement->bindValue(':employeeID', $_POST['aemp']);
    $statement->bindValue(':concessionID', $_POST['id']);
    $statement->execute();
    $statement->closeCursor();
}

$products = $_POST['addprod'];
if(!empty($products)) {
    foreach($products as $prod) {
        $query = "INSERT INTO productamountsold (concessionID, productID) VALUES (:concessionID, :productID)";
        $statement = $db->prepare($query);
        $statement->bindValue(':concessionID', $_POST['id']);
        $statement->bindValue('productID', $prod);
        $statement->execute();
        $statement->closeCursor();
    }
}
header("Location: concessions.php");
?>