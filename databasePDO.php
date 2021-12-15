<?php
$dsn='mysql:host=localhost;dbname=amusementpark';
try {
  $db = new PDO($dsn, "root", "root");
} catch (PDOException $e) {
  $error=$e->getMessage();
  echo '<p> Unable to connect to database: '.$error;
  exit();
}
?>
