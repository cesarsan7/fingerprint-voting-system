<?php 
session_start();
require_once '../library/config.php';
$user_id=$_SESSION['user_id'];
$u_id=$_POST['u_id'];
$pwd=$_POST['old_pwd'];
if($_POST['pwd'] != ""){
	$pwd=$_POST['pwd'];
}

/*Check username*/
$query_ck="SELECT u_id FROM tbl_user WHERE u_uname='".$_POST['uname']."' AND u_status='0' AND u_id != '".$_POST['u_id']."'";
$result_ck=mysql_query($query_ck) or die("unable to select data from the tbl_user. ".mysql_error());
if(mysql_num_rows($result_ck) != 0){
	$_SESSION['user_error_mes']="Sorry, This Username is already existed";
	require_once '../library/close.php';
	header("Location:edit_user.php?u_id=$u_id");
}else{
	$query_update="UPDATE tbl_user SET u_name='".$_POST['name']."',u_nic='".$_POST['nic']."',u_address='".$_POST['address']."',u_tel='".$_POST['tel']."',date='".$_POST['date']."',u_uname='".$_POST['uname']."',u_pwd='$pwd',u_type='".$_POST['u_type']."',u_added_u_id='$user_id' WHERE u_id='".$_POST['u_id']."'";
	mysql_query($query_update) or die("unable to update tbl_user. ".mysql_error());
	$_SESSION['user_up_mes']="Record has been updated";
	require_once '../library/close.php';
	header('Location:view_user.php');
}
?>