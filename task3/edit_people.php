<?php

include ("connect.php");

if (isset($_POST['delete'])) {
    include ("DB_class.php");
    $db = new DB_class ($host, $user, $password, $dbname);

    $what = '*';
    $from = 'people';
    $where = 'ID_people='.$_POST['ID_people'];

    $res=$db->select($what, $from, $inner_join1 = null, $inner_join2 = null,  $where, $order = null);

    echo "Вилучено дані про: ".$res[0]['last_name']." ".$res[0]['first_name'];

    $table="people";
    $where=" ID_people";
    $name=$res[0]['ID_people'];
    $db->delete($table, $where, $name);

    $db->closeConnection();

}

if (isset($_POST['edit'])) {
    include ("DB_class.php");
    $db = new DB_class ($host, $user, $password, $dbname);

    $table="people";
    
    $values="last_name='".$_POST["last_name"]."', 
          first_name='".$_POST["first_name"]."'";
    $where=" ID_people";
    $id=$_POST['ID_people'];
    

    $db->insert($table, null, $values, $where, $id);

    $db->closeConnection();
}

?>

