<?php
require('databasePDO.php');

if ($_POST['price'] != "") {
  $query = "UPDATE tickets SET price = :price WHERE ticketType = :ticketType";
  $statement = $db->prepare($query);
  $statement->bindValue(':price', $_POST['price']);
  $statement->bindValue(':ticketType', $_POST['ticketType']);
  $statement->execute();
  $statement->closeCursor();
}

header("Location: tickets.php");
?>
