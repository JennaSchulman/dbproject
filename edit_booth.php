<?php
require('databasePDO.php');

if ($_POST['location'] != "") {
  $query = "UPDATE ticketBooths SET location = :locationID WHERE boothID = :boothID";
  $statement = $db->prepare($query);
  $statement->bindValue(':locationID', $_POST['location']);
  $statement->bindValue(':boothID', $_POST['boothID']);
  $statement->execute();
  $statement->closeCursor();
}

if ($_POST['employee'] != "") {
  $query = "UPDATE ticketBooths SET employeeID = :employeeID WHERE boothID = :boothID";
  $statement = $db->prepare($query);
  $statement->bindValue(':employeeID', $_POST['employee']);
  $statement->bindValue(':boothID', $_POST['boothID']);
  $statement->execute();
  $statement->closeCursor();
  
  $query = "UPDATE employees SET is_assigned = 1 WHERE employeeID = :employeeID";
  $statement = $db->prepare($query);
  $statement->bindValue(':employeeID', $_POST['employee']);
  $statement->execute();
  $statement->closeCursor();
}

header("Location: ticketBooths.php");
?>
