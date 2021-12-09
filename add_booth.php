<?php
require('databasePDO.php');

$location =  $_REQUEST['location'];
$employeeID = $_REQUEST['employee'];

$query = "INSERT INTO ticketBooths (location, employeeID) VALUES (:location, :employeeID)";

$statement = $db->prepare($query);
$statement->bindValue(':location', $location);
$statement->bindValue(':employeeID', $employeeID);
$statement->execute();
$statement->closeCursor();

header("Location: ticketBooths.php");
?>
