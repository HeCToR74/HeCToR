<?php
include ("connect.php");
include ("DB_class.php")
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
                        $db = new DB_class ($host, $user, $password, $dbname);

                        $what="ID_city, name_city";
                        $from="cities";

                        $res=$db->select($what, $from);

                        for ($i = 0; $i < count($res); $i++){
                            echo "<option>".$res[$i]['name_city']."</option>";
                        }
                        $db->closeConnection();
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
                        $db = new DB_class ($host, $user, $password, $dbname);

                        $what="ID_city, name_city";
                        $from="cities";

                        $res=$db->select($what, $from);

                        for ($i = 0; $i < count($res); $i++){
                            echo "<option>".$res[$i]['name_city']."</option>";
                        }
                        $db->closeConnection();
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
                        $db = new DB_class ($host, $user, $password, $dbname);

                        $what="ID_airline, name_airline";
                        $from="airlines";

                        $res=$db->select($what, $from);

                        for ($i = 0; $i < count($res); $i++){
                            echo "<option>".$res[$i]['name_airline'].
                                            "</option>";
                        }
                        $db->closeConnection();
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
                        $db = new DB_class ($host, $user, $password, $dbname);

                        $what="ID_mark, mark_name";
                        $from="mark_airplanes";

                        $res=$db->select($what, $from);

                        for ($i = 0; $i < count($res); $i++){
                            echo "<option>".$res[$i]['mark_name']."</option>";
                        }
                        $db->closeConnection();
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
                        $db = new DB_class ($host, $user, $password, $dbname);

                        $what="ID_airline, name_airline";
                        $from="airlines";

                        $res=$db->select($what, $from);

                        for ($i = 0; $i < count($res); $i++){
                            echo "<option value='".$res[$i]['ID_airline']."'>".$res[$i]['name_airline']."</option>";
                        }
                        $db->closeConnection();
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
                        $db = new DB_class ($host, $user, $password, $dbname);

                        $what="ID_airline, name_airline";
                        $from="airlines";

                        $res=$db->select($what, $from);

                        for ($i = 0; $i < count($res); $i++){
                            echo "<option value='".$res[$i]['ID_airline']."'>".$res[$i]['name_airline']."</option>";
                        }
                        $db->closeConnection();
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
                        $db = new DB_class ($host, $user, $password, $dbname);

                        $what="ID_city, name_city";
                        $from="cities";

                        $res=$db->select($what, $from);

                        for ($i = 0; $i < count($res); $i++){
                            echo "<option value='".$res[$i]['ID_city']."'>".$res[$i]['name_city']."</option>";
                        }
                        $db->closeConnection();
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>в місто </td>
                <td>                    
                    <select name="city_to">
                        <?php
                        $db = new DB_class ($host, $user, $password, $dbname);

                        $what="ID_city, name_city";
                        $from="cities";

                        $res=$db->select($what, $from);

                        for ($i = 0; $i < count($res); $i++){
                            echo "<option value='".$res[$i]['ID_city']."'>".$res[$i]['name_city']."</option>";
                        }
                        $db->closeConnection();
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