<?php
header("Content-Type: text/html; charset=utf-8");

include ("connect.php");

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