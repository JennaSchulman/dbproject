<?php
require('databasePDO.php');

$rideID =  $_REQUEST['rideID'];
$query = "DELETE FROM rides WHERE rideID = :rideID";

$statement = $db->prepare($query);
$statement->bindValue(':rideID', $rideID);
$statement->execute();
$statement->closeCursor();

header("Location: rides.php");
exit();

?>
