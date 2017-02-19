<?php

include ("connect.php");

if (isset($_POST['from_file'])) {
	$block="airline";
	include ("block.php");

	include ("DB_class.php");
	
	$db = new DB_class ($host, $user, $password, $dbname);
	
	$what = 'airlines.ID_airline, airlines.name_airline, airlines.year, airlines.address, people.last_name, people.first_name';
	$from = 'airlines';
	$inner_join1 = 'people';
	$inner_join2 = 'airlines.president = people.ID_people';

	$res=$db->select($what, $from, $inner_join1, $inner_join2);

	for ($i = 0; $i < count($res); $i++) {
		echo "<tr>";
   		echo "<td>".$res[$i]['ID_airline']."</td>";
   		echo "<td>".$res[$i]['name_airline']."</td>";
   		echo "<td>".$res[$i]['year']."</td>";
   		echo "<td>".$res[$i]['address']."</td>";
   		echo "<td>".$res[$i]['last_name']." ".$res[$i]['first_name']."</td>";
   		echo "</tr>"; 
	}

	$db->closeConnection();

}

if (isset($_POST['to_file'])) {

	include ("DB_class.php");
	
	$db = new DB_class ($host, $user, $password, $dbname);

	$table="airlines";
	$fields="name_airline, year, address, president";
	
	$values=$_POST['name_airline'].'", "'. $_POST['year'].'", "'. $_POST['address'].'", "';

	$words=explode (" ", $_POST['president']);
	$res = mysqli_query ($dbh, "SELECT * FROM people WHERE last_name='".$words[0]."' AND first_name='".$words[1]."'");
	$row = mysqli_fetch_array($res);

	$values=$values.$row['ID_people'];

	$db->insert($table, $fields, $values);

	$db->closeConnection();

}


if (isset($_POST['edit_file'])) {
	$block="airline_edit";
	include ("block.php");
	include ("DB_class.php");
	
	$db = new DB_class ($host, $user, $password, $dbname);
	
	$what = 'airlines.ID_airline, airlines.name_airline, airlines.year, airlines.address, people.last_name, people.first_name';
	$from = 'airlines';
	$inner_join1 = 'people';
	$inner_join2 = 'airlines.president = people.ID_people';

	$res=$db->select($what, $from, $inner_join1, $inner_join2);

	for ($i = 0; $i < count($res); $i++) {
   		echo "<tr>";
   		echo "<form  action='edit_airlines.php' method='POST'> 
   		<td><input type='submit' name='edit' value='Зберегти зміни'>
   		<input style='visibility: hidden;' type='text' size='10' name='company_ID' value='".$res[$i]['ID_airline']."'></td>
    	<td><input type='text' size='10' name='company_name' value='".$res[$i]['name_airline']."'></td>
    	<td><input type='text' size='15' name='foundation_year' value='".$res[$i]['year']."'></td>
    	<td><textarea name='address'>".$res[$i]['address']."</textarea></td>
    	<td><input type='text' size='20' name='president_name' value='".$res[$i]['last_name']." ".$res[$i]['first_name']."'></td>";
   		echo "</form></tr>"; 
	}

	$db->closeConnection();
}

if (isset($_POST['delete_file'])) {
	$block="airline_delete";
	include ("block.php");
    
	include ("DB_class.php");
	
	$db = new DB_class ($host, $user, $password, $dbname);
	
	$what = 'airlines.ID_airline, airlines.name_airline, airlines.year, airlines.address, people.last_name, people.first_name';
	$from = 'airlines';
	$inner_join1 = 'people';
	$inner_join2 = 'airlines.president = people.ID_people';

	$res=$db->select($what, $from, $inner_join1, $inner_join2);

	for ($i = 0; $i < count($res); $i++) {
   		echo "<tr>";
   		echo "<form  action='edit_airlines.php' method='POST'> 
    	<td><input type='submit' name='delete' value='Видалити'>
    	<input style='visibility: hidden;' type='text' size='10' name='company_name' value='".$res[$i]['ID_airline']."'></td>";
   		echo "<td>".$res[$i]['ID_airline']."</td>";
   		echo "<td>".$res[$i]['name_airline']."</td>";
   		echo "<td>".$res[$i]['year']."</td>";
   		echo "<td>".$res[$i]['address']."</td>";
   		echo "<td>".$res[$i]['last_name']." ".$res[$i]['first_name']."</td>";
   		echo "</form></tr>"; 
	}

	$db->closeConnection();
}


?>