<?php
require('databasePDO.php');
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Add Ticket Booth</title>
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

    <?php
    $query = "SELECT * FROM location";
    $locations = $db->query($query);

    $query = "SELECT * FROM employees WHERE is_assigned = 0";
    $employees = $db->query($query);
    ?>

    <main>
      <h1 class="start">Add Ticket Booth</h1>
      <div class="addForm">
        <form action="add_booth.php" method="post">

            <label for="location" class="clabel">Location:</label>
            <select name="location" required>
              <option hidden selected value="">Select one</option>
              <?php foreach ($locations as $location) { ?>
              <option value="<?php echo $location['locationID']; ?>"><?php echo $location['name']; ?></option>
              <?php } ?>
            </select>
            <br>

            <label for="employee" class="clabel">Employee:</label>
            <select name="employee" required>
              <option hidden selected value="">Select one</option>
              <?php foreach ($employees as $employee) { ?>
              <option value="<?php echo $employee['employeeID']; ?>"><?php echo $employee['employeeName']; ?></option>
              <?php } ?>
            </select>
            <br>

            <br>
            <button type="submit">Submit Changes</button>
        </form>
      </div>
    </main>
  </body>
</html>
