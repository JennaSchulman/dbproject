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
                    <h3 class="nav">Manage Employees</h3>
                    <h3 class="nav">View Data</h3>
                </div>
            </div>
        </header>
        <main>
            <h1 class="start">Add Location</h1>
            <div class="addForm" method="POST" novalidate>
                <form action="addlocation.php" method="POST" novalidate>
                    <label for="ncon">Name: </label>
                    <input type="text" name="name" id="nloc">
                    <br>

                    <?php 

                        require('database.php');

                        $getLocInfo = "SELECT * FROM location";
                        $locations = $db->query($getLocInfo);

                        foreach($locations as $location) {
                            $id = $location['locationID'];
                            $name = $location['name'];

                            echo "<option value=$id>$name</option>";
                        }
                    ?>
                    </fieldset>
                    <input class="button" id="submit" type="submit" name="addlocation">Add Location</button>
                </form>
            </div>
        </main>
    </body>
</html>