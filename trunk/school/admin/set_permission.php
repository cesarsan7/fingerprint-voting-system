<?php 
require_once '../library/config.php';
$status=0;
if($_REQUEST['type'] == "assign"){
	$status=1;
}else if($_REQUEST['type'] == "remove"){
	$status=0;
}

$query_ck="SELECT p_id FROM tbl_user_permission WHERE u_id='".$_REQUEST['u_id']."' AND t_id='".$_REQUEST['t_id']."'";
$result_ck=mysql_query($query_ck) or die("Unable to select data from the tbl_user_permission. ".mysql_error());
if(mysql_num_rows($result_ck) != 0){
	$row_ck=mysql_fetch_row($result_ck);
	$query_update="UPDATE tbl_user_permission SET p_status='$status' WHERE p_id='$row_ck[0]'";
	mysql_query($query_update) or die("Unable to update tbl_user_permission. ".mysql_error());
}else{
	$query_insert="INSERT INTO tbl_user_permission(u_id,t_id,p_status) VALUES('".$_REQUEST['u_id']."','".$_REQUEST['t_id']."','$status')";
	mysql_query($query_insert) or die("Unable to insert data in to the tbl_user_permission. ".mysql_error());
}

require_once '../library/close.php';
?>