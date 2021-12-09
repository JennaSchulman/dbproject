<?php
	require('databasePDO.php');
	/*require('database.php');*/
						
	$name=$_POST['name'];
	$id=$_POST['ID'];
	$table=$_POST['tablename'];
	$constraint=$_POST['constraint'];
	$previous=$_POST['previous'];
	$sql="DELETE FROM $table WHERE  $constraint =" . $id;

	$row=$db->query($sql);	
	header('Location: ' . $previous );
?>