<?php
include ("connect.php");
include ("DB_class.php")
?>


<!DOCTYPE html><html>
<head><meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>Рух літаків</title>
    <style type="text/css">
     	.main {
     		position:relative; 
     		border:2px solid;
     		width:500px;
     	}
           	
    </style>
 
</head>
<body>

<table>
	<tr>
		<td>
			<div  class="main">
				<form  action="file_flights.php" method="POST"> 
			    	<table>
			    		<tr>
			        		<td> Назва рейсу:</td> 
			        		<td><input required type="text" name="ID_flight"></td>
			        	</tr>
						<tr>
							<td>Назва компанії, що здійснює перевезення:</td> 
							<td>
								<select name="name_company">
									<?php
									$db = new DB_class ($host, $user, $password, $dbname);

									$what="ID_airline, name_airline";
									$from="airlines";

									$res=$db->select($what, $from);

									for ($i = 0; $i < count($res); $i++){
											echo "<option value='"
											.$res[$i]['ID_airline']."'>".$res[$i]['name_airline'].
											"</option>";
										}
									$db->closeConnection();
									?>
			   					</select>
			   				</td>
						</tr>
						<tr>
							<td>Пункт відправлення:</td> 
							<td>					
								<select name="city_from">
									<?php
									$db = new DB_class ($host, $user, $password, $dbname);

									$what="ID_city, name_city";
									$from="cities";

									$res=$db->select($what, $from);

									for ($i = 0; $i < count($res); $i++)
										{
											echo "<option value='"
											.$res[$i]['ID_city']."'>".$res[$i]['name_city']."</option>";
										}
									$db->closeConnection();
									?>
			   					</select>
			   				</td>
			   			</tr>
						<tr>
							<td>Пункт призначення:</td> 
							<td>					
								<select name="city_to">
									<?php
									$db = new DB_class ($host, $user, $password, $dbname);

									$what="ID_city, name_city";
									$from="cities";

									$res=$db->select($what, $from);

									for ($i = 0; $i < count($res); $i++)
										{
											echo "<option value='"
											.$res[$i]['ID_city']."'>".$res[$i]['name_city']."</option>";
										}
									$db->closeConnection();
									?>
			   					</select>
			   				</td>
						</tr>
						<tr>
							<td>Вартість квитка:</td> 
							<td><input type="number" name="price" step="0.01" value="0" min="0"> </td>
						</tr>
						<tr>
							<td>Час вильоту:</td> 
							<td><input required type="datetime" name="time"></td>
						</tr>
						<tr>
							<td>Марка літака:</td> 
							<td>					
								<select name="mark">
									<?php		
									$db = new DB_class ($host, $user, $password, $dbname);

									$what="ID_mark, mark_name";
									$from="mark_airplanes";

									$res=$db->select($what, $from);

									for ($i = 0; $i < count($res); $i++)
										{
											echo "<option value='"
											.$res[$i]['ID_mark']."'>".$res[$i]['mark_name']."</option>";
										}
									$db->closeConnection();
									?>
			   					</select>
			   				</td>
						</tr>
						<tr>
							<td><input type="submit" name="to_file" value="Добавлення нового рейсу"></td>	
							<td>
				</form>
				<form  action="file_flights.php" method="POST"> 
							<input type="submit" name="from_file" value="Вивести інформацію про рейси"></td>
						</tr>
						<tr>
							<td><input type="submit" name="edit_file" value="Редагування даних про рейс"></td>	
							<td><input type="submit" name="delete_file" value="Видалення рейсу"></td>
				</form>	
						</tr>
					</table>
				
			</div>
	</td>
		<td>
			<div  class="main">
				<form  action="file_airlines.php" method="POST"> 
					<table>
			    		<tr>
			   			    <td> Назва авіакомпанії:</td> 
			   			    <td><input required type="text" 
			    			name="name_airline"></td>
			    		</tr>
						<tr>
			   			    <td> Рік заснування авіакомпанії:</td> 
			   			    <td><input required type="text" 
			    			name="year"></td>
			    		</tr>
			    		<tr>
			    			<td>Адреса головного офісу (країна, місто, вулиця, дім, поштовий індекс):</td> 
							<td><textarea name="address"> </textarea></td>
			    		</tr>
			    		<tr>
			   			    <td> Презедент авіакомпанії:</td> 
							<td>
								<select name="president">
									<?php	
									$db = new DB_class ($host, $user, $password, $dbname);

									$what="ID_people, last_name, first_name";
									$from="people";

									$res=$db->select($what, $from);

									for ($i = 0; $i < count($res); $i++)
										{
											echo "<option>".$res[$i]['last_name']." ".$res[$i]['first_name'].
											"</option>";
										}
									$db->closeConnection();				
									?>
								</select>
			   				</td>
			    		</tr>
			    		<tr>
							<td><input type="submit"  name="to_file" value="Добавлення нової авіакомпанії"></td>
							<td>
				</form>		
				<form  action="file_airlines.php" method="POST"> 		
							<input type="submit" name="from_file" value="Вивести інформацію про авіакомпанії"></td>
						</tr>
						<tr>
							<td><input type="submit" name="edit_file" value="Редагування даних про авіакомпанії"></td>	
							<td><input type="submit" name="delete_file" value="Видалення даних про авіакомпанію"></td>
						</tr>
					</table>
				</form>
			</div>
		</td>
		<td>
			<div  class="main">
				<form  action="file_cities.php" method="POST"> 
					<table>
			    		<tr>
			   			    <td> Назва міста:</td> 
			   			    <td><input required type="text" 
			    			name="name_city"></td>
			    		</tr>
						<tr>
			   			    <td> Назва країни:</td> 
							<td>
								<select name="country">
									<?php
									$db = new DB_class ($host, $user, $password, $dbname);

									$what="ID_countrie, name_countrie";
									$from="countries";

									$res=$db->select($what, $from);

									for ($i = 0; $i < count($res); $i++)
										{
											echo "<option>".$res[$i]['name_countrie']."</option>";
										}
									$db->closeConnection();
									?>
								</select>
			   				</td>
			    		</tr>
			    		<tr>
			   			    <td> Кількість жителів:</td> 
			   			    <td><input required type="text" 
			    			name="number_of_residents"></td>
			    		</tr>
			    		<tr>
			   			    <td> Мер:</td> 
							<td>
								<select name="mayor_name">
									<?php
									$db = new DB_class ($host, $user, $password, $dbname);

									$what="ID_people, last_name, first_name";
									$from="people";

									$res=$db->select($what, $from);

									for ($i = 0; $i < count($res); $i++)
										{
											echo "<option>".$res[$i]['last_name']." ".$res[$i]['first_name'].
											"</option>";
										}
									$db->closeConnection();	
									
									?>
								</select>
			   				</td>
			    		</tr>
			    		<tr>
							<td><input type="submit"  name="to_file" value="Добавлення нового міста"></td>
							<td>
				</form>		
				<form  action="file_cities.php" method="POST"> 		
							<input type="submit" name="from_file" value="Вивести інформацію про міста"></td>
						</tr>
						<tr>
							<td><input type="submit" name="edit_file" value="Редагування даних про міста"></td>	
							<td><input type="submit" name="delete_file" value="Видалення даних про міста"></td>
						</tr>
					</table>
				</form>
			</div>
		</td>
	</tr>
	<tr>
		<td>
			<div  class="main">
				<form  action="file_people.php" method="POST"> 
					<table>
			    		<tr>
			   			    <td> Прізвище:</td> 
			   			    <td><input required type="text" 
			    			name="last_name"></td>
			    		<tr>    			
			    		</tr>
							<td>Ім'я:</td> 
							<td><input type="text" name="first_name"</td>
						</tr>
						<tr>
							<td><input type="submit"  name="to_file" value="Добавлення нової людини"></td>
							<td>
				</form>		
				<form  action="file_people.php" method="POST"> 		
							<input type="submit" name="from_file" value="Вивести інформацію про людей"></td>
						</tr>
						<tr>
							<td><input type="submit" name="edit_file" value="Редагування даних про людей"></td>	
							<td><input type="submit" name="delete_file" value="Видалення даних про людей"></td>
						</tr>
					</table>
				</form>
			</div>
		</td>
		<td>
			<div  class="main">
				<form  action="file_marks.php" method="POST"> 
					<table>
			    		<tr>
			   			    <td> Назва літака:</td> 
			   			    <td><input required type="text" 
			    			name="mark_name"></td>
			    		</tr>
			    		<tr>   			
							<td><input type="submit"  name="to_file" value="Добавлення нового літака"></td>
						
						<td>
				</form>		
				<form  action="file_marks.php" method="POST"> 		
							<input type="submit" name="from_file" 
							value="Вивести інформацію про літаки"></td>
						</tr>
						<tr>
							<td><input type="submit" name="edit_file" value="Редагування даних про літаки"></td>	
							<td><input type="submit" name="delete_file" value="Видалення даних про літаки"></td>
						</tr>
					</table>
				</form>
			</div>			
		</td>
		<td>
			<div  class="main">
				<form  action="file_countries.php" method="POST"> 
					<table>
			    		<tr>
			   			    <td> Назва країни:</td> 
			   			    <td><input required type="text" 
			    			name="name_countrie"></td>
			    		</tr>
			    		<tr>    			
							<td><input type="submit"  name="to_file" value="Добавлення нової країни"></td>
							
				</form>		
				<form  action="file_countries.php" method="POST"> 		
							<td><input type="submit" name="from_file" value="Вивести інформацію про країни"></td>
						</tr>
						<tr>
							<td><input type="submit" name="edit_file" value="Редагування даних про країни"></td>	
							<td><input type="submit" name="delete_file" value="Видалення даних про країни"></td>
						</tr>
					</table>
				</form>
			</div>
		</td>
	</tr>
</table>
</br>

	<form  action="search.php" method="POST"> 		
		<input type="submit" value="Перехід на сторінку пошуку"></td>
	</form>

</body>
</html>