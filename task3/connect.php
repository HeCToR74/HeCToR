<?php

$host = "localhost";
$db="flight_db";
$user = "root";
$password = ""; 
$dbh = mysqli_connect($host, $user, $password, $db) or die("Не можу з'єднатися з MySQLi.");

mysqli_set_charset($dbh, 'utf8' );


?>
