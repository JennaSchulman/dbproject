<?php
    require('databasePDO.php');

    if($_POST['salary'] != "") {
        $sql = "UPDATE employees SET salary = :salary WHERE employeeID = :employeeID";
        $statement = $db->prepare($sql);
        $statement->bindValue(':salary', $_POST['salary']);
        $statement->bindValue(':employeeID', $_POST['employeeID']);
        $statement->execute();
        $statement->closeCursor();
    }

	if($_POST['setAssigned'] != "") {
		$sql = "UPDATE employees SET is_assigned = :is_assigned WHERE employeeID = :employeeID";
		$statement = $db->prepare($sql);
        $statement->bindValue(':is_assigned', $_POST['setAssigned']);
        $statement->bindValue(':employeeID', $_POST['employeeID']);
        $statement->execute();
        $statement->closeCursor();
	} 
    header("Location: employees.php");
?>