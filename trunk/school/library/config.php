<?php 
$host="localhost";
$uname="root";
$pwd="";
$db="election";

$connection=mysql_connect($host,$uname,$pwd) or die("Could not connect".mysql_error());
mysql_select_db($db)or die("Could not connect with database.".mysql_error()); 


date_default_timezone_set('Asia/Colombo');


?>