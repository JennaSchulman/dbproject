<?php
require('databasePDO.php');


echo "<table class=results>
        <tr>
            <th> Remove </th>
			<th> Name </th>
			<th> Salary </th>
			<th> &nbsp&nbsp&nbsp&nbspIs Assigned </th>
			<th> Manage </th>
        </tr>
        ";

$sql = "SELECT * FROM employees e ORDER BY e.employeeID";
$employees = $db->query($sql);
        

if ($employees->rowCount() > 0) {
    foreach($employees as $emp) {
        $id = $emp['employeeID'];
        $name = $emp['employeeName'];
		$salary = $emp['salary'];
		$assigned = $emp['is_assigned'];

        echo "<tr>
                    <td><form action=\"remove.php\" method=\"POST\">
						<input type=hidden value=\"$id\" name=\"ID\" id=\"ID\"></input>
						<input type=hidden value=\"employees\" name=\"tablename\"></input>
						<input type=hidden value=\"employeeID\" name=\"constraint\"></input>
						<input type=hidden value=\"employees.php\" name=previous> </input>
						<button type=submit class=tbuttond>Delete</button> 
						</form> 
					</td>
                    <td> $name </td>
					<td> $salary </td>
					<td> $assigned </td> 
					<td><form action=manage_employee.php method=POST>
						<input type=hidden value=$id name=empID>
						<button type=submit class=tbuttonm>Manage</button>
					</form></td>
                </tr>";  
    }  
    echo "</table>";
} else {
    echo "0 results";
}
?>