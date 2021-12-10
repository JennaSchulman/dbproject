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
            <h1 class="start">Employee Management</h1>

			<div class="contable">
            <?php include('employeetable.php');?>
            </div>
			<br>
			<br>
			 <div class="addForm">
                <form action="addemployee.php" method="POST" novalidate>
				<h3>Add New Employee</h3>
                    <label for="name">Name: </label>
                    <input type="text" name="name" class="nemp"><br>
					<label for="salary">Salary: </label>
                    <input type="text" name="salary" class="nemp">
					
                    <br>
                    <input class="addbutton" id="submit" type="submit" name="addemp"></button>
                </form>
            </div>
			<br>
			<br> <!-- these breaks are here so the form doesn't hit the bottom of the page -->
			<br>
        </main>
    </body>
</html>