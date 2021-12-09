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
                    <h3 class="nav"><a href="tickets.php">Manage Tickets</a></h3>
                    <h3 class="nav"><a href="locations.php">Manage Locations</a></h3>
                    <h3 class="nav"><a href="ticketBooths.php">Manage TicketBooths</a></h3>
                    <h3 class="nav"><a href="rides.php">Manage Rides</a></h3>
                    <h3 class="nav"><a href="concessions.php">Manage Concessions</a></h3>
                    <h3 class="nav"><a href="products.php">Manage Products</a></h3>
                    <h3 class="nav"><a href="employees.php">Manage Employees</a></h3>
                    <h3 class="nav"><a href="data.php">View Data</a></h3>
                </div>
            </div>
        </header>
        <main>
            <h1 class="start">Locations Management</h1>

			<div class="contable">
            <?php include('locationstable.php');?>
            </div>
			<br>
			<br>
			 <div class="addForm">
                <form action="addlocation.php" method="POST" novalidate>
                    <label for="ncon">Add Location: </label>
                    <input type="text" name="name" id="nloc">
                    <br>
                    <input class="addbutton" id="submit" type="submit" name="addlocation"></button>
                </form>
            </div>
			<br>
			<br> <!-- these breaks are here so the form doesn't hit the bottom of the page -->
			<br>
			
        </main>
    </body>
</html>