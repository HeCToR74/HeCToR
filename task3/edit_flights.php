<?php

include ("connect.php");

if (isset($_POST['delete'])) {

    include ("DB_class.php");
    $db = new DB_class ($host, $user, $password, $dbname);

    echo "Вилучено рейс: ".$_POST['ID_flight'];

    $table="flight";
    $where=" ID_flight";
    $name=$_POST['ID_flight'];
    $db->delete($table, $where, $name);

    $db->closeConnection();
}

if (isset($_POST['edit'])) {
    include ("DB_class.php");
    $db = new DB_class ($host, $user, $password, $dbname);

    $table="flight";
    
    $values="name_airline='".$_POST["name_airline"]."', 
      city_from='".$_POST["city_from"]."',
      city_to='".$_POST["city_to"]."',
      price='".$_POST["price"]."',
      time='".$_POST["time"]."',
      mark_name='".$_POST["mark_name"]."'";
    $where=" ID_flight";
    $id=$_POST['ID_flight'];
    
    $db->insert($table, null, $values, $where, $id);

    $db->closeConnection();
}

?>

