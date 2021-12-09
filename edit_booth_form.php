<?php
require('databasePDO.php');
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Manage Ticket Booth</title>
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
    $boothID =  $_REQUEST['boothID'];
    $query = "SELECT * FROM ticketbooths WHERE boothID = '$boothID'";

    $boothData = $db->query($query);
    $booth = $boothData->fetch();

    $boothID = $booth['boothID'];
    $locationID = $booth['location'];
    $employeeID = $booth['employeeID'];

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
      <h1 class="start">Managing: booth <?php echo $boothID; ?></h1>
      <div class="manageForm">
        <form action="edit_booth.php" method="post">
            <input type="hidden" value="<?php echo $boothID; ?>" name="boothID">

            <label for="location" class="clabel">Current Location: <span class="locname"><?php echo $locationName; ?></span></label>
            <br>
            <select name="location">
              <option hidden selected value="">Select one</option>
              <?php foreach ($locations as $location) { ?>
              <option value="<?php echo $location['locationID']; ?>"><?php echo $location['name']; ?></option>
              <?php } ?>
            </select>
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

            <br>
            <button type="submit">Submit Changes</button>
        </form>
      </div>
    </main>
  </body>
</html>
