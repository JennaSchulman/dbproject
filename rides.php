<?php
require('databasePDO.php');
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Rides Management</title>
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

    <main>
      <h1 class="start">Rides Management</h1>
      <div class="contable">
        <table class=results>
            <tr>
                <th> Remove </th>
                <th> Ride Name </th>
                <th> Location </th>
                <th> Capacity </th>
                <th> Number of Trains </th>
                <th> Height Requirement </th>
                <th> Operation Cost </th>
                <th> Employee </th>
                <th> Total Riders </th>
                <th> Maintenance </th>
                <th> Manage </th>
            </tr>
        <?php
        $query = "SELECT * FROM rides";
        $rides = $db->query($query);

        if ($rides->rowCount()>0) {
          foreach ($rides as $ride) {
            
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
            ?>
            
            <tr>
            <td>
              <form action="delete_ride.php" method="post">
              <input type="hidden" value="<?php echo $rideID; ?>" name="rideID">
              <button type="submit" class="tbuttond">Delete</button>
              </form>
            </td>
            <td><?php echo $rideName ?></td>
            <td><?php echo $locationName; ?></td>
            <td><?php echo $capacity; ?></td>
            <td><?php echo $numTrains ?></td>
            <td><?php echo $heightRequirement ?></td>
            <td><?php echo $operationCost; ?></td>
            <td><?php echo $employeeName; ?></td>
            <td><?php echo $totalRiders; ?></td>
            <td>
              <form action="edit_ride.php" method="post">
              <input type="hidden" value="<?php echo $rideID; ?>" name="rideID">
              <?php if ((bool)$requiresMaintenance) { ?>
                <input type="hidden" value="0" name="reqMaintenance">
                <button type="submit" class="tbuttony">Request</button>
              <?php } else { ?>
                <input type="hidden" value="1" name="reqMaintenance">
                <button type="submit" class="tbuttonn">Request</button>
              <?php } ?>
              </form>
            </td>
            <td>
                <form action="edit_ride_form.php" method="post">
                <input type="hidden" value="<?php echo $rideID; ?>" name="rideID">
                <button type="submit" class="tbuttonm">Manage</button>
                </form>
            </td>
            </tr>
          <?php } } else { echo "0 results"; } ?>
        </table>
      </div>

        <button type="button" class="addbutton" onclick="location.href='add_ride_form.php';">Add Ride</button>

    </main>
  </body>
</html>
