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
            <form>
                <label for="name">Name: </label>
                <input type="text" name="name">
                <br>
                <label for="opCost">Operation Cost: </label>
                <input type="text" name="opCost">
                <br>
                <label for="loc">Location: </label>
                <select name="loc">

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

                </select>
                <br>
                <label for="emp">Employee:</label>
                <select name="emp"></select>
                <br>
                <button type="submit">Add Concession</button>
            </form>
        </main>
    </body>
</html>