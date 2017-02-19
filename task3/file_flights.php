<?php

include ("connect.php");

if (isset($_POST['from_file'])) {

	include ("DB_class.php");
	
	$db = new DB_class ($host, $user, $password, $dbname);
	
	$what = 'flight.ID_flight, airlines.name_airline, cities.name_city AS city_from, cities_2.name_city AS city_to, flight.price, flight.time, mark_airplanes.mark_name';
	$from = 'flight';
	$inner_join1 = 'airlines ON flight.name_company=airlines.ID_airline 
		INNER JOIN cities ON flight.city_from=cities.ID_city 
		INNER JOIN cities AS cities_2 ON flight.city_to=cities_2.ID_city 
		INNER JOIN mark_airplanes';
	$inner_join2 = 'flight.mark=mark_airplanes.ID_mark';

	$res=$db->select($what, $from, $inner_join1, $inner_join2);

	$block="flight";
	include ("block.php");

	for ($i = 0; $i < count($res); $i++) {
   		echo "<tr>";
   		echo "<td>".$res[$i]['ID_flight']."</td><td>".$res[$i]['name_airline']."</td><td>".$res[$i]['city_from']."</td><td>".$res[$i]['city_to']."</td><td>".$res[$i]['price']."</td><td>".$res[$i]['time']."</td><td>".$res[$i]['mark_name']."</td>";
   		echo "</tr>"; 
	}
	echo "</table>";

	$db->closeConnection();
}

if (isset($_POST['to_file'])) {
	include ("DB_class.php");
	
	$db = new DB_class ($host, $user, $password, $dbname);

	$table="flight";
	$fields="ID_flight, name_company, city_from, city_to, price, time, mark";
	
	$values=$_POST['ID_flight'].'", "'. $_POST['name_company'].'", "'.$_POST['city_from'].'", "'. $_POST['city_to'].'", "'.$_POST['price'].'", "'. $_POST['time'].'", "'.$_POST['mark'];

	$db->insert($table, $fields, $values);

	$db->closeConnection();
}

if (isset($_POST['edit_file'])) {
	$block="flight_edit";
	include ("block.php");
	include ("DB_class.php");
	
	$db = new DB_class ($host, $user, $password, $dbname);
	
	$what = 'flight.ID_flight, airlines.name_airline, cities.name_city AS city_from, cities_2.name_city AS city_to, flight.price, flight.time, mark_airplanes.mark_name';
	$from = 'flight';
	$inner_join1 = 'airlines ON flight.name_company=airlines.ID_airline 
		INNER JOIN cities ON flight.city_from=cities.ID_city 
		INNER JOIN cities AS cities_2 ON flight.city_to=cities_2.ID_city
		INNER JOIN mark_airplanes';
	$inner_join2 = 'flight.mark=mark_airplanes.ID_mark';

	$res=$db->select($what, $from, $inner_join1, $inner_join2);

	for ($i = 0; $i < count($res); $i++) {
   		echo "<tr>";
   		echo "<form  action='edit_flights.php' method='POST'> 
   		<td><input type='submit' name='edit' value='Зберегти зміни'>
   		<input style='visibility: hidden;' type='text' size='10' name='ID_flight' value='".$res[$i]['ID_flight']."'></td>
    	<td><input type='text' size='15' name='name_airline' value='".$res[$i]['name_airline']."'></td>
    	<td><input type='text' size='15' name='city_from' value='".$res[$i]['city_from']."'></td>
    	<td><input type='text' size='15' name='city_to' value='".$res[$i]['city_to']."'></td>
    	<td><input type='number' step='0.01' min='0' size='9' name='price' value='".$res[$i]['price']."'></td>
    	<td><input type='text' size='15' name='time' value='".$res[$i]['time']."'></td>
    	<td><input type='text' size='10' name='mark_name' value='".$res[$i]['mark_name']."'></td>";
   		echo "</form></tr>"; 

	}
	$db->closeConnection();
}

if (isset($_POST['delete_file'])) {
	$block="flight_delete";
	include ("block.php");

	include ("DB_class.php");
	
	$db = new DB_class ($host, $user, $password, $dbname);
	
	$what = 'flight.ID_flight, airlines.name_airline, cities.name_city AS city_from, cities_2.name_city AS city_to, flight.price, flight.time, mark_airplanes.mark_name';
	$from = 'flight';
	$inner_join1 = 'airlines ON flight.name_company=airlines.ID_airline 
		INNER JOIN cities ON flight.city_from=cities.ID_city 
		INNER JOIN cities AS cities_2 ON flight.city_to=cities_2.ID_city
		INNER JOIN mark_airplanes';
	$inner_join2 = 'flight.mark=mark_airplanes.ID_mark';

	$res=$db->select($what, $from, $inner_join1, $inner_join2);

	for ($i = 0; $i < count($res); $i++) {
   		echo "<tr>";
   		echo "<form  action='edit_flights.php' method='POST'> 
    	<td><input type='submit' name='delete' value='Видалити'>
    	<input style='visibility: hidden;' type='text' size='10' name='ID_flight' value='".$res[$i]['ID_flight']."'></td>
    	<td>".$res[$i]['ID_flight']."</td>
    	<td>".$res[$i]['name_airline']."</td>
    	<td>".$res[$i]['city_from']."</td>
    	<td>".$res[$i]['city_to']."</td>
    	<td>".$res[$i]['price']."</td>
    	<td>".$res[$i]['time']."</td>
    	<td>".$res[$i]['mark_name']."</td>";
   		echo "</form></tr>"; 
	}

	$db->closeConnection();

}


?>