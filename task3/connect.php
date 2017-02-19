<?php
header("Content-Type: text/html; charset=utf-8");
$host = "localhost";
$dbname="sgdevlab_ph13cn";
$user = "sgdevlab_ph13cn";
$password = "cuBN0SU0ApFZ"; 
$dbh = mysqli_connect($host, $user, $password, $dbname) or die("Не можу з'єднатися з MySQLi.");

mysqli_set_charset($dbh, 'utf8' );

?>
