<?php
header("Content-Type: text/html; charset=utf-8");

include ("connect.php");

if (isset($_POST['from_file'])) {
	$block="countrie";
	include ("block.php");

	$res = mysqli_query ($dbh, "SELECT * FROM countries");
	
	while($row = mysqli_fetch_array($res)){
   		echo "<tr>";
   		echo "<td>".$row['ID_countrie']."</td><td>".$row['name_countrie']."</td>";
   		echo "</tr>"; 
	}
}

if (isset($_POST['to_file'])) {
	$strSQL = "INSERT INTO countries (";
	$strSQL = $strSQL."name_countrie) ";
	$strSQL = $strSQL .'VALUES("';
	$strSQL = $strSQL .$_POST['name_countrie'].'")';


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
	$block="countrie_delete";
	include ("block.php");

	$res = mysqli_query ($dbh, "SELECT * FROM countries");

	while($row = mysqli_fetch_array($res)){
   		echo "<tr>";
   		echo "<form  action='edit_countries.php' method='POST'> 
    	<td><input type='submit' name='delete' value='Видалити'>
    	<input style='visibility: hidden;' type='text' size='10' name='name_countrie' value='".$row['ID_countrie']."'></td>
    	<td>".$row['ID_countrie']."</td>
    	<td>".$row['name_countrie']."</td>";
   		echo "</form></tr>"; 
	}
}


mysqli_close($dbh);

?>