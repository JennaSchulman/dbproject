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

            <h1 class="start">Profits Data</h1>

            <div style="margin:auto; width:30%;padding-bottom:2em;">
            <form action="" method="post">
                
                <label>Start date:</label>
                <input type="date" name="startDate"
                    value="2021-08-21"
                    min="2021-08-21" max="2021-11-30">
    
                <label>End date:</label>
                <input type="date" name="endDate"
                    value="2021-11-30"
                    min="2021-08-21" max="2021-11-30">

                <input type="submit">
    
            </form>
            </div>

            <div class="prodtable">
                <?php include('datatable.php'); ?>
            </div>

        </main>
    </body>
</html>