<?php
/*require('database.php');*/
require('databasePDO.php');


echo "<table class=results>
        <tr>
            <th> Remove </th>
			<th> Name </th>
        </tr>
        ";

$sql = "SELECT l.name, l.locationID FROM location l ORDER BY l.locationID";
$locations = $db->query($sql);
        
if ($locations->rowCount() > 0) {
/*if ($locations->num_rows > 0) {*/
    foreach($locations as $location) {
        $id = $location['locationID'];
        $name = $location['name'];

        echo "<tr>
                    <td><form action=\"remove.php\" method=\"POST\">
						<input type=hidden value=\"$id\" name=\"ID\" id=\"ID\"></input>
						<input type=hidden value=\"location\" name=\"tablename\"></input>
						<input type=hidden value=\"locationID\" name=\"constraint\"></input>
						<input type=hidden value=\"locations.php\" name=\"previous\"> </input>
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