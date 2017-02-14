<?php

   header("Content-Type: text/html; charset=utf-8");


include ("connect.php");

if (isset($_POST['delete'])) {
    $res = mysqli_query ($dbh, "SELECT * FROM airlines WHERE ID_airline='".$_POST["company_name"]."'");
    $row = mysqli_fetch_array($res);
    echo "Вилучено авіакомпанію: ".$row['name_airline'];

    mysqli_query ($dbh, "DELETE FROM airlines WHERE ID_airline='".$_POST["company_name"]."'");
}

if (isset($_POST['edit'])) {
    $res = mysqli_query ($dbh, "UPDATE airlines SET 
      company_name='".$_POST["company_name_new"]."', 
      foundation_year='".$_POST["foundation_year"]."', 
      address='".$_POST["address"]."',
      president_name='".$_POST["president_name"]."' 
      WHERE company_name='".$_POST["company_name"]."'");
 
    if ($res == 'true'){
      echo "Дані успішно оновлені.";
    }
    else {
      echo "Дані не оновлені!";
    }
}


mysqli_close($dbh);
?>

