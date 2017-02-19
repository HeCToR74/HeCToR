<?php

include ("connect.php");

if (isset($_POST['from_file'])) {
	$block="people";
	include ("block.php");

	include ("DB_class.php");

	$db = new DB_class ($host, $user, $password, $dbname);

	$what = '*';
	$from = 'people';
	
	$res=$db->select($what, $from);

	for ($i = 0; $i < count($res); $i++) {
   		echo "<tr>";
   		echo "<td>".$res[$i]['ID_people']."</td>";
   		echo "<td>".$res[$i]['last_name']."</td>";
   		echo "<td>".$res[$i]['first_name']."</td>";
   		echo "</tr>"; 
	}
	$db->closeConnection();
}

if (isset($_POST['to_file'])) {
	include ("DB_class.php");
	
	$db = new DB_class ($host, $user, $password, $dbname);

	$table="people";
	$fields="last_name, first_name";
	$values=$_POST['last_name'].'", "'. $_POST['first_name'];

	$db->insert($table, $fields, $values);

	$db->closeConnection();

}

if (isset($_POST['edit_file'])) {
	$block="people_edit";
	include ("block.php");
	include ("DB_class.php");

	$db = new DB_class ($host, $user, $password, $dbname);
	
	$what = '*';
	$from = 'people';
	
	$res=$db->select($what, $from);

		for ($i = 0; $i < count($res); $i++) {
   		echo "<tr>";
   		echo "<form  action='edit_people.php' method='POST'> 
   		<td><input type='submit' name='edit' value='Зберегти зміни'>
   		<input style='visibility: hidden;' type='text' size='10' name='ID_people' value='".$res[$i]['ID_people']."'></td>
    	<td><input type='text' size='10' name='last_name' value='".$res[$i]['last_name']."'></td>
    	<td><input type='text' size='10' name='first_name' value='".$res[$i]['first_name']."'></td>";
   		echo "</form></tr>"; 
	}

	$db->closeConnection();
}

if (isset($_POST['delete_file'])) {
	$block="people_delete";
	include ("block.php");

	include ("DB_class.php");

	$db = new DB_class ($host, $user, $password, $dbname);

	$what = '*';
	$from = 'people';
	
	$res=$db->select($what, $from);

	for ($i = 0; $i < count($res); $i++) {
   		echo "<tr>";
   		echo "<form  action='edit_people.php' method='POST'> 
    	<td><input type='submit' name='delete' value='Видалити'>
    	<input style='visibility: hidden;' type='text' size='10' name='ID_people' value='".$res[$i]['ID_people']."'></td>
    	<td>".$res[$i]['ID_people']."</td>
    	<td>".$res[$i]['last_name']."</td>
    	<td>".$res[$i]['first_name']."</td>";
   		echo "</form></tr>"; 
	}
	$db->closeConnection();
}

?>