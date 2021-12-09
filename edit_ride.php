<?php
require('databasePDO.php');

if ($_POST['rideName'] != "") {
  echo "rideName<br>";
  $query = "UPDATE rides SET rideName = :rideName WHERE rideID = :rideID";
  $statement = $db->prepare($query);
  $statement->bindValue(':rideName', $_POST['rideName']);
  $statement->bindValue(':rideID', $_POST['rideID']);
  $statement->execute();
  $statement->closeCursor();
}

if ($_POST['location'] != "") {
  $query = "UPDATE rides SET location = :locationID WHERE rideID = :rideID";
  $statement = $db->prepare($query);
  $statement->bindValue(':locationID', $_POST['location']);
  $statement->bindValue(':rideID', $_POST['rideID']);
  $statement->execute();
  $statement->closeCursor();
}

if ($_POST['capacity'] != "") {
  $query = "UPDATE rides SET capacity = :capacity WHERE rideID = :rideID";
  $statement = $db->prepare($query);
  $statement->bindValue(':capacity', $_POST['capacity']);
  $statement->bindValue(':rideID', $_POST['rideID']);
  $statement->execute();
  $statement->closeCursor();
}

if ($_POST['numTrains'] != "") {
  echo $_POST['numTrains'] . $_POST['rideID'];
  $query = "UPDATE rides SET numTrains = :numTrains WHERE rideID = :rideID";
  $statement = $db->prepare($query);
  $statement->bindValue(':numTrains', $_POST['numTrains']);
  $statement->bindValue(':rideID', $_POST['rideID']);
  $statement->execute();
  $statement->closeCursor();
}

if ($_POST['heightRequirement'] != "") {
  $query = "UPDATE rides SET heightRequirement = :heightRequirement WHERE rideID = :rideID";
  $statement = $db->prepare($query);
  $statement->bindValue(':heightRequirement', $_POST['heightRequirement']);
  $statement->bindValue(':rideID', $_POST['rideID']);
  $statement->execute();
  $statement->closeCursor();
}

if ($_POST['operationCost'] != "") {
  $query = "UPDATE users SET operationCost = :operationCost WHERE userID = :userID";
  $statement = $db->prepare($query);
  $statement->bindValue(':operationCost', $_POST['operationCost']);
  $statement->bindValue(':rideID', $_POST['rideID']);
  $statement->execute();
  $statement->closeCursor();
}

if ($_POST['employee'] != "") {
  $query = "UPDATE rides SET employeeID = :employeeID WHERE rideID = :rideID";
  $statement = $db->prepare($query);
  $statement->bindValue(':employeeID', $_POST['employee']);
  $statement->bindValue(':rideID', $_POST['rideID']);
  $statement->execute();
  $statement->closeCursor();
}

if ($_POST['totalRiders'] != "") {
  $query = "UPDATE rides SET totalRiders = :totalRiders WHERE rideID = :rideID";
  $statement = $db->prepare($query);
  $statement->bindValue(':totalRiders', $_POST['totalRiders']);
  $statement->bindValue(':rideID', $_POST['rideID']);
  $statement->execute();
  $statement->closeCursor();
}

if ($_POST['reqMaintenance'] != "") {
  $query = "UPDATE rides SET requiresMaintenance = :reqMaintenance WHERE rideID = :rideID";
  $statement = $db->prepare($query);
  $statement->bindValue(':reqMaintenance', $_POST['reqMaintenance']);
  $statement->bindValue(':rideID', $_POST['rideID']);
  $statement->execute();
  $statement->closeCursor();
}

header("Location: rides.php");
?>

