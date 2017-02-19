<?php
include ("connect.php");

if (isset($_POST['from_file'])) {
	$block="city";
	include ("block.php");

	include ("DB_class.php");
	
	$db = new DB_class ($host, $user, $password, $dbname);
	
	$what = 'cities.ID_city, cities.name_city, countries.name_countrie, cities.number_of_residents, people.last_name, people.first_name';
	$from = 'cities';
	$inner_join1 = ' countries ON cities.name_countrie=countries.ID_countrie 
		INNER JOIN people ';
	$inner_join2 = 'cities.mayor=people.ID_people';

	$res=$db->select($what, $from, $inner_join1, $inner_join2);

	for ($i = 0; $i < count($res); $i++) {
   		echo "<tr>";
   		echo "<td>".$res[$i]['ID_city']."</td>";
   		echo "<td>".$res[$i]['name_city']."</td>";
   		echo "<td>".$res[$i]['name_countrie']."</td>";
   		echo "<td>".$res[$i]['number_of_residents']."</td>";
   		echo "<td>".$res[$i]['last_name']." ".$res[$i]['first_name']."</td>";
   		echo "</tr>"; 
	}

	$db->closeConnection();
}

if (isset($_POST['to_file'])) {
	include ("DB_class.php");
	
	$db = new DB_class ($host, $user, $password, $dbname);

	$table="cities";
	$fields="name_city, name_countrie, number_of_residents, mayor";
	
	$values=$_POST['name_city'].'", "';

    $res = mysqli_query ($dbh, "SELECT * FROM countries WHERE name_countrie='".$_POST['country']."'");
	$row = mysqli_fetch_array($res);
	$values=$values.$row['ID_countrie'].'", "';
	$values=$values.$_POST['number_of_residents'].'", "';

	$words=explode (" ", $_POST['mayor_name']);
	$res = mysqli_query ($dbh, "SELECT * FROM people WHERE last_name='".$words[0]."' AND first_name='".$words[1]."'");
	$row = mysqli_fetch_array($res);
	
	$values=$values.$row['ID_people'];

	$db->insert($table, $fields, $values);

	$db->closeConnection();

}

if (isset($_POST['edit_file'])) {
	$block="city_edit";
	include ("block.php");
	include ("DB_class.php");
	
	$db = new DB_class ($host, $user, $password, $dbname);
	
	$what = 'cities.ID_city, cities.name_city, countries.name_countrie, cities.number_of_residents, people.last_name, people.first_name';
	$from = 'cities';
	$inner_join1 = ' countries ON cities.name_countrie=countries.ID_countrie 
		INNER JOIN people ';
	$inner_join2 = 'cities.mayor=people.ID_people';

	$res=$db->select($what, $from, $inner_join1, $inner_join2);


	for ($i = 0; $i < count($res); $i++) {
   		echo "<tr>";
   		echo "<form  action='edit_cities.php' method='POST'> 
   		<td><input type='submit' name='edit' value='Зберегти зміни'>
   		<input style='visibility: hidden;' type='text' size='10' name='ID_city' value='".$res[$i]['ID_city']."'></td>
    	<td><input type='text' size='10' name='name_city' value='".$res[$i]['name_city']."'></td>
    	<td><input type='text' size='15' name='name_countrie' value='".$res[$i]['name_countrie']."'></td>
    	<td><input type='text' name='number_of_residents'  value='".$res[$i]['number_of_residents']."'></td>
    	<td><input type='text' size='20' name='mayor' value='".$res[$i]['last_name']." ".$res[$i]['first_name']."'></td>";
   		echo "</form></tr>"; 
	}

	$db->closeConnection();
}

if (isset($_POST['delete_file'])) {
	$block="city_delete";
	include ("block.php");

	include ("DB_class.php");
	
	$db = new DB_class ($host, $user, $password, $dbname);
	
	$what = 'cities.ID_city, cities.name_city, countries.name_countrie, cities.number_of_residents, people.last_name, people.first_name';
	$from = 'cities';
	$inner_join1 = ' countries ON cities.name_countrie=countries.ID_countrie 
		INNER JOIN people ';
	$inner_join2 = 'cities.mayor=people.ID_people';

	$res=$db->select($what, $from, $inner_join1, $inner_join2);

	for ($i = 0; $i < count($res); $i++) {
   		echo "<tr>";
   		echo "<form  action='edit_cities.php' method='POST'> 
    	<td><input type='submit' name='delete' value='Видалити'>
    	<input style='visibility: hidden;' type='text' size='10' name='ID_city' value='".$res[$i]['ID_city']."'></td>";		
   		echo "<td>".$res[$i]['ID_city']."</td>";
   		echo "<td>".$res[$i]['name_city']."</td>";
   		echo "<td>".$res[$i]['name_countrie']."</td>";
   		echo "<td>".$res[$i]['number_of_residents']."</td>";
   		echo "<td>".$res[$i]['last_name']." ".$res[$i]['first_name']."</td>";
   		echo "</form></tr>"; 
	}

	$db->closeConnection();
}

?>