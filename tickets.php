<?php
require('databasePDO.php');
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Tickets Management</title>
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
        <h1 class="start">Tickets Management</h1>
        <div class="contable">
          <table class=results>
              <tr>
                  <th> Remove </th>
                  <th> Ticket Type </th>
                  <th> Price </th>
                  <th> Manage </th>
              </tr>
          <?php
          $query = "SELECT * FROM tickets";
          $tickets = $db->query($query);

          if ($tickets->rowCount()>0) {
            foreach ($tickets as $ticket) {
              
              $ticketType = $ticket['ticketType'];
              $price = $ticket['price'];
              ?>
              
              <tr>
              <td>
                <form action="delete_ticket.php" method="post">
                <input type="hidden" value="<?php echo $ticketType; ?>" name="type">
                <button type="submit" class="tbuttond">Delete</button>
                </form>
              </td>
              <td><?php echo $ticketType; ?></td>
              <td><?php echo $price; ?></td>
              <td>
                  <form action="edit_ticket_form.php" method="post">
                  <input type="hidden" value="<?php echo $ticketType; ?>" name="type">
                  <button type="submit" class="tbuttonm">Manage</button>
                  </form>
              </td>
              </tr>
            <?php } } else { echo "0 results"; } ?>
          </table>
        </div>

          <button type="button" class="addbutton" onclick="location.href='add_ticket_form.php';">Add Ticket</button>

      </main>
  </body>
</html>
