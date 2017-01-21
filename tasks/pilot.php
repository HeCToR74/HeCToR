<?php

   header("Content-Type: text/html; charset=utf-8");

  include ("block.php");

   $lines = file('base.txt');
   $n=count($lines);

   for ($i=0; $i<$n; $i++){
   	 		$words=explode ("\t", $lines[$i]);
   			if (stripos($words[2], $_POST["pilot"])!== false){
   				//echo $lines[$i]."</br>";
             echo "<tr>";
             echo "<td>".$words[0]."</td><td>".$words[1]."</td><td>".$words[2]."</td><td>".$words[3]."</td><td>".$words[4]."</td><td>".$words[5]."</td><td>".$words[6]."</td><td>".$words[7]."</td><td>".$words[8]."</td>";
             echo "</tr>";  
   			}
   }
?>

</table>
</body>
</html>