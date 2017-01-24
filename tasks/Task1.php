<?php

header("Content-Type: text/html; charset=utf-8");
?>

<!DOCTYPE html><html>
<head><meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Рух літаків</title>
    <style type="text/css">
    	.main {
    		width: 500px;
    		border: 4px double black;
    	}
    	
     </style>
 
</head>
<body>
	<form  action="fromfile.php" method="POST"> 
     Вивести інформацію про літаки:
     <br/><input type="submit" value="OK">
	</form>
</br>

<div  class="main">
	<form  action="file.php" method="POST"> 
	<div class="field">
    Добавлення нового запису у файл:
    </div>
    <table>
    <tr>
    <div class="field">
    <td> Назва рейсу:</td> <td><input required type="text" name="name_flight"></td>
	</div>
	</tr>
	<tr>
	<div class="field">
	<td>Назва компанії, що здійснює перевезення:</td> <td><input type="text" name="name_company" value="невідомо"></td>
	</div>
	</tr>
	<tr>
	<div class="field">
	<td>Прізвище пілота:</td> <td><input required type="text" name="pilot_surname"></td>
	</div>
	</tr>
	<tr>
	<div class="field">
	<td>Ім'я пілота:</td> <td><input type="text" name="pilot_name" value="невідомо"></td>
	</div>
	</tr>
	<tr>
	<div class="field">
	<td>Пункт відправлення:</td> <td><input required type="text" name="city_from"></td>
	</div>
	</tr>
	<tr>
	<div class="field">
	<td>Пункт призначення:</td> <td><input required type="text" name="city_to"></td>
	</div>
	</tr>
	<tr>
	<div class="field">
	<td>Вартість квитка:</td> <td><input type="number" name="price" step="0.01" value="0"> </td>
	</div>
	</tr>
	<tr>
	<div class="field">
	<td>Час вильоту:</td> <td><input required type="datetime" name="time"></td>
	</div>
	</tr>
	<tr>
	<div class="field">
	<td>Марка літака:</td> <td><input type="text" name="mark" value="невідомо"></td>
	</div>
	</tr>
	</table>
	<input type="submit" value="OK">
	</form>
</div>
</br>

	<form  action="ticket_price.php" method="POST"> 
     Вивести усі рейси в порядку зростання вартості квитка:
     <br/><input type="submit" value="OK">
	</form>
</br>


	<form  action="lviv.php" method="POST"> 
     Обчислити кількість рейсів, що відлітають до Львова:
     <br/><input type="submit" value="OK">
	</form>
</br>

	<form  action="pilot.php" method="POST"> 
     Рейси, за штурвалом яких будуть пілоти з прізвищем, що містить задані символи: 
     <input type="text" name="pilot">
     <br/><input type="submit" value="OK">
	</form>

</body>
</html>