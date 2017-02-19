<?php

class DB_class {

	private $server,$user,$pass,$dbname;

	public function __construct($server,$user,$pass,$dbname) {
 		$this->server = $server;
 		$this->user = $user;
 		$this->pass = $pass;
 		$this->dbname = $dbname;
 	}

 	public function openConnection() {

	    $dbh = mysqli_connect($this->server, $this->user, $this->pass, $this->dbname) or die("Не можу з'єднатися з MySQLi.");
	    
	    mysqli_set_charset($dbh, 'utf8' );
	    return $dbh;
 	}
 	

 	public function select($what, $from, $inner_join1 = null, $inner_join2 = null,  $where = null, $order = null) {

 		$fetched = array();
 		$sql = 'SELECT '.$what.' FROM '.$from;
 		
 		if (($inner_join1 != null) AND ($inner_join2 != null)) $sql .= ' INNER JOIN '.$inner_join1.' ON '.$inner_join2;
 		if ($where != null) $sql .= ' WHERE '.$where;
 		if ($order != null) $sql .= ' ORDER BY '.$order; 

		$query = mysqli_query($this->openConnection(), $sql); 
		
		if($query)  {
			$rows = mysqli_num_rows($query);

			for($i = 0; $i < $rows; $i++) {
				$results = mysqli_fetch_assoc($query);
				$key = array_keys($results);
				$numKeys = count($key);

				for($x = 0; $x < $numKeys; $x++) { 
					$fetched[$i][$key[$x]] = $results[$key[$x]];
				}
			} 
			return $fetched; 
		}
		else {
			return false;
		}   

 	}

 	public function insert($table, $fields=null, $values, $where=null, $id = null) {
 		if (!$id) {
	 		$strSQL='INSERT INTO '.$table.' ('.$fields.') VALUES ("'.$values.'")';
		}
		else {
	
			$strSQL='UPDATE '.$table.' SET '.$values.' WHERE '.$where.'="'.$id.'"';
		}
echo $strSQL;

 		if (mysqli_query($this->openConnection(), $strSQL)){
			echo (!$id)?"<h3>Дані успішно внесено!</h3>":"<h3>Дані успішно оновлено!</h3>";
		} 
		else {
			echo "<h3>Помилка введення!</h3>";
		}

 	}

 	public function delete($table, $where, $name) {

	    $strSQL="DELETE FROM ".$table." WHERE ".$where."='".$name."'";

	    if (mysqli_query ($this->openConnection(), $strSQL)) {
        	echo "</br>";
        	echo "Дані успішно видалено!";
    	}
	    
 	}

 	public function closeConnection() {
 		mysqli_close($this->openConnection());
 	}

}

?>