<?php
/*require('database.php');*/
require('databasePDO.php');


echo "<table class=results>
        <tr>
            <th> Remove </th>
            <th> Concession Name </th>
            <th> Location </th>
            <th> Total Products Sold</th>
            <th> &nbsp &nbsp Operation Cost </th>
            <th> Employee </th>
            <th> Manage </th>
        </tr>
        ";

$sql = "SELECT c.concessionID, c.concessionName, l.name, c.operationCost, e.employeeName, SUM(s.numSold) FROM concessions c, employees e, location l, productamountsold s WHERE c.employeeID = e.employeeID AND c.location = l.locationID AND c.concessionID = s.concessionID GROUP BY c.concessionName ORDER BY c.concessionID";
$concession = $db->query($sql);
        

if ($concession->rowCount() > 0) {
/*if ($concession->num_rows > 0) {*/
    foreach($concession as $con) {
        $id = $con['concessionID'];
        $name = $con['concessionName'];
        $location = $con['name'];
        $opcost = $con['operationCost'];
        $ename = $con['employeeName'];
        $psold = $con['SUM(s.numSold)'];

        echo "<tr>
                    <td>
                        <form action=remove_concession.php method=post> 
                            <input type=hidden value=$id name=concessionID>
                            <button type=submit class=tbuttond> Delete </button> 
                        </form> 
                    </td>
                    <td> $name </td>
                    <td> $location </td>
                    <td>$psold</td>
                    <td> $opcost </td>
                    <td> $ename </td>
                    <td> 
                        <form action=manage_concession.php method=post> 
                            <input type=hidden value=$id name=concessionID>
                            <button type=submit class=tbuttonm> Manage </button> 
                        </form> 
                    </td>
                </tr>";    
    }
    echo "</table>";
} else {
    echo "0 results";
}