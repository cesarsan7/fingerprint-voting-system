<?php 
session_start();
require_once '../library/config.php';

$query_del="UPDATE tbl_student SET vt_status='1' WHERE vt_id='".$_REQUEST['vt_id']."'";
mysql_query($query_del) or die("unable to update tbl_student. ".mysql_error());

$_SESSION['student_del_mes']="Student has been deleted";

require_once '../library/close.php';
header('Location:view_Student.php');
?>