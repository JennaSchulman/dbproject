<?php
    $id = $_REQUEST['concessionID'];

    $query = "DELETE FROM concessions WHERE concessionID = :concessionID";

    $statement = $db->prepare($query);
    $statement->bindValue(':concessionID', $id);
    $statement->execute();
    $statement->closeCursor();

    $query = "DELETE FROM productamountsold WHERE concessionID = :concessionID";

    $statement = $db->prepare($query);
    $statement->bindValue(':concessionID', $id);
    $statement->execute();
    $statement->closeCursor();

    header("Location: concessions.php");
    exit();
?>