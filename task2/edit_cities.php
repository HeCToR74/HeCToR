<?php

   header("Content-Type: text/html; charset=utf-8");


include ("connect.php");

if (isset($_POST['delete'])) {
    $res = mysqli_query ($dbh, "SELECT * FROM cities WHERE ID_city='".$_POST['city_name']."'");
    $row = mysqli_fetch_array($res);
    echo "Вилучено місто: ".$row['name_city'];

    mysqli_query ($dbh, "DELETE FROM cities WHERE ID_city='".$_POST['city_name']."'");
}

if (isset($_POST['edit'])) {
    $res = mysqli_query ($dbh, "UPDATE cities SET 
      city_name='".$_POST["city_name_new"]."', 
      country='".$_POST["country"]."', 
      number_of_residents='".$_POST["number_of_residents"]."',
      mayor_name='".$_POST["mayor_name"]."' 
      WHERE city_name='".$_POST["city_name"]."'");
 
    if ($res == 'true'){
      echo "Дані успішно оновлені.";
    }
    else {
      echo "Дані не оновлені!";
    }
}




mysqli_close($dbh);
?>

