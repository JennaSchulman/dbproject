<?php
require('databasePDO.php');

echo "<table class=results>
        <tr>
            <th> Remove </th>
            <th> Product Name </th>
            <th> Price </th>
            <th> Manage </th>
        </tr>
        ";

$sql = "SELECT * FROM products";
$products = $db->query($sql);

if ($products->rowCount() > 0) {
    foreach($products as $prod) {
        $id = $prod['productID'];
        $name = $prod['productName'];
        $price = $prod['price'];

        echo "<tr>
                <td><form action=delete_product.php method=post>
                        <input type=hidden value=$id name=id>
                        <button type=submit class=tbuttond> Delete </button> 
                    </form>
                </td>
                <td> $name </td>
                <td> $$price </td>
                <td> <form action=manage_product.php method=post> <input type=hidden value=$id name=productID> <button type=submit class=tbuttonm> Manage </button> </form> </td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
?>