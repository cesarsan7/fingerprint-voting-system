<?php 
session_start();
require_once '../library/config.php';
$user_id=$_SESSION['user_id'];

/*Check username*/
$query_ck="SELECT u_id FROM tbl_user WHERE u_uname='".$_POST['uname']."' AND u_status='0'";
$result_ck=mysql_query($query_ck) or die("unable to select data from the tbl_user. ".mysql_error());
if(mysql_num_rows($result_ck) != 0){
	$_SESSION['user_com_mes']="Sorry, This Username is already existed";
}else{
	$query_insert="INSERT INTO tbl_user(u_name,u_nic,u_address,u_tel,date,email,u_uname,u_pwd,u_type,u_status,u_added_u_id,u_date) VALUES('".$_POST['name']."','".$_POST['nic']."','".$_POST['address']."','".$_POST['tel']."','".$_POST['date']."','".$_POST['email']."','".$_POST['uname']."','".md5($_POST['pwd'])."','".$_POST['u_type']."','0','$user_id','".date('Y-m-d  g:i A')."')";
	mysql_query($query_insert) or die("Unable to insert data into the tbl_user. ".mysql_error());
	$_SESSION['user_com_mes']="User has been added";
}

require_once '../library/close.php';
header('Location:user.php');
?>