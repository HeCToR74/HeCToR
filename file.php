<?php
$f = fopen("base.txt", "a");
fwrite($f, $_POST["name_flight"]."\t".$_POST["name_company"]."\t".$_POST["pilot_surname"]."\t".$_POST["pilot_name"]."\t".$_POST["city_from"]."\t".$_POST["city_to"]."\t".$_POST["price"]."\t".$_POST["time"]."\t".$_POST["mark"].PHP_EOL); 
fclose($f);
?>