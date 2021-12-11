<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="styleguide.css">
    </head>
    <body>
        <header>
            <div class="navbar">
                <h1 id="park">RCT 5 Amusement Park</h1>
                <div class="flex">
                    <h3 class="nav"><a href="homepage.html">Home</a></h3>
                    <h3 class="nav">Manage Tickets</h3>
                    <h3 class="nav"><a href="locations.php">Manage Locations</a></h3>
                    <h3 class="nav">Manage TicketBooths</h3>
                    <h3 class="nav">Manage Rides</h3>
                    <h3 class="nav"><a href="concessions.php">Manage Concessions</a></h3>
                    <h3 class="nav"><a href="employees.php">Manage Employees</a></h3>
                    <h3 class="nav">View Data</h3>
                </div>
            </div>
        </header>
        <main>
            <?php 
                $employeeID = $_POST['employeeID'];

                require('database.php');

                $getEmpInfo = "SELECT * FROM employees WHERE employeeID = $employeeID";
                $emps = $db->query($getEmpInfo);
                $emp = $emps->fetch_assoc();

                $name = $emp['employeeName'];
                $salary = $con['salary'];
                $eid = $emp['employeeID'];
				$isAssigned = $emp['isAssigned'];
                

                $getLocInfo = "SELECT name FROM location WHERE locationID = $lid";
                $location = $db->query($getLocInfo);
                $lo = $location->fetch_assoc();

                $l = $lo['name'];

                $getAllLocInfo = "SELECT * FROM location WHERE locationID <> $lid";
                $locations = $db->query($getAllLocInfo);

                $getEmpInfo = "SELECT employeeName FROM employees WHERE employeeID = $eid";
                $employee = $db->query($getEmpInfo);
                $em = $employee->fetch_assoc();

                $e = $em['employeeName'];

                $getNonEmpInfo = "SELECT employeeName, employeeID FROM employees WHERE is_assigned = 0";
                $nemployee = $db->query($getNonEmpInfo);

                $getProdInfo = "SELECT p.productName, s.numSold, p.productID FROM products p, productamountsold s WHERE p.productID = s.productID AND s.concessionID = $concessionID";
                $products = $db->query($getProdInfo);

                $getNotProdInfo = "SELECT p.productName, p.productID FROM products p WHERE p.productID NOT IN (SELECT s.productID FROM productamountsold s WHERE s.concessionID = $concessionID)";
                $notproducts = $db->query($getNotProdInfo);   

                echo "<h1 class=start>Managing: $name</h1>
                        <div class=manageForm>
                            <form>
                                <label for=cname class=tlabel>Name:</label>
                                <input type=text placeholder='$name' name=cname size=30>
                                <br>
                                <label for=cost class=tlabel>Operation Cost:</label>
                                <input type=text placeholder=$$opCost name=cost>
                                <br>
                                <label for=loc class=clabel>Current Location: <span class=locname>$l</span> </label>
                                <br>
                                <select name=loc>";
                                foreach($locations as $locale) {
                                    $id = $locale['locationID'];
                                    $n = $locale['name'];

                                    echo "<option value=$id>$n</option>";
                                }        
                    
                                echo "</select>
                                <br>
                                <label for=emp class=clabel>Current Employee: <span class=empname>$e</span> </label>
                                <br>";
                                
                                if($nemployee->num_rows > 0) {
                                    echo "<select name=aemp>";
                                    foreach($nemployee as $nemp) {
                                        $neid = $nemp['employeeID'];
                                        $nempn = $nemp['employeeName'];

                                        echo"<option value=$neid>$nempn</option>";
                                    }
                                    echo "</select>";
                                } else {
                                    echo "<p>0 employees not assigned<p>";
                                }

                                echo "<br>
                                <label for=pr class=clabel>Current Products Sold here:</label>
                                <br>
                                <table class=prodtable>
                                    <tr>
                                        <th> Remove </th>
                                        <th> Product </th>
                                        <th> Amount Sold </th>
                                        <th> Add </th>
                                    </tr>";
                                    foreach($products as $prod) {
                                        $p = $prod['productName'];
                                        $sold = $prod['numSold'];
                                        $prodid = $prod['productID'];

                                        echo "<tr>
                                                <td><form action=remove_prodfromcon.php method=post> <button type=submit class=tbuttond> Delete </button> </form> </td>
                                                <td>$p</td>
                                                <td> $sold </td>
                                                <td> <form method=post> <input type=hidden value=$prodid><input type=text size=7> </form> </td>
                                       </tr>";  
                                    }

                                echo "</table>
                                <fieldset>
                                    <legend>Add Products:</legend>";

                                    foreach($notproducts as $nprod) {
                                        $pid = $nprod['productID'];
                                        $npname = $nprod['productName'];

                                        echo "<input type=checkbox name=addprod value=$pid id='$pid addp'>
                                            <label for='$pid addp'>$npname</label>
                                            <br>";
                                    }
                                
                                echo "</fieldset>    
                                <br>
                                <button type=submit>Submit Changes</button>
                            </form>
                        </div>";
            ?>
        </main>
    </body>
</html>