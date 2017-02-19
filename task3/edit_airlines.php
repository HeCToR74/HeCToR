<?php

include ("connect.php");

if (isset($_POST['delete'])) {
    
    include ("DB_class.php");
    $db = new DB_class ($host, $user, $password, $dbname);

    $what = '*';
    $from = 'airlines';
    $where = 'ID_airline='.$_POST['company_name'];


    $res=$db->select($what, $from, $inner_join1 = null, $inner_join2 = null,  $where, $order = null);

    echo "Вилучено авіакомпанію: ".$res[0]['name_airline'];

    $table="airlines";
    $where=" ID_airline";
    $name=$res[0]['ID_airline'];
    $db->delete($table, $where, $name);

    $db->closeConnection();
    
}


if (isset($_POST['edit'])) {
    include ("DB_class.php");
    $db = new DB_class ($host, $user, $password, $dbname);

    $table="airlines";
    
    $values="name_airline='".$_POST["company_name"]."', 
      year='".$_POST["foundation_year"]."', 
      address='".$_POST["address"]."',
      president='".$_POST["president_name"]."'";
    $where=" ID_airline";
    $id=$_POST['company_ID'];
    

    $db->insert($table, null, $values, $where, $id);

    $db->closeConnection();

}

?>

