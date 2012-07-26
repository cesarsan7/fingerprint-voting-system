<?php 
$host="localhost";
$uname="root";
$pwd="";
$db="buddhika";

$connection=mysql_connect($host,$uname,$pwd) or die("Could not connect".mysql_error());
mysql_select_db($db)or die("Could not connect with database.".mysql_error()); 

$username=$_POST['uname'];
$password=$_POST['pwd'];

$query_insert="INSERT INTO tbl_user(username,password) VALUES('$username','$password')";
mysql_query($query_insert) or die("Unable to insert data into the tbl_user. ".mysql_error());

mysql_close($connection);
?>