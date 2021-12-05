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
                    <h3 class="nav">Manage Locations</h3>
                    <h3 class="nav">Manage TicketBooths</h3>
                    <h3 class="nav">Manage Rides</h3>
                    <h3 class="nav"><a href="concessions.php">Manage Concessions</a></h3>
                    <h3 class="nav">Manage Employees</h3>
                    <h3 class="nav">View Data</h3>
                </div>
            </div>
        </header>
        <main>
            <?php 
                $concessionID = $_POST['concessionID'];

                require('database.php');

                $getConInfo = "SELECT * FROM concessions WHERE concessionID = $concessionID";
                $conces = $db->query($getConInfo);
                $con = $conces->fetch_assoc();

                $name = $con['concessionName'];
                $opCost = $con['operationCost'];
                $eid = $con['employeeID'];
                $lid = $con['location'];

                $getLocInfo = "SELECT name FROM location WHERE locationID = $lid";
                $location = $db->query($getLocInfo);
                $lo = $location->fetch_assoc();

                $l = $lo['name'];

                $getAllLocInfo = "SELECT * FROM location WHERE locationID <> $lid";
                $locations = $db->query($getAllLocInfo);

                //How do we want to do this????
                $getEmpInfo = "SELECT employeeName FROM employees WHERE employeeID = $eid";
                $employee = $db->query($getEmpInfo);
                $em = $employee->fetch_assoc();

                $e = $em['employeeName'];

                $getProdInfo = "SELECT p.productName, s.numSold FROM products p, productamountsold s WHERE p.productID = s.productID AND s.concessionID = $concessionID";
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
                                <br>
                                <input type=text name=empname>
                                <br>
                                <label for=pr class=clabel>Current Products Sold here:</label>
                                <br>
                                <table class=prodtable>
                                    <tr>
                                        <th> Remove </th>
                                        <th> Product </th>
                                        <th> Amount Sold </th>
                                    </tr>";
                                    foreach($products as $prod) {
                                        $p = $prod['productName'];
                                        $sold = $prod['numSold'];

                                        echo "<tr>
                                                <td><form action=remove_prodfromcon.php method=post> <button type=submit class=tbuttond> Delete </button> </form> </td>
                                                <td>$p</td>
                                                <td> $sold </td>
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
