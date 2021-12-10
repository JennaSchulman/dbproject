<?php
require('databasePDO.php');


echo "<table class=results>
        <tr>
            <th> Remove </th>
			<th> Name </th>
			<th> Salary </th>
			<th> Manage </th>
        </tr>
        ";

$sql = "SELECT e.employeeID, e.salary, e.employeeName FROM employees e ORDER BY e.employeeID";
$employees = $db->query($sql);
        

if ($employees->rowCount() > 0) {
    foreach($employees as $emp) {
        $id = $emp['employeeID'];
        $name = $emp['employeeName'];
		$salary = $emp['salary'];

        echo "<tr>
                    <td><form action=\"remove.php\" method=\"POST\">
						<input type=hidden value=\"$id\" name=\"ID\" id=\"ID\"></input>
						<input type=hidden value=\"employees\" name=\"tablename\"></input>
						<input type=hidden value=\"employeeID\" name=\"constraint\"></input>
						<input type=hidden value=\"employees.php\" name=\"previous\"> </input>
						<input type='submit' class=tbuttond value='Delete'></input> 
						</form> 
					</td>
                    <td> $name </td>
					<td> $salary </td>
					<td><form action='manage_employee.php' method='POST'>
						<input type='submit' class=tbuttonm value='Manage'></input>
					</form></td>
                </tr>";  
    }  
    echo "</table>";
} else {
    echo "0 results";
}
?>