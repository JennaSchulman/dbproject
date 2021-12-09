<?php
	require('databasePDO.php');
	/*require('database.php');*/
						
	$name=$_POST['name'];
	$sql="INSERT INTO location (name) VALUES ('$name')";

	$row=$db->query($sql);	
	header('Location: locations.php');
?>