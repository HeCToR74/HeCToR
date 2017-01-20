<?php
   header("Content-Type: text/html; charset=utf-8");
   $lines = file('3_task_file.txt');
   foreach($lines as $single_line)
        echo $single_line . "<br />\n";

?>