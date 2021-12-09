<?php
require('databasePDO.php');
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Add Ticket</title>
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
      <h1 class="start">Add Ticket</h1>
      <div class="addForm">
        <form action="add_ticket.php" method="post">

            <label for="ticketType" class="tlabel">Ticket Type:</label>
            <input type="text" name="ticketType" required>
            <br>
            <label for="price" class="tlabel">Price:</label>
            <input type="text" name="price" required>
            <br>

            <br>
            <button type="submit">Add Ticket</button>
        </form>
      </div>
    </main>
  </body>
</html>
