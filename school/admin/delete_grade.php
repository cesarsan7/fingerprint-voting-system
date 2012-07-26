<?php 
session_start();
require_once '../library/config.php';
$user_id=$_SESSION['user_id'];

$query_update="UPDATE tbl_grade SET grade_status='1',grade_u_id='$user_id' WHERE grade_id='".$_REQUEST['grade_id']."'";
mysql_query($query_update) or die("Unable to update tbl_grade. ".mysql_error());
$_SESSION['grade_del_mes']="Grade has been deleted";

require_once '../library/close.php';
header('Location:view_grade.php');
?>