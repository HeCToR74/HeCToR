<?php
   header("Content-Type: text/html; charset=utf-8");

   echo "<title>Кількість рейсів до Львова</title>";
   $lines = file('base.txt');
   $n=count($lines);
   $k=0;
   for ($i=0; $i<$n; $i++){
   	 		$words=explode ("\t", $lines[$i]);
   			if ($words[5]=="Львів"){
   				$k++;
   			}
   }

   echo "Кількість рейсів, що відлітають до Львова: ".$k;

?>