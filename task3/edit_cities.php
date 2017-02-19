<?php

   header("Content-Type: text/html; charset=utf-8");


include ("connect.php");

if (isset($_POST['delete'])) {
    include ("DB_class.php");
    $db = new DB_class ($host, $user, $password, $dbname);

    $what = '*';
    $from = 'cities';
    $where = 'ID_city='.$_POST['ID_city'];


    $res=$db->select($what, $from, $inner_join1 = null, $inner_join2 = null,  $where, $order = null);

    echo "Вилучено місто: ".$res[0]['name_city'];

    $table="cities";
    $where=" ID_city";
    $name=$res[0]['ID_city'];
    $db->delete($table, $where, $name);

    $db->closeConnection();

}

if (isset($_POST['edit'])) {
    include ("DB_class.php");
    $db = new DB_class ($host, $user, $password, $dbname);

    $table="cities";
    
    $values="name_city='".$_POST["name_city"]."', 
      name_countrie='".$_POST["name_countrie"]."', 
      number_of_residents='".$_POST["number_of_residents"]."',
      mayor='".$_POST["mayor"]."'";
    $where=" ID_city";
    $id=$_POST['ID_city'];
    
    $db->insert($table, null, $values, $where, $id);

    $db->closeConnection();
}

?>

