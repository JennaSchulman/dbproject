<?php
require('databasePDO.php');
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Add Ride</title>
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
                <h3 class="nav">Manage Locations</h3>
                <h3 class="nav"><a href="ticketBooths.php">Manage TicketBooths</a></h3>
                <h3 class="nav"><a href="rides.php">Manage Rides</a></h3>
                <h3 class="nav"><a href="concessions.php">Manage Concessions</a></h3>
                <h3 class="nav">Manage Employees</h3>
                <h3 class="nav">View Data</h3>
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
      <h1 class="start">Add Ride</h1>
      <div class="addForm">
        <form action="add_ride.php" method="post">
            <label for="rideName" class="tlabel">Name:</label>
            <input type="text" name="rideName" size=30 required>
            <br>

            <label for="location" class="clabel">Location:</label>
            <select name="location" required>
              <option hidden selected value="">Select one</option>
              <?php foreach ($locations as $location) { ?>
              <option value="<?php echo $location['locationID']; ?>"><?php echo $location['name']; ?></option>
              <?php } ?>
            </select>
            <br>

            <label for="capacity" class="tlabel">Capacity:</label>
            <input type="number" name="capacity" required>
            <br>
            <label for="numTrains" class="tlabel">Number of Trains:</label>
            <input type="number" name="numTrains" required>
            <br>
            <label for="heightReq" class="tlabel">Height Requirement:</label>
            <input type="number" name="heightReq" required>
            <br>
            <label for="operationCost" class="tlabel">Operation Cost:</label>
            <input type="text" name="operationCost" required>
            <br>

            <label for="employee" class="clabel">Employee:</label>
            <select name="employee" required>
              <option hidden selected value="">Select one</option>
              <?php foreach ($employees as $employee) { ?>
              <option value="<?php echo $employee['employeeID']; ?>"><?php echo $employee['employeeName']; ?></option>
              <?php } ?>
            </select>
            <br>

            <label for="totalRiders" class="tlabel">Total Riders:</label>
            <input type="number" name="totalRiders" required>
            <br>

            <br>
            <button type="submit">Submit Changes</button>
        </form>
      </div>
    </main>
  </body>
</html>
