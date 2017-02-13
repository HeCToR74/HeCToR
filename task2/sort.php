<?php
header("Content-Type: text/html; charset=utf-8");

$host = "localhost";
$db="flight_db";
$user = "root";
$password = ""; 
$dbh = mysqli_connect($host, $user, $password, $db) or die("Не можу з'єднатися з MySQLi.");

	$s=$_GET['s'];
	$flag=$_GET['flag'];
	$res = mysqli_query ($dbh, $s.$flag); 

	$block="flight";
	include ("block.php");
	
	while($row = mysqli_fetch_array($res)){
   		echo "<tr>";
   		echo "<td>".$row['ID_flight']."</td><td>".$row['name_airline']."</td><td>".$row['city_from']."</td><td>".$row['city_to']."</td><td>".$row['price']."</td><td>".$row['time']."</td><td>".$row['mark_name']."</td>";
   		echo "</tr>"; 
	}

mysqli_close($dbh);

?>