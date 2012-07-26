<?php 
session_start();
require_once '../library/config.php';
$grade_id=$_POST['grade_id'];

/*Check grade is already exist or not*/
$query_ck="SELECT grade_id FROM tbl_grade WHERE grade_name='".$_POST['grade']."' AND grade_cat_id='".$_POST['g_cat_id']."' AND grade_id !='".$_POST['grade_id']."'";
$result_ck=mysql_query($query_ck) or die("Unable to select data from the tbl_grade. ".mysql_error());
if(mysql_num_rows($result_ck) != 0){
	$_SESSION['up_error_mes']="The Grade you have entered is already existed";
	header("Location:edit_grade.php?grade_id=$grade_id");
}else{
	$query_update="UPDATE tbl_grade SET grade_name='".$_POST['grade']."',grade_cat_id='".$_POST['g_cat_id']."' WHERE grade_id ='".$_POST['grade_id']."'";
	mysql_query($query_update) or die("Unable to update tbl_grade. ".mysql_error());
	$_SESSION['up_com_mes']="Grade has been updated";
	header('Location:view_grade.php');
}

require_once '../library/close.php';
?>