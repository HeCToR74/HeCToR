<?php
// Створюємо клас Plane
class Coor {
	var $name_flight;
	var $name_company;
	var $pilot_surname;
	var $pilot_name;
	var $city_from;
	var $city_to;
	var $price;
	var $time;
	var $mark;


}

header("Content-Type: text/html; charset=utf-8");
?>

<!DOCTYPE html><html>
<head><meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Рух літаків</title>
    <style type="text/css">
    	.main {
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
    <div class="field">
    Назва рейсу: <input type="text" name="name_flight">
	</div>
	<div class="field">
	Назва компанії, що здійснює перевезення: <input type="text" name="name_company">
	</div>
	<div class="field">
	Прізвище пілота: <input type="text" name="pilot_surname">
	</div>
	<div class="field">
	Ім'я пілота: <input type="text" name="pilot_name">
	</div>
	<div class="field">
	Пункт відправлення: <input type="text" name="city_from">
	</div>
	<div class="field">
	Пункт призначення: <input type="text" name="city_to">
	</div>
	<div class="field">
	Вартість квитка: <input type="text" name="price">
	</div>
	<div class="field">
	Час вильоту: <input type="text" name="time">
	</div>
	<div class="field">
	Марка літака: <input type="text" name="mark">
	<br/><input type="submit" value="OK">
	</div>
	</form>
</div>
</br>

	<form  action="task1.php" method="POST"> 
     Вивести усіх рейси в порядку зростання вартості квитка:
     <br/><input type="submit" value="OK">
	</form>
</br>


	<form  action="task1.php" method="POST"> 
     Обчислити кількість рейсів, що відлітають до Львова:
     <br/><input type="submit" value="OK">
	</form>
</br>

	<form  action="task1.php" method="POST"> 
     Рейси, за штурвалом яких будуть пілоти з прізвищем, що містить задані символи: 
     <input type="text" name="number">
     <br/><input type="submit" value="OK">
	</form>

</body>
</html>