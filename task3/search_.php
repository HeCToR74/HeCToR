<?php
header("Content-Type: text/html; charset=utf-8");

include ("connect.php");

if (isset($_POST['search1'])){
	
	$s="SELECT flight.ID_flight, airlines.name_airline, cities.name_city AS city_from, cities_2.name_city AS city_to, flight.price, flight.time, mark_airplanes.mark_name
		FROM flight 
		INNER JOIN  airlines ON flight.name_company=airlines.ID_airline 
		INNER JOIN cities ON flight.city_from=cities.ID_city INNER JOIN cities AS cities_2 ON flight.city_to=cities_2.ID_city
		INNER JOIN mark_airplanes ON flight.mark=mark_airplanes.ID_mark
		WHERE ID_flight LIKE '%".$_POST['flight_title']."%' ".$_POST['radiobutton']." (cities.name_city LIKE '%".$_POST['city_name']."%' OR cities_2.name_city LIKE '%".$_POST['city_name']."%') ".$_POST['radiobutton']." airlines.name_airline LIKE '%".$_POST['company_name']."%' ";

	$flag='';	
	$block="flight";
	include ("block.php");
	
	$res = mysqli_query ($dbh, $s);

	while($row = mysqli_fetch_array($res)){
   		echo "<tr>";
   		echo "<td>".$row['ID_flight']."</td><td>".$row['name_airline']."</td><td>".$row['city_from']."</td><td>".$row['city_to']."</td><td>".$row['price']."</td><td>".$row['time']."</td><td>".$row['mark_name']."</td>";
   		echo "</tr>"; 
	}
}


if (isset($_POST['search2'])){
	$block="flight";
	include ("block.php");
	
	$res = mysqli_query ($dbh, "SELECT flight.ID_flight, airlines.name_airline, cities.name_city AS city_from, cities_2.name_city AS city_to, flight.price, flight.time, mark_airplanes.mark_name
		FROM flight 
		INNER JOIN  airlines ON flight.name_company=airlines.ID_airline 
		INNER JOIN cities ON flight.city_from=cities.ID_city 
		INNER JOIN cities AS cities_2 ON flight.city_to=cities_2.ID_city
		INNER JOIN mark_airplanes ON flight.mark=mark_airplanes.ID_mark
		WHERE cities.name_city='".$_POST['city_from']."'".
		$_POST['radiobutton'].
		" cities_2.name_city='".$_POST['city_to']."'".
		$_POST['radiobutton'].
		" airlines.name_airline='".$_POST['company_name']."'".
		$_POST['radiobutton'].
		" mark_airplanes.mark_name='".$_POST['mark']."'
		");


	while($row = mysqli_fetch_array($res)){
   		echo "<tr>";
   		echo "<td>".$row['ID_flight']."</td><td>".$row['name_airline']."</td><td>".$row['city_from']."</td><td>".$row['city_to']."</td><td>".$row['price']."</td><td>".$row['time']."</td><td>".$row['mark_name']."</td>";
   		echo "</tr>"; 
	}
}


if (isset($_POST['search3'])){
	$res = mysqli_query ($dbh, "SELECT mark_airplanes.mark_name, airlines.name_airline
	   FROM flight, mark_airplanes, airlines 
	   WHERE flight.name_company='".$_POST['company_name']."' AND flight.mark=mark_airplanes.ID_mark AND 
	   	flight.name_company=airlines.ID_airline");
	$res1 = mysqli_query ($dbh, "SELECT name_airline
	   FROM airlines 
	   WHERE airlines.ID_airline='".$_POST['company_name']."'");

	while($row = mysqli_fetch_array($res1)){
   		echo "Марки літаків, що використовуються компанією ".$row['name_airline'].":";
		echo "</br>";
   	}
	
	while($row = mysqli_fetch_array($res)){
   		echo $row['mark_name']." ";
   	}
}

if (isset($_POST['search4'])){
	$res = mysqli_query ($dbh, "SELECT cities.name_city
	   FROM flight, cities 
	   WHERE flight.name_company='".$_POST['company_name']."' AND (flight.city_from=cities.ID_city OR flight.city_to=cities.ID_city)");
	
	$res1 = mysqli_query ($dbh, "SELECT name_airline
	   FROM airlines 
	   WHERE airlines.ID_airline='".$_POST['company_name']."'");

	while($row = mysqli_fetch_array($res1)){
   		echo "Міста, в які літають літаки авіакомпанії ".$row['name_airline'].":";
		echo "</br>"; 
   	}

	while($row = mysqli_fetch_array($res)){
   		echo $row['name_city']." ";
   	}	
}


if (isset($_POST['search5'])){

	$res = mysqli_query ($dbh, "SELECT * FROM flight");

	$i=0;
	while($row = mysqli_fetch_array($res)){
		$a[$i][0]=$row['city_from'];
		$a[$i][1]=$row['city_to'];
		echo $a[$i][0]." ".$a[$i][1];		
		echo "</br>";
   		$i++;
   	}
	
	function  rec($start ,$finish){
		for ($i=0; $i <count($a) ; $i++) { 
			if ($a[$i][0]==$start){
				if ($a[$i][1]==$finish) {
					$result="Долетіти можна";
					return $result;
				}
				else {
					rec($a[$i][1], $finish);
				}
			}
		}

		$result="Долетіти не можна";
		return $result;	
	}

echo "</br>";
echo $_POST['city_from']." ".$_POST['city_to'];
echo "</br>";

	echo rec($_POST['city_from'], $_POST['city_to']);

}


mysqli_close($dbh);

?>