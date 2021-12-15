<?php
require('databasePDO.php');

echo "<table class=results id=data>
        <tr>
            <th> Date </th>
            <th> Revenue </th>
            <th> &nbsp Tickets &nbsp </th>
            <th> &nbsp Products &nbsp </th>
            <th> &nbsp Operation &nbsp </th>
            <th> Net Profit </th>
        </tr>
        ";


//PDO requires statement prep for variables to protect against injection
$sql = "SELECT * FROM profits WHERE date BETWEEN :start AND :end";
$sql2 = "SELECT sum(netProfit) FROM profits WHERE date BETWEEN :start AND :end";
$stmt = $db->prepare($sql);
$stmt2 = $db->prepare($sql2);

$startDate = isset($_POST["startDate"]) ? $_POST["startDate"] : "2021-08-21";
$endDate = isset($_POST["endDate"]) ? $_POST["endDate"] : "2021-11-30";

$stmt->bindValue(":start", $startDate, PDO::PARAM_STR);
$stmt->bindValue(":end", $endDate, PDO::PARAM_STR);
$stmt->execute();
$profits = $stmt->fetchAll(PDO::FETCH_ASSOC);


$stmt2->bindValue(":start", $startDate, PDO::PARAM_STR);
$stmt2->bindValue(":end", $endDate, PDO::PARAM_STR);
$stmt2->execute();
$profitsSum = $stmt2->fetch();
$sum = $profitsSum['sum(netProfit)'];




foreach($profits as $prof) {
    $date = $prof['date'];
    $earnings = $prof['earnings'];
    $ticketsSold = $prof['totalTicketsSold'];
    $productsSold = $prof['totalProductsSold'];
    $operationCost = $prof['totalOperationCost'];
    $netProfit = $prof['netProfit'];

    echo "<tr>
            
            <td> $date </td>
            <td> $earnings </td>
            <td> $ticketsSold </td>
            <td> $productsSold </td>
            <td> $operationCost </td>
            <td> $netProfit </td>
            
        </tr>";
        
}
echo "</table>";

$sum = number_format($sum,4,".",",");
echo "<div style=\"margin:auto; width:30%;padding-bottom:2em;padding-top:.5em;\">
        <label>Sum: $$sum</label>
     </div>";


?>
