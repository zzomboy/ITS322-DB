<?php
$mysqli = new mysqli('localhost','root','','ITS322-DB');
   if($mysqli->connect_errno){
      echo $mysqli->connect_errno.": ".$mysqli->connect_error;
   }
?>