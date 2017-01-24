<?php
header("Content-Type: text/html; charset=utf-8");


$lines = file('base.txt');
$n=count($lines);

$flag=true;
for ($i=0; $i<$n; $i++){
	$words=explode ("\t", $lines[$i]);
   	if ($words[0]===$_POST["name_flight"]){
   		$flag=false;
    }
}

if ($flag){
	echo "<title>Дані було внесено!</title>";
	$f = fopen("base.txt", "a");
	fwrite($f, $_POST["name_flight"]."\t".$_POST["name_company"]."\t".$_POST["pilot_surname"]."\t".$_POST["pilot_name"]."\t".$_POST["city_from"]."\t".$_POST["city_to"]."\t".$_POST["price"]."\t".$_POST["time"]."\t".$_POST["mark"].PHP_EOL); 
	fclose($f);

	echo "Дані було внесено!";
}
else {
	echo "<title>Помилка введення!</title>";
	echo "<h1>ПОМИЛКА!!!</h1>";
	echo "Назви рейсів не можуть співпадати!!!";
}

?>