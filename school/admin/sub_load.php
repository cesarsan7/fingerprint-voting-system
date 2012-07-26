<?php 
$host="localhost";
$uname="root";
$pwd="";
$db="school";

$connection=mysql_connect($host,$uname,$pwd) or die("Could not connect".mysql_error());
mysql_select_db($db)or die("Could not connect with database.".mysql_error()); 

date_default_timezone_set('Asia/Colombo');

$q = strtolower($_GET["q"]);  
if (!$q) return;


$sql = "SELECT subj_name,subj_id FROM tbl_subjects WHERE subj_name LIKE '$q%' ORDER BY subj_name";  
$rsd = mysql_query($sql); 
while($rs = mysql_fetch_row($rsd)) {
	
	$subj_name = $rs[0];
	$subj_id=$rs[1];
	
	

	
	
	echo "$subj_name|$subj_id\n";
}

mysql_close($connection);
	
?>