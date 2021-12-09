<?php
require('databasePDO.php');
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Manage Ticket</title>
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
    $ticketType =  $_REQUEST['type'];
    $query = "SELECT * FROM tickets WHERE ticketType = '$ticketType'";

    $ticketData = $db->query($query);
    $ticket = $ticketData->fetch();

    $price = $ticket['price']; ?>

    <main>
      <h1 class="start">Managing: <?php echo $ticketType; ?></h1>
      <div class="manageForm">
        <form action="edit_ticket.php" method="post">
            <input type="hidden" value="<?php echo $ticketType; ?>" name="ticketType">

            <label for="price" class="tlabel">Price:</label>
            <input type="text" placeholder="$<?php echo $price; ?>" name="price">
            <br>

            <br>
            <button type="submit">Submit Changes</button>
        </form>
      </div>
    </main>
  </body>
</html>
