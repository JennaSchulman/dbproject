<?php
require('databasePDO.php');

$rideName =  $_REQUEST['rideName'];
$location =  $_REQUEST['location'];
$capacity = $_REQUEST['capacity'];
$numTrains = $_REQUEST['numTrains'];
$heightReq = $_REQUEST['heightReq'];
$operationCost = $_REQUEST['operationCost'];
$employeeID = $_REQUEST['employee'];

$totalRiders = 0;
if (!isset($_REQUEST['totalRiders'])) {
  $totalRiders = $_REQUEST['totalRiders'];
}

$query = "INSERT INTO rides (rideName, capacity, numTrains, heightRequirement, requiresMaintenance, location, operationCost, totalRiders, employeeID) VALUES (:rideName, :capacity, :numTrains, :heightRequirement, 0, :location, :operationCost, :totalRiders, :employeeID)";

$statement = $db->prepare($query);
$statement->bindValue(':rideName', $rideName);
$statement->bindValue(':capacity', $capacity);
$statement->bindValue(':numTrains', $numTrains);
$statement->bindValue(':heightRequirement', $heightReq);
$statement->bindValue(':location', $location);
$statement->bindValue(':operationCost', $operationCost);
$statement->bindValue(':totalRiders', $totalRiders);
$statement->bindValue(':employeeID', $employeeID);
$statement->execute();
$statement->closeCursor();

header("Location: rides.php");
?>
