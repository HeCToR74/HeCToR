<?php
header("Content-Type: text/html; charset=utf-8");

include ("connect.php");

if (isset($_POST['from_file'])) {

	$s="SELECT flight.ID_flight, airlines.name_airline, cities.name_city AS city_from, cities_2.name_city AS city_to, flight.price, flight.time, mark_airplanes.mark_name FROM flight 
		INNER JOIN  airlines ON flight.name_company=airlines.ID_airline 
		INNER JOIN cities ON flight.city_from=cities.ID_city 
		INNER JOIN cities AS cities_2 ON flight.city_to=cities_2.ID_city
		 INNER JOIN mark_airplanes ON flight.mark=mark_airplanes.ID_mark
		";
	$flag='';
	
		
	$block="flight";
	include ("block.php");
	
	$res = mysqli_query ($dbh, $s); 

	while($row = mysqli_fetch_array($res)){
   		echo "<tr>";
   		echo "<td>".$row['ID_flight']."</td><td>".$row['name_airline']."</td><td>".$row['city_from']."</td><td>".$row['city_to']."</td><td>".$row['price']."</td><td>".$row['time']."</td><td>".$row['mark_name']."</td>";
   		echo "</tr>"; 
	}
	echo "</table>";
}

if (isset($_POST['to_file'])) {
	$strSQL="INSERT INTO flight(";
	$strSQL=$strSQL."ID_flight, ";
	$strSQL=$strSQL."name_company, ";
	$strSQL=$strSQL."city_from, ";
	$strSQL=$strSQL."city_to, ";
	$strSQL=$strSQL."price, ";
	$strSQL=$strSQL."time, ";
	$strSQL=$strSQL."mark) ";

	$strSQL = $strSQL . 'VALUES("';
	$strSQL = $strSQL . $_POST['ID_flight'].'", "';
	$strSQL = $strSQL . $_POST['name_company'].'", "';

	$res = mysqli_query ($dbh, "SELECT * FROM cities WHERE name_city='".$_POST['city_from']."'");
	$row = mysqli_fetch_array($res);	
	$strSQL = $strSQL . $row['ID_city'].'", "';

	$res = mysqli_query ($dbh, "SELECT * FROM cities WHERE name_city='".$_POST['city_to']."'");
	$row = mysqli_fetch_array($res);	
	$strSQL = $strSQL . $row['ID_city'].'", "';

	$strSQL = $strSQL . $_POST['price'].'", "';

	$strSQL = $strSQL . $_POST['time'].'", "';

	$res = mysqli_query ($dbh, "SELECT * FROM mark_airplanes WHERE mark_name='".$_POST['mark']."'");
	$row = mysqli_fetch_array($res);
	$strSQL = $strSQL . $row['ID_mark'].'")';


	if (mysqli_query($dbh, $strSQL)){
		echo "<h3>Дані успішно внесено!</h3>";
	} 
	else {
		echo "<h3>Помилка введення!</h3>";
	}
}

if (isset($_POST['edit_file'])) {
	include ("block_edit_flights.php");

	$res = mysqli_query ($dbh, "SELECT * FROM flight");
	while($row = mysqli_fetch_array($res)){
   		echo "<tr>";
   		echo "<form  action='edit_flights.php' method='POST'> 
   		<td><input type='submit' name='edit' value='Зберегти зміни'>
   		<input style='visibility: hidden;' type='text' size='10' name='name_flight' value='".$row['flight_title']."'></td>
    	<td><input type='text' size='10' name='name_flight_new' value='".$row['flight_title']."'></td>
    	<td><input type='text' size='15' name='company_name' value='".$row['company_name']."'></td>
    	<td><input type='text' size='15' name='city_from' value='".$row['city_from']."'></td>
    	<td><input type='text' size='15' name='city_to' value='".$row['city_to']."'></td>
    	<td><input type='number' step='0.01' min='0' size='9' name='ticket_price' value='".$row['ticket_price']."'></td>
    	<td><input type='text' size='15' name='time_of_departure' value='".$row['time_of_departure']."'></td>
    	<td><input type='text' size='10' name='mark_airplane' value='".$row['mark_airplane']."'></td>";
   		echo "</form></tr>"; 
	}	
}

if (isset($_POST['delete_file'])) {
	$block=flight_delete;
	include ("block.php");

	$res = mysqli_query ($dbh, "SELECT flight.ID_flight, airlines.name_airline, cities.name_city AS city_from, cities_2.name_city AS city_to, flight.price, flight.time, mark_airplanes.mark_name
		FROM flight 
		INNER JOIN  airlines ON flight.name_company=airlines.ID_airline 
		INNER JOIN cities ON flight.city_from=cities.ID_city 
		INNER JOIN cities AS cities_2 ON flight.city_to=cities_2.ID_city
		INNER JOIN mark_airplanes ON flight.mark=mark_airplanes.ID_mark
		");

	while($row = mysqli_fetch_array($res)){
   		echo "<tr>";
   		echo "<form  action='edit_flights.php' method='POST'> 
    	<td><input type='submit' name='delete' value='Видалити'>
    	<input style='visibility: hidden;' type='text' size='10' name='name_flight' value='".$row['ID_flight']."'></td>
    	<td>".$row['ID_flight']."</td>
    	<td>".$row['name_airline']."</td>
    	<td>".$row['city_from']."</td>
    	<td>".$row['city_to']."</td>
    	<td>".$row['price']."</td>
    	<td>".$row['time']."</td>
    	<td>".$row['mark_name']."</td>";
   		echo "</form></tr>"; 
	}
}


mysqli_close($dbh);

?>