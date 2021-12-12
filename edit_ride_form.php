<?php
require('databasePDO.php');
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Manage Ride</title>
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
    $rideID =  $_REQUEST['rideID'];
    $query = "SELECT * FROM rides WHERE rideID = '$rideID'";

    $rideData = $db->query($query);
    $ride = $rideData->fetch();

    $rideID = $ride['rideID'];
    $rideName = $ride['rideName'];
    $capacity = $ride['capacity'];
    $numTrains = $ride['numTrains'];
    $heightRequirement = $ride['heightRequirement'];
    $requiresMaintenance = $ride['requiresMaintenance'];
    $locationID = $ride['location'];
    $operationCost = $ride['operationCost'];
    $totalRiders = $ride['totalRiders'];
    $employeeID = $ride['employeeID'];

    $query = "SELECT * FROM location WHERE locationID = '$locationID'";
    $locationData = $db->query($query);
    $location = $locationData->fetch();
    $locationName = $location['name'];

    $query = "SELECT * FROM employees WHERE employeeID = '$employeeID'";
    $employeeData = $db->query($query);
    $employee = $employeeData->fetch();
    $employeeName = $employee['employeeName'];

    $query = "SELECT * FROM location";
    $locations = $db->query($query);

    $query = "SELECT * FROM employees WHERE is_assigned = 0";
    $employees = $db->query($query);
    ?>

    <main>
      <h1 class="start">Managing: <?php echo $rideName; ?></h1>
      <div class="manageForm">
        <form action="edit_ride.php" method="post">
            <input type="hidden" value="<?php echo $rideID; ?>" name="rideID">
            <label for="rideName" class="tlabel">Name:</label>
            <input type="text" placeholder="<?php echo $rideName; ?>" name="rideName" id="ridename" size=30>
            <br>

            <label for="location" class="clabel">Current Location: <span class="locname"><?php echo $locationName; ?></span></label>
            <br>
            <select name="location">
              <option hidden selected value="">Select one</option>
              <?php foreach ($locations as $location) { ?>
              <option value="<?php echo $location['locationID']; ?>"><?php echo $location['name']; ?></option>
              <?php } ?>
            </select>
            <br>

            <label for="capacity" class="tlabel">Capacity:</label>
            <input type="number" placeholder="<?php echo $capacity; ?>" name="capacity">
            <br>
            <label for="numTrains" class="tlabel">Number of Trains:</label>
            <input type="number" placeholder="<?php echo $numTrains; ?>" name="numTrains">
            <br>
            <label for="heightReq" class="tlabel">Height Requirement:</label>
            <input type="number" placeholder="<?php echo $heightRequirement; ?> in" name="heightReq">
            <br>
            <label for="operationCost" class="tlabel">Operation Cost:</label>
            <input type="text" placeholder="$<?php echo $operationCost; ?>" name="operationCost">
            <br>

            <label for="employee" class="clabel">Current Employee: <span class="empname"><?php echo $employeeName; ?></span></label>
            <br>
            <select name="employee">
              <option hidden selected value="">Select one</option>
              <?php foreach ($employees as $employee) { ?>
              <option value="<?php echo $employee['employeeID']; ?>"><?php echo $employee['employeeName']; ?></option>
              <?php } ?>
            </select>
            <br>

            <label for="totalRiders" class="tlabel">Total Riders:</label>
            <input type="number" placeholder="<?php echo $totalRiders; ?>" name="totalRiders">
            <br>

            <br>
            <button type="submit">Submit Changes</button>
        </form>
      </div>
    </main>
  </body>
</html>
