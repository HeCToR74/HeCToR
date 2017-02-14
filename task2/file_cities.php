<?php
header("Content-Type: text/html; charset=utf-8");

include ("connect.php");

if (isset($_POST['from_file'])) {
	$block="city";
	include ("block.php");

	$res = mysqli_query ($dbh, "SELECT cities.ID_city, 
		cities.name_city, countries.name_countrie, cities.number_of_residents, people.last_name, people.first_name
		FROM cities 
		INNER JOIN  countries ON cities.name_countrie=countries.ID_countrie 
		INNER JOIN people ON cities.mayor=people.ID_people");

	while($row = mysqli_fetch_array($res)){
   		echo "<tr>";
   		echo "<td>".$row['ID_city']."</td>";
   		echo "<td>".$row['name_city']."</td>";
   		echo "<td>".$row['name_countrie']."</td>";
   		echo "<td>".$row['number_of_residents']."</td>";
   		echo "<td>".$row['last_name']." ".$row['first_name']."</td>";
   		echo "</tr>"; 
	}
}

if (isset($_POST['to_file'])) {
	$strSQL="INSERT INTO cities(";
	$strSQL=$strSQL."name_city, ";
	$strSQL=$strSQL."name_countrie, ";
	$strSQL=$strSQL."number_of_residents, ";
	$strSQL=$strSQL."mayor) ";

	$strSQL = $strSQL . 'VALUES("';
	$strSQL = $strSQL . $_POST['name_city'].'", "';

	$res = mysqli_query ($dbh, "SELECT * FROM countries WHERE name_countrie='".$_POST['country']."'");

	$row = mysqli_fetch_array($res);
	$strSQL = $strSQL . $row['ID_countrie'].'", "';

	$strSQL = $strSQL . $_POST['number_of_residents'].'", "';
    $words=explode (" ", $_POST['mayor_name']);
	$res = mysqli_query ($dbh, "SELECT * FROM people WHERE last_name='".$words[0]."' AND first_name='".$words[1]."'");
	$row = mysqli_fetch_array($res);
	$strSQL = $strSQL . $row['ID_people'].'")';

	if (mysqli_query($dbh, $strSQL)){
		echo "<h3>Дані успішно внесено!</h3>";
	} 
	else {
		echo "<h3>Помилка введення!</h3>";
	}	
}

if (isset($_POST['edit_file'])) {
	include ("block_edit_cities.php");

	$res = mysqli_query ($dbh, "SELECT * FROM cities");
	while($row = mysqli_fetch_array($res)){
   		echo "<tr>";
   		echo "<form  action='edit_cities.php' method='POST'> 
   		<td><input type='submit' name='edit' value='Зберегти зміни'>
   		<input style='visibility: hidden;' type='text' size='10' name='city_name' value='".$row['city_name']."'></td>
    	<td><input type='text' size='10' name='city_name_new' value='".$row['city_name']."'></td>
    	<td><input type='text' size='15' name='country' value='".$row['country']."'></td>
    	<td><input type='number' step='1' min='0' name='number_of_residents' value='".$row['number_of_residents']."'></td>
    	<td><input type='text' size='20' name='mayor_name' value='".$row['mayor_name']."'></td>";
   		echo "</form></tr>"; 
	}	
}

if (isset($_POST['delete_file'])) {
	$block="city_delete";
	include ("block.php");

	$res = mysqli_query ($dbh, "SELECT cities.ID_city, 
		cities.name_city, countries.name_countrie, cities.number_of_residents, people.last_name, people.first_name
		FROM cities 
		INNER JOIN  countries ON cities.name_countrie=countries.ID_countrie 
		INNER JOIN people ON cities.mayor=people.ID_people");

	while($row = mysqli_fetch_array($res)){
		echo "<tr>";
   		echo "<form  action='edit_cities.php' method='POST'> 
    	<td><input type='submit' name='delete' value='Видалити'>
    	<input style='visibility: hidden;' type='text' size='10' name='city_name' value='".$row['ID_city']."'></td>";		
   		echo "<td>".$row['ID_city']."</td>";
   		echo "<td>".$row['name_city']."</td>";
   		echo "<td>".$row['name_countrie']."</td>";
   		echo "<td>".$row['number_of_residents']."</td>";
   		echo "<td>".$row['last_name']." ".$row['first_name']."</td>";
   		echo "</form></tr>"; 
	}
}

?>