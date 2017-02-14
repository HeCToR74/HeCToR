<?php

   header("Content-Type: text/html; charset=utf-8");


include ("connect.php");

if (isset($_POST['delete'])) {
    $res = mysqli_query ($dbh, "SELECT * FROM countries WHERE ID_countrie='".$_POST['name_countrie']."'");
    $row = mysqli_fetch_array($res);
    echo "Вилучено країну: ".$row['name_countrie'];

    mysqli_query ($dbh, "DELETE FROM countries WHERE ID_countrie='".$_POST['name_countrie']."'");
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

