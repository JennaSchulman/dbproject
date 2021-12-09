<?php
require('databasePDO.php');
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Ticket Booths Management</title>
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
      <h1 class="start">Ticket Booths Management</h1>
      <div class="contable">
        <table class=results>
            <tr>
                <th> Remove </th>
                <th> Booth ID </th>
                <th> Location </th>
                <th> Employee </th>
                <th> Manage </th>
            </tr>
        <?php
        $query = "SELECT * FROM ticketBooths";
        $booths = $db->query($query);

        if ($booths->rowCount()>0) {
          foreach ($booths as $booth) {
            
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
            ?>
            
            <tr>
            <td>
              <form action="delete_booth.php" method="post">
              <input type="hidden" value="<?php echo $boothID; ?>" name="boothID">
              <button type="submit" class="tbuttond">Delete</button>
              </form>
            </td>
            <td><?php echo $boothID ?></td>
            <td><?php echo $locationName; ?></td>
            <td><?php echo $employeeName; ?></td>
            <td>
                <form action="edit_booth_form.php" method="post">
                <input type="hidden" value="<?php echo $boothID; ?>" name="boothID">
                <button type="submit" class="tbuttonm">Manage</button>
                </form>
            </td>
            </tr>
          <?php } } else { echo "0 results"; } ?>
        </table>
      </div>

        <button type="button" class="addbutton" onclick="location.href='add_booth_form.php';">Add Ticket Booth</button>

    </main>
  </body>
</html>
