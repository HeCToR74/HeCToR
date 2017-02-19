<?php

include ("connect.php");

if (isset($_POST['delete'])) {
    include ("DB_class.php");
    $db = new DB_class ($host, $user, $password, $dbname);

    $what = '*';
    $from = 'mark_airplanes';
    $where = 'ID_mark='.$_POST['mark'];


    $res=$db->select($what, $from, $inner_join1 = null, $inner_join2 = null,  $where, $order = null);

    echo "Вилучено марку літака: ".$res[0]['mark_name'];

    $table="mark_airplanes";
    $where=" ID_mark";
    $name=$res[0]['ID_mark'];
    $db->delete($table, $where, $name);

    $db->closeConnection();
}

if (isset($_POST['edit'])) {
    include ("DB_class.php");
    $db = new DB_class ($host, $user, $password, $dbname);

    $table="mark_airplanes";
    
    $values="mark_name ='".$_POST["mark_name"]."'";
    $where=" ID_mark";
    $id=$_POST['ID_mark'];
    
    $db->insert($table, null, $values, $where, $id);

    $db->closeConnection();
}

?>

