<?php

   header("Content-Type: text/html; charset=utf-8");

include ("connect.php");

if (isset($_POST['delete'])) {
    include ("DB_class.php");
    $db = new DB_class ($host, $user, $password, $dbname);

    $what = '*';
    $from = 'countries';
    $where = 'ID_countrie='.$_POST['name_countrie'];


    $res=$db->select($what, $from, $inner_join1 = null, $inner_join2 = null,  $where, $order = null);

    echo "Вилучено країну: ".$res[0]['name_countrie'];

    $table="countries";
    $where=" ID_countrie";
    $name=$res[0]['ID_countrie'];
    $db->delete($table, $where, $name);

    $db->closeConnection();

}

if (isset($_POST['edit'])) {
    include ("DB_class.php");
    $db = new DB_class ($host, $user, $password, $dbname);

    $table="countries";
    
    $values="name_countrie ='".$_POST["countrie_name"]."'";
    $where=" ID_countrie";
    $id=$_POST['countrie_ID'];
    
    $db->insert($table, null, $values, $where, $id);

    $db->closeConnection();

}

?>

