<?php

   header("Content-Type: text/html; charset=utf-8");

   include ("block.php");


   $lines = file('base.txt');
   $n=count($lines);

   for ($i=0; $i<$n; $i++){
   	 		$words=explode ("\t", $lines[$i]);
   			for ($j=0; $j<9; $j++) {
   				$plane[$i][$j]=$words[$j];
   			}
   }

   for ($i=0; $i <$n-1 ; $i++) { 
   		for ($j=$i+1; $j <$n ; $j++) { 
   			if ($plane[$i][6]>$plane[$j][6]){
               $c=$plane[$i];
               $plane[$i]=$plane[$j];
               $plane[$j]=$c;   			
            }
   		}
   }


for ($i=0; $i <$n ; $i++) { 
   		echo "<tr>";
         for ($j=0; $j <9; $j++) { 
   			echo "<td>".$plane[$i][$j]."</td>";
   			}
         echo "</tr>";
   		}        

?>

</table>
</body>
</html>