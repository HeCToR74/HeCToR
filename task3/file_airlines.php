<?php
header("Content-Type: text/html; charset=utf-8");

include ("connect.php");

if (isset($_POST['from_file'])) {
	$block="airline";
	include ("block.php");

	include ("airlines.php");
	
	$db = new Airlines ($host, $user, $password, $db);
	
	$res=$db->select('airlines.ID_airline, airlines.name_airline, airlines.year, airlines.address, people.last_name, people.first_name', 'airlines', 'people', 'airlines.president=people.ID_people');

	for ($i = 0; $i < count($res); $i++) {
		echo "<tr>";
   		echo "<td>".$res[$i]['ID_airline']."</td>";
   		echo "<td>".$res[$i]['name_airline']."</td>";
   		echo "<td>".$res[$i]['year']."</td>";
   		echo "<td>".$res[$i]['address']."</td>";
   		echo "<td>".$res[$i]['last_name']." ".$res[$i]['first_name']."</td>";
   		echo "</tr>"; 
	}

}

if (isset($_POST['to_file'])) {
	$strSQL="INSERT INTO airlines(";
	$strSQL=$strSQL."name_airline, ";
	$strSQL=$strSQL."year, ";
	$strSQL=$strSQL."address, ";
	$strSQL=$strSQL."president) ";

	$strSQL = $strSQL . 'VALUES("';
	$strSQL = $strSQL . $_POST['name_airline'].'", "';
	$strSQL = $strSQL . $_POST['year'].'", "';
	$strSQL = $strSQL . $_POST['address'].'", "';

	$words=explode (" ", $_POST['president']);
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
	include ("block_edit_airlines.php");

	$res = mysqli_query ($dbh, "SELECT * FROM airlines");
	while($row = mysqli_fetch_array($res)){
   		echo "<tr>";
   		echo "<form  action='edit_airlines.php' method='POST'> 
   		<td><input type='submit' name='edit' value='Зберегти зміни'>
   		<input style='visibility: hidden;' type='text' size='10' name='company_name' value='".$row['company_name']."'></td>
    	<td><input type='text' size='10' name='company_name_new' value='".$row['company_name']."'></td>
    	<td><input type='text' size='15' name='foundation_year' value='".$row['foundation_year']."'></td>
    	<td><textarea name='address'>".$row['address']."</textarea></td>
    	<td><input type='text' size='20' name='president_name' value='".$row['president_name']."'></td>";
   		echo "</form></tr>"; 
	}	
}

if (isset($_POST['delete_file'])) {
	$block="airline_delete";
	include ("block.php");
    
	$res = mysqli_query ($dbh, "SELECT airlines.ID_airline, airlines.name_airline, airlines.year, airlines.address, people.last_name, people.first_name
		FROM airlines 
		INNER JOIN people ON airlines.president=people.ID_people");

	while($row = mysqli_fetch_array($res)){
   		echo "<tr>";
   		echo "<form  action='edit_airlines.php' method='POST'> 
    	<td><input type='submit' name='delete' value='Видалити'>
    	<input style='visibility: hidden;' type='text' size='10' name='company_name' value='".$row['ID_airline']."'></td>";
   		echo "<td>".$row['ID_airline']."</td>";
   		echo "<td>".$row['name_airline']."</td>";
   		echo "<td>".$row['year']."</td>";
   		echo "<td>".$row['address']."</td>";
   		echo "<td>".$row['last_name']." ".$row['first_name']."</td>";
   		echo "</form></tr>"; 
	}
}


?>