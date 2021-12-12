<?php
require('databasePDO.php');

echo "<table class=results>
        <tr>
            <th> Date </th>
            <th> Revenue </th>
            <th> Tickets </th>
            <th> Products </th>
            <th> Operation </th>
            <th> Net Profit </th>
        </tr>
        ";


//PDO requires statement prep for variables to protect against injection
$sql = "SELECT * FROM profits WHERE date BETWEEN :start AND :end";
$stmt = $db->prepare($sql);
$startDate = $_POST["startDate"];
$endDate = $_POST["endDate"];
$stmt->bindValue(":start", $startDate, PDO::PARAM_STR);
$stmt->bindValue(":end", $endDate, PDO::PARAM_STR);
$stmt->execute();
$profits = $stmt->fetchAll(PDO::FETCH_ASSOC);



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


?>