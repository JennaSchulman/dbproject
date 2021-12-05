<?php
require('database.php');


echo "<table class=results>
        <tr>
            <th> Remove </th>
            <th> Concession Name </th>
            <th> Location </th>
            <th> Operation Cost </th>
            <th> Employee </th>
            <th> Manage </th>
        </tr>
        ";

$sql = "SELECT c.concessionID, c.concessionName, l.name, c.operationCost, e.employeeName FROM concessions c, employees e, location l WHERE c.employeeID = e.employeeID AND c.location = l.locationID ORDER BY c.concessionID";
$concession = $db->query($sql);
        

if ($concession->num_rows > 0) {
    foreach($concession as $con) {
        $id = $con['concessionID'];
        $name = $con['concessionName'];
        $location = $con['name'];
        $opcost = $con['operationCost'];
        $ename = $con['employeeName'];

        echo "<tr>
                    <td><form action=remove_concession.php method=post> <button type=submit class=tbuttond> Delete </button> </form> </td>
                    <td> $name </td>
                    <td> $location </td>
                    <td> $opcost </td>
                    <td> $ename </td>
                    <td> <form action=manage_concession.php method=post> <input type=hidden value=$id name=concessionID><button type=submit class=tbuttonm> Manage </button> </form> </td>
                </tr>";    
    }
    echo "</table>";
} else {
    echo "0 results";
}