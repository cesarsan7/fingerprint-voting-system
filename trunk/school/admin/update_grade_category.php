<?php 
session_start();
require_once '../library/config.php';
$user_id=$_SESSION['user_id'];

$cat_id=$_POST['cat_id'];
$cat_name="cat_".$cat_id;

/*Check gdare category already exist or not*/
$query_ck="SELECT grade_cat_id FROM  tbl_grade_category WHERE grade_cat_name='".$_POST[$cat_name]."' AND grade_cat_id !='$cat_id'";
$result_ck=mysql_query($query_ck) or die("Unable to select data from the tbl_grade_category. ".mysql_error());
if(mysql_num_rows($result_ck) == 0){
	$query_update="UPDATE tbl_grade_category SET grade_cat_name='".$_POST[$cat_name]."',grade_cat_u_id='$user_id' WHERE grade_cat_id ='$cat_id'";
	mysql_query($query_update) or die("Unable to update tbl_grade_category. ".mysql_error());
	$_SESSION['cat_up_mes']="Grade category has been updated";
}else{
	$_SESSION['cat_up_mes']="This grade category is already existed";
}

require_once '../library/close.php';
header('Location:view_grade_category.php');
?>