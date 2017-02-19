<?php
header("Content-Type: text/html; charset=utf-8");

include ("connect.php");

if (isset($_POST['from_file'])) {
	$block="mark";
	include ("block.php");

	include ("DB_class.php");

	$db = new DB_class ($host, $user, $password, $dbname);

	$what = '*';
	$from = 'mark_airplanes';
	
	$res=$db->select($what, $from);

	for ($i = 0; $i < count($res); $i++) {
   		echo "<tr>";
   		echo "<td>".$res[$i]['ID_mark']."</td><td>".$res[$i]['mark_name']."</td>";
   		echo "</tr>"; 
	}
	$db->closeConnection();
}
 
if (isset($_POST['to_file'])) {
	include ("DB_class.php");
	
	$db = new DB_class ($host, $user, $password, $dbname);

	$table="mark_airplanes";
	$fields="mark_name";
	$values=$_POST['mark_name'];

	$db->insert($table, $fields, $values);

	$db->closeConnection();
}

if (isset($_POST['edit_file'])) {
	$block="mark_edit";
	include ("block.php");
	include ("DB_class.php");

	$db = new DB_class ($host, $user, $password, $dbname);
	
	$what = '*';
	$from = 'mark_airplanes';
	
	$res=$db->select($what, $from);

		for ($i = 0; $i < count($res); $i++) {
   		echo "<tr>";
   		echo "<form  action='edit_marks.php' method='POST'> 
   		<td><input type='submit' name='edit' value='Зберегти зміни'>
   		<input style='visibility: hidden;' type='text' size='10' name='ID_mark' value='".$res[$i]['ID_mark']."'></td>
    	<td><input type='text' size='10' name='mark_name' value='".$res[$i]['mark_name']."'></td>";
   		echo "</form></tr>"; 
	}

	$db->closeConnection();
}

if (isset($_POST['delete_file'])) {
	$block="mark_delete";
	include ("block.php");

	include ("DB_class.php");

	$db = new DB_class ($host, $user, $password, $dbname);

	$what = '*';
	$from = 'mark_airplanes';
	
	$res=$db->select($what, $from);

	for ($i = 0; $i < count($res); $i++) {
   		echo "<tr>";
   		echo "<form  action='edit_marks.php' method='POST'> 
    	<td><input type='submit' name='delete' value='Видалити'>
    	<input style='visibility: hidden;' type='text' size='10' name='mark' value='".$res[$i]['ID_mark']."'></td>
    	<td>".$res[$i]['ID_mark']."</td>
    	<td>".$res[$i]['mark_name']."</td>";
   		echo "</form></tr>"; 
	}
	$db->closeConnection();
}

?>