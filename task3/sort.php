<?php
	include ("connect.php");

	include ("DB_class.php");
	$db = new DB_class ($host, $user, $password, $dbname);

	$what=$_GET['what'];
	$from=$_GET['from'];
	$inner_join1=$_GET['inner_join1'];
	$inner_join2=$_GET['inner_join2'];
	$order=$_GET['order'];

	$res=$db->select($what, $from, $inner_join1, $inner_join2, $where = null, $order);


	$block="flight";
	include ("block.php");
	
	for ($i = 0; $i < count($res); $i++) {
   		echo "<tr>";
   		echo "<td>".$res[$i]['ID_flight']."</td><td>".$res[$i]['name_airline']."</td><td>".$res[$i]['city_from']."</td><td>".$res[$i]['city_to']."</td><td>".$res[$i]['price']."</td><td>".$res[$i]['time']."</td><td>".$res[$i]['mark_name']."</td>";
   		echo "</tr>"; 
	}
	echo "</table>";

	$db->closeConnection();



?>