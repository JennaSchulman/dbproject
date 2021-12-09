<?php
require('databasePDO.php');

$ticketType =  $_REQUEST['type'];
$query = "DELETE FROM tickets WHERE ticketType = :ticketType";

$statement = $db->prepare($query);
$statement->bindValue(':ticketType', $ticketType);
$statement->execute();
$statement->closeCursor();

header("Location: tickets.php");
exit();

?>

