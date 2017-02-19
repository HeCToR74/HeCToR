<?php
header("Content-Type: text/html; charset=utf-8");

include ("connect.php");

if (isset($_POST['from_file'])) {
	$block="countrie";
	include ("block.php");

	include ("DB_class.php");

	$db = new DB_class ($host, $user, $password, $dbname);

	$what = '*';
	$from = 'countries';
	
	$res=$db->select($what, $from);

	for ($i = 0; $i < count($res); $i++) {
   		echo "<tr>";
   		echo "<td>".$res[$i]['ID_countrie']."</td><td>".$res[$i]['name_countrie']."</td>";
   		echo "</tr>"; 
	}
	$db->closeConnection();
}

if (isset($_POST['to_file'])) {
	include ("DB_class.php");
	
	$db = new DB_class ($host, $user, $password, $dbname);

	$table="countries";
	$fields="name_countrie";
	$values=$_POST['name_countrie'];

	$db->insert($table, $fields, $values);

	$db->closeConnection();
}

if (isset($_POST['edit_file'])) {
	$block="countrie_edit";
	include ("block.php");
	include ("DB_class.php");

	$db = new DB_class ($host, $user, $password, $dbname);
	
	$what = '*';
	$from = 'countries';
	
	$res=$db->select($what, $from);

		for ($i = 0; $i < count($res); $i++) {
   		echo "<tr>";
   		echo "<form  action='edit_countries.php' method='POST'> 
   		<td><input type='submit' name='edit' value='Зберегти зміни'>
   		<input style='visibility: hidden;' type='text' size='10' name='countrie_ID' value='".$res[$i]['ID_countrie']."'></td>
    	<td><input type='text' size='10' name='countrie_name' value='".$res[$i]['name_countrie']."'></td>";
   		echo "</form></tr>"; 
	}

	$db->closeConnection();

}

if (isset($_POST['delete_file'])) {
	$block="countrie_delete";
	include ("block.php");

	include ("DB_class.php");

	$db = new DB_class ($host, $user, $password, $dbname);

	$what = '*';
	$from = 'countries';
	
	$res=$db->select($what, $from);

	for ($i = 0; $i < count($res); $i++) {
   		echo "<tr>";
   		echo "<form  action='edit_countries.php' method='POST'> 
    	<td><input type='submit' name='delete' value='Видалити'>
    	<input style='visibility: hidden;' type='text' size='10' name='name_countrie' value='".$res[$i]['ID_countrie']."'></td>
    	<td>".$res[$i]['ID_countrie']."</td>
    	<td>".$res[$i]['name_countrie']."</td>";
   		echo "</form></tr>"; 
	}
	$db->closeConnection();

}

?>