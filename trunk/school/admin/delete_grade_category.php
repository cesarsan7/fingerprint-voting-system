<?php 
session_start();
require_once '../library/config.php';
$user_id=$_SESSION['user_id'];
$cat_id=$_REQUEST['cat_id'];

$query_del="UPDATE tbl_grade_category SET grade_cat_status='1',grade_cat_u_id='$user_id' WHERE grade_cat_id='$cat_id'";
mysql_query($query_del) or die("Unable to update tbl_grade_category. ".mysql_error());
$_SESSION['cat_del_mes']="Grade category has been deleted";

require_once '../library/close.php';
header('Location:view_grade_category.php');
?>