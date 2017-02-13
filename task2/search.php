<?php

header("Content-Type: text/html; charset=utf-8");

$host = "localhost";
$db="flight_db";
$user = "root";
$password = ""; 
$dbh = mysqli_connect($host, $user, $password, $db) or die("Не можу з'єднатися з MySQLi.");
?>

<!DOCTYPE html><html>
<head><meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>Пошук</title>
    <style type="text/css">
    	.main {
    		position:relative; 
    		border:2px solid;
    		width: 320px;
    	}
           	
    </style>
 
</head>
<body>
<table>
<tr>
<td>
<div  class="main">
	Пошук всіх рейсів по частині назви
   	<form  action="search_.php" method="POST"> 
    	<table>
    		<tr>
    			<td>рейсу </td>
    			<td><input type="text" name="flight_title" value=" "></td>
    		</tr>
    		<tr>
    			<td>міста </td>
    			<td><input type="text" name="city_name" value=" "></td>
    		</tr>
    		<tr>
    			<td>авіакаомпанії </td>
    			<td><input type="text" name="company_name" value=" "></td>
    		</tr>
            <tr>
                <td><input type="submit" name="search1" value="Почати пошук"></td>
                <td> <input name="radiobutton" type="radio" value="AND" checked> І 
                <input name="radiobutton" type="radio" value="OR"> АБО </td>
            </tr>
    	</table>
		
	</form>
</div>
</td>
<td>
<div  class="main">
	Пошук усіх рейсів 
   	<form  action="search_.php" method="POST"> 
    	<table>
    		<tr>
    			<td> із заданого міста </td>
    			<td>                    
                    <select name="city_from">
                        <option></option>
                        <?php
                        $res = mysqli_query ($dbh, "SELECT ID_city, name_city FROM cities");
                        while($row = mysqli_fetch_array($res)){
                            echo "<option>".$row['name_city']."</option>";
                        }
                        ?>
                    </select>
                </td>
    		</tr>
    		<tr>
    			<td>в задане місто </td>
                <td>                    
                    <select name="city_to">
                        <option></option>
                        <?php
                        $res = mysqli_query ($dbh, "SELECT ID_city, name_city FROM cities");
                        while($row = mysqli_fetch_array($res)){
                            echo "<option>".$row['name_city']."</option>";
                        }
                        ?>
                    </select>
                </td>
    		</tr>
    		<tr>
    			<td>заданої компанії </td>
    			<td>                 
                    <select name="company_name">
                        <option></option>
                        <?php
                        $res = mysqli_query ($dbh, "SELECT ID_airline, name_airline FROM airlines");
                        while($row = mysqli_fetch_array($res)){
                            echo "<option>".$row['name_airline']."</option>";
                        }
                        ?>
                    </select>
                </td>
    		</tr>
    		<tr>
    			<td>заданої марки літака </td>
                <td>                    
                    <select name="mark">
                        <option></option>
                        <?php
                        $res = mysqli_query ($dbh, "SELECT ID_mark, mark_name FROM mark_airplanes");
                        while($row = mysqli_fetch_array($res)){
                            echo "<option>".$row['mark_name']."</option>";
                        }
                        ?>
                    </select>
                </td>
    		</tr>
            <tr>
                <td><input type="submit" name="search2" value="Почати пошук"></td>
                <td> <input name="radiobutton" type="radio" value="AND" checked> І 
                <input name="radiobutton" type="radio" value="OR"> АБО </td>
            </tr>
    	</table>
	</form>
</div>
</td>
</tr>
<tr>
<td>
<div  class="main">
	<form  action="search_.php" method="POST"> 
    	<table>
    		<tr>
    			<td>Пошук марок літаків, що використовуються заданою  компанією </td>
                <td>
        			<select name="company_name">
                        <?php
                        $res = mysqli_query ($dbh, "SELECT ID_airline, name_airline FROM airlines");
                        while($row = mysqli_fetch_array($res)){
                            echo "<option value='".$row['ID_airline']."'>".$row['name_airline']."</option>";
                        }
                        ?>
                    </select>
                </td>
    		</tr>
    	</table>
		<input type="submit" name="search3" value="Почати пошук">
	</form>
</div>
</td>
<td>
<div  class="main">
	<form  action="search_.php" method="POST"> 
    	<table>
    		<tr>
    			<td>Вивід усіх міст, в які літає дана компанія </td>
                <td>
                    <select name="company_name">
                        <?php
                        $res = mysqli_query ($dbh, "SELECT ID_airline, name_airline FROM airlines");
                        while($row = mysqli_fetch_array($res)){
                            echo "<option value='".$row['ID_airline']."'>".$row['name_airline']."</option>";
                        }
                        ?>
                    </select>
                </td>
    		</tr>
    	</table>
		<input type="submit" name="search4" value="Почати пошук">
	</form>
</div>
</td>
</tr>

<tr>
<td>
<div  class="main">
    <form  action="search_.php" method="POST"> 
        Чи можна долетіти
        <table>
            <tr>
                <td> із міста </td>
                <td>                    
                    <select name="city_from">
                        <?php
                        $res = mysqli_query ($dbh, "SELECT ID_city, name_city FROM cities");
                        while($row = mysqli_fetch_array($res)){
                            echo "<option value='".$row['ID_city']."'>".$row['name_city']."</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>в місто </td>
                <td>                    
                    <select name="city_to">
                        <?php
                        $res = mysqli_query ($dbh, "SELECT ID_city, name_city FROM cities");
                        while($row = mysqli_fetch_array($res)){
                            echo "<option value='".$row['ID_city']."'>".$row['name_city']."</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><input type="submit" name="search5" value="Пошук"></td>
                <td></td>
            </tr>
        </table>
    </form>
</div>
</td>
</tr>
</table>

</body>
</html>