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
            <h1 class="start">Add Concession</h1>
            <div class="addForm">
                <form>
                    <label for="ncon">Name: </label>
                    <input type="text" name="name" id="ncon">
                    <br>
                    <label for="opCostcon">Operation Cost: </label>
                    <input type="text" name="opCost" id="opCostcon">
                    <br>
                    <label for="loccon">Location: </label>
                    <select name="loc" id="loccon">

                    <?php 

                        require('database.php');

                        $getLocInfo = "SELECT * FROM location";
                        $locations = $db->query($getLocInfo);

                        foreach($locations as $location) {
                            $id = $location['locationID'];
                            $name = $location['name'];

                            echo "<option value=$id>$name</option>";
                        }

                

                        echo "</select>
                        <br>
                        <label for=empcon>Employee:</label>
                        <select name=emp id=empcon></select>
                        <br>
                        <fieldset>
                            <legend>Select Products to Add:</legend>";

                            $getProdInfo = "SELECT * FROM products";
                            $products = $db->query($getProdInfo);

                            foreach($products as $product) {
                                $pid = $product['productID'];
                                $pname = $product['productName'];

                                echo "<input type=checkbox value=$pid id='$pid newp'>
                                    <label for='$pid newp'>$pname</label>
                                    <br>";
                            }

                    ?>
                    </fieldset>
                    <button type="submit">Add Concession</button>
                </form>
            </div>
        </main>
    </body>
</html>