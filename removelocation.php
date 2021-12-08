<?php
	require('database.php');
						
	$name=$_POST['name'];
	$id=$_POST['locID'];
	$sql="DELETE FROM location WHERE locationID =" . $id;

	$row=$db->query($sql);	
	header('Location: locations.php');
?>