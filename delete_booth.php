<?php
require('databasePDO.php');

$boothID =  $_REQUEST['boothID'];
$query = "DELETE FROM ticketBooths WHERE boothID = :boothID";

$statement = $db->prepare($query);
$statement->bindValue(':boothID', $boothID);
$statement->execute();
$statement->closeCursor();

header("Location: ticketBooths.php");
exit();

?>

