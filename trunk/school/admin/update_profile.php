<?php 
session_start();
require_once '../library/config.php';
$user_id=$_SESSION['user_id'];
$pwd=$_POST['old_pwd'];
if($_POST['pwd'] != ""){
	$pwd=md5($_POST['pwd']);
}

/*check username*/

$query_ck="SELECT u_id FROM tbl_user WHERE u_uname='".$_POST['uname']."' AND u_id !='$user_id'";
$result_ck=mysql_query($query_ck) or die("".mysql_error());
if(mysql_num_rows($result_ck) == 0){
	$query_update="UPDATE tbl_user SET u_name='".$_POST['name']."',u_uname='".$_POST['uname']."',u_pwd='$pwd' WHERE u_id='$user_id'";
	mysql_query($query_update) or die("Unable to update tbl_user. ".mysql_error());
	
	$_SESSION['user_up_mes']="Record has been updated";
}else{
	$_SESSION['user_up_mes']="Username is already existed";
}

require_once '../library/close.php';
header('Location:index.php');
?>