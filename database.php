<?php

$servername = 'localhost'; 
$username='root';
$password='root';
$dbname = 'amusementpark';

$db = new mysqli($servername, $username, $password, $dbname);

if($db->connect_error) {
    die("Unable to connect to database: " .$db->connect_error);
}

?>