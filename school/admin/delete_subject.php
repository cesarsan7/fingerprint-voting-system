<?php 
session_start();
require_once '../library/config.php';
$user_id=$_SESSION['user_id'];

$query_del="UPDATE tbl_subjects SET subj_status='1',u_id='$user_id' WHERE subj_id='".$_REQUEST['subj_id']."'";
mysql_query($query_del) or die("Unable to update tbl_subjects.".mysql_error());

$_SESSION['subj_del_mes']="Subject has been deleted";

require_once '../library/close.php';
header('Location:view_subjects.php');
?>