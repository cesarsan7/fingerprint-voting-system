<?php 
session_start();
require_once '../library/config.php';
$item_count=$_POST['item_count'];
$user_id=$_SESSION['user_id'];

for($x=1;$x<=$item_count;$x++){
	$g_cat_id="g_cat_id_".$x;
	$grade="grade_".$x;
	if(isset($_POST[$g_cat_id]) && $_POST[$g_cat_id] != "" && isset($_POST[$grade]) && $_POST[$grade] != ""){
		/*Check grade is already exited or not*/
		$query_ck="SELECT grade_id FROM tbl_grade WHERE grade_name='".$_POST[$grade]."' AND grade_cat_id='".$_POST[$g_cat_id]."' AND grade_status='0'";
		$result_ck=mysql_query($query_ck) or die("Unable to select data from the tbl_grade. ".mysql_error());
		if(mysql_num_rows($result_ck) == 0){
			$query_insert="INSERT INTO tbl_grade(grade_name,grade_cat_id,grade_status,grade_u_id,grade_date) VALUES('".$_POST[$grade]."','".$_POST[$g_cat_id]."','0','$user_id','".date('Y-m-d  g:i A')."')";
			mysql_query($query_insert) or die("Unable to insert data into the tbl_grade. ".mysql_error());
		}
	}
}

$_SESSION['grade_mes']="Record/s added successfully";

require_once '../library/close.php';
header('Location:grade.php');
?>