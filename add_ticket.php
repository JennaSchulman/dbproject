<?php
require('databasePDO.php');

$ticketType = $_REQUEST['ticketType'];
$price = $_REQUEST['price'];

$query = "INSERT INTO tickets (ticketType, price) VALUES (:ticketType, :price)";

$statement = $db->prepare($query);
$statement->bindValue(':ticketType', $ticketType);
$statement->bindValue(':price', $price);
$statement->execute();
$statement->closeCursor();

header("Location: tickets.php");
?>

