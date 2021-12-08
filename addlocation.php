<?php
	require('database.php');
						
	$name=$_POST['name'];
	$id=$_POST['$id'];
	$sql="INSERT INTO location (locationID, name) VALUES ('$id', '$name')";

	$row=$db->query($sql);	
	header('Location: addlocationform.php');
?>