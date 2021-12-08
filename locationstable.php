<?php
require('database.php');


echo "<table class=results>
        <tr>
            <th> Remove </th>
			<th> Name </th>
        </tr>
        ";

$sql = "SELECT l.name, l.locationID FROM location l ORDER BY l.locationID";
$locations = $db->query($sql);
        

if ($locations->num_rows > 0) {
    foreach($locations as $location) {
        $id = $location['locationID'];
        $name = $location['name'];

        echo "<tr>
                    <td><form action=\"removelocation.php\" method=\"POST\">
						<input type=hidden value=\"$id\" name=\"locID\" id=\"locID\"></input>
						<input type='submit' class=tbuttond value='Delete'></input> 
						</form> 
					</td>
                    <td> $name </td>
                </tr>";  
    }  
    echo "</table>";
} else {
    echo "0 results";
}
?>