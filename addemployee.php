<?php
	require('databasePDO.php');
						
	$name=$_POST['name'];
	$salary=$_POST['salary'];
	$sql="INSERT INTO employees (salary, employeeName) VALUES ('$salary', '$name')";

	$row=$db->query($sql);	
	header('Location: employees.php');
?>