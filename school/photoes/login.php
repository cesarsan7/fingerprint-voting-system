<?php 
session_start();
require_once 'library/config.php';

$uname=mysql_real_escape_string($_POST['uname']);
$pwd=md5($_POST['pwd']);

$query_login="SELECT * FROM tbl_user WHERE u_uname='$uname' AND u_pwd='$pwd' AND u_status='0'";
$result_login=mysql_query($query_login) or die("Unable to select data from the tbl_user. ".mysql_error());
if(mysql_num_rows($result_login) != 0){
	$row_login=mysql_fetch_assoc($result_login);
	$_SESSION['user_id']=$row_login["u_id"];
	$_SESSION['user_type']=$row_login["u_type"];
	if($row_login["u_type"] == "admin"){
		header('Location:admin/index.php');
	}else if($row_login["u_type"] == "teacher"){
		header('Location:teacher/index.php');
	}else{
		header('Location:index.php');
	}
}else{
	$_SESSION['log_error_mes']="Username or password you have entered is incorrect.";
	header('Location:index.php');
}

require_once 'library/close.php';
?>