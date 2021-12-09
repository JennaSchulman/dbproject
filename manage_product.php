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
            <?php
                $productID = $_POST['productID'];

                require('databasePDO.php');

                $getProdInfo = "SELECT * FROM products WHERE productID = $productID";
                $productData = $db->query($getProdInfo);
                $prod = $productData->fetch();

                $name = $prod['productName'];
                $price = $prod['price'];

                echo "<h1 class=start>Managing: $name</h1>
                        <div class=manageForm>
                            <form action=edit_product.php method=post>
                                <input type=hidden value=$productID name=productID>
                                <label for=price>Price: </label>
                                <input type=text placeholder=$$price name=price>
                                <br><br>
                                <button type=submit>Submit Changes</button>
                            </form>
                        </div>";    
            ?>
        </main>
    </body>
</html>