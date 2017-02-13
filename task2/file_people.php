<?php
header("Content-Type: text/html; charset=utf-8");

$host = "localhost";
$db="flight_db";
$user = "root";
$password = ""; 
$dbh = mysqli_connect($host, $user, $password, $db) or die("Не можу з'єднатися з MySQLi.");

if (isset($_POST['from_file'])) {
	$block="people";
	include ("block.php");

	$res = mysqli_query ($dbh, "SELECT * FROM people");
	
	while($row = mysqli_fetch_array($res)){
   		echo "<tr>";
   		echo "<td>".$row['ID_people']."</td>";
   		echo "<td>".$row['last_name']."</td>";
   		echo "<td>".$row['first_name']."</td>";
   		echo "</tr>"; 
	}
}

if (isset($_POST['to_file'])) {
	$strSQL = "INSERT INTO people (";
	$strSQL = $strSQL."last_name, ";
	$strSQL = $strSQL."first_name) ";
	$strSQL = $strSQL .'VALUES("';
	$strSQL = $strSQL .$_POST['last_name'].'", "';
	$strSQL = $strSQL .$_POST['first_name'].'")';

echo $strSQL;
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
	$block="people_delete";
	include ("block.php");

	$res = mysqli_query ($dbh, "SELECT * FROM people");
	
	while($row = mysqli_fetch_array($res)){
   		echo "<tr>";
   		echo "<form  action='edit_people.php' method='POST'> 
    	<td><input type='submit' name='delete' value='Видалити'>
    	<input style='visibility: hidden;' type='text' size='10' name='name' value='".$row['ID_people']."'></td>";
   		echo "<td>".$row['ID_people']."</td>";
   		echo "<td>".$row['last_name']."</td>";
   		echo "<td>".$row['first_name']."</td>";
   		echo "</tr>"; 
	}
}


mysqli_close($dbh);

?>