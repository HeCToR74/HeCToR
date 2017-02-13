<?php

   header("Content-Type: text/html; charset=utf-8");


$host = "localhost";
$db="flight_db";
$user = "root";
$password = ""; 
$dbh = mysqli_connect($host, $user, $password, $db) or die("Не можу з'єднатися з MySQLi.");

if (isset($_POST['delete'])) {
    $res = mysqli_query ($dbh, "SELECT * FROM flight WHERE ID_flight='".$_POST['name_flight']."'");

  while($row = mysqli_fetch_array($res)){
    echo "Вилучено рейс: ".$row['ID_flight'];
  }
  mysqli_query ($dbh, "DELETE FROM flight WHERE ID_flight='".$_POST['name_flight']."'");
  
}

if (isset($_POST['edit'])) {
    $res = mysqli_query ($dbh, "UPDATE flight SET 
      flight_title='".$_POST["name_flight_new"]."', 
      company_name='".$_POST["company_name"]."', 
      city_from='".$_POST["city_from"]."',
      city_to='".$_POST["city_to"]."',
      ticket_price='".$_POST["ticket_price"]."',
      time_of_departure='".$_POST["time_of_departure"]."',
      mark_airplane='".$_POST["mark_airplane"]."' 
      WHERE flight_title='".$_POST["name_flight"]."'");
 
    if ($res == 'true'){
      echo "Дані успішно оновлені.";
    }
    else {
      echo "Дані не оновлені!";
    }
}

mysqli_close($dbh);
?>

