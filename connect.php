<?php
$mysqli = new mysqli('localhost','root','','its322-db');
   if($mysqli->connect_errno){
      echo $mysqli->connect_errno.": ".$mysqli->connect_error;
   }
?>