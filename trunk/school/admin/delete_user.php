<?php 
session_start();
require_once '../library/config.php';

$query_del="UPDATE tbl_user SET u_status='1' WHERE u_id='".$_REQUEST['u_id']."'";
mysql_query($query_del) or die("unable to update tbl_user. ".mysql_error());

$_SESSION['user_del_mes']="User has been deleted";

require_once '../library/close.php';
header('Location:view_user.php');
?>