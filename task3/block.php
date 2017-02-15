
<!DOCTYPE html><html>
<head><meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Список рейсів</title>
<style type="text/css">
   table {
      border-collapse: collapse;border: 1px solid black;
   }
    td, th {
    padding: 3px; 
    border: 1px solid black; 
   }
   th {
    background: #b0e0e6; 
   }

</style>
</head>
<body>  
<?php
if ($block=="countrie"){
    echo "<table>";
    echo "<tr>";
    echo "<th>ID країни</th>";
    echo "<th>Назва країни</th>";
    echo "</tr>";
}

if ($block=="mark"){
    echo "<table>";
    echo "<tr>";
    echo "<th>ID марки літака</th>";
    echo "<th>Назва марки літака</th>";
    echo "</tr>";
}

if ($block=="people"){
    echo "<table>";
    echo "<tr>";
    echo "<th>ID людини</th>";
    echo "<th>Прізвище</th>";
    echo "<th>Ім'я</th>";
    echo "</tr>";
}

if ($block=="flight"){
    echo "<table>";
    echo "<tr>";
    echo "<th><a href='sort.php?s=".$s."&flag= ORDER BY ID_flight'>Назва рейсу</a></th>";
    echo "<th><a href='sort.php?s=".$s."&flag= ORDER BY name_airline'>Назва компанії</a></th>";
    echo "<th><a href='sort.php?s=".$s."&flag= ORDER BY city_from'>Пункт відправлення</a></th>";
    echo "<th><a href='sort.php?s=".$s."&flag= ORDER BY city_to'>Пункт призначення</a></th>";
    echo "<th><a href='sort.php?s=".$s."&flag= ORDER BY price'>Вартість квитка</a></th>";
    echo "<th><a href='sort.php?s=".$s."&flag= ORDER BY time'>Дата і час вильоту</a></th>";
    echo "<th><a href='sort.php?s=".$s."&flag= ORDER BY mark_name'>Марка літака</a></th>";
    echo "</tr>";
}

if ($block=="city"){
    echo "<table>";
    echo "<tr>";
    echo "<th>ID міста</th>";
    echo "<th>Назва міста</th>";
    echo "<th>Назва країни</th>";
    echo "<th>Кількість жителів</th>";
    echo "<th>Прізвище та і'мя мера</th>";
    echo "</tr>";
}

if ($block=="airline"){
    echo "<table>";
    echo "<tr>";
    echo "<th>ID авіакомпанії</th>";
    echo "<th>Назва авіакомпанії</th>";
    echo "<th>Рік заснування</th>";
    echo "<th>Адреса головного офісу</th>";
    echo "<th>Прізвище та ім'я президента компанії</th>";
    echo "</tr>";
}

if ($block=="flight_delete"){
    echo "<table>";
    echo "<tr>";
    echo "<th>Видалення</th>";
    echo "<th>Назва рейсу</th>";
    echo "<th>Назва компанії</th>";
    echo "<th>Пункт відправлення</th>";
    echo "<th>Пункт призначення</th>";
    echo "<th>Вартість квитка</th>";
    echo "<th>Дата і час вильоту</th>";
    echo "<th>Марка літака</th>";
    echo "</tr>";
}

if ($block=="airline_delete"){
    echo "<table>";
    echo "<tr>";
    echo "<th>Видалення</th>";
    echo "<th>ID авіакомпанії</th>";
    echo "<th>Назва авіакомпанії</th>";
    echo "<th>Рік заснування</th>";
    echo "<th>Адреса головного офісу</th>";
    echo "<th>Прізвище та ім'я президента компанії</th>";
    echo "</tr>";
}

if ($block=="city_delete"){
    echo "<table>";
    echo "<tr>";
    echo "<th>Видалення</th>";
    echo "<th>ID міста</th>";
    echo "<th>Назва міста</th>";
    echo "<th>Назва країни</th>";
    echo "<th>Кількість жителів</th>";
    echo "<th>Прізвище та і'мя мера</th>";
    echo "</tr>";
}

if ($block=="people_delete"){
    echo "<table>";
    echo "<tr>";
    echo "<th>Видалення</th>";
    echo "<th>ID людини</th>";
    echo "<th>Прізвище</th>";
    echo "<th>Ім'я</th>";
    echo "</tr>";
}

if ($block=="mark_delete"){
    echo "<table>";
    echo "<tr>";
    echo "<th>Видалення</th>";
    echo "<th>ID марки літака</th>";
    echo "<th>Назва марки літака</th>";
    echo "</tr>";
}

if ($block=="countrie_delete"){
    echo "<table>";
    echo "<tr>";
    echo "<th>Видалення</th>";
    echo "<th>ID країни</th>";
    echo "<th>Назва країни</th>";
    echo "</tr>";
}

?>

