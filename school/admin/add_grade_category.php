<?php 
session_start();
require_once '../library/config.php';
$user_id=$_SESSION['user_id'];

$item_count=$_POST['item_count'];
for($x=1;$x<=$item_count;$x++){
	$cat="cat_".$x;
	if(isset($_POST[$cat]) && $_POST[$cat] != ""){
		/*check category name already exist or not*/
		$query_ck="SELECT grade_cat_id FROM tbl_grade_category WHERE grade_cat_name='".$_POST[$cat]."' AND grade_cat_status='0'";
		$result_ck=mysql_query($query_ck) or die("unable to select data from the tbl_grade_category. ".mysql_error());
		if(mysql_num_rows($result_ck) == 0){
			$query_insert="INSERT INTO tbl_grade_category(grade_cat_name,grade_cat_status,grade_cat_u_id,grade_cat_date) VALUES('".$_POST[$cat]."','0','$user_id','".date('Y-m-d  g:i A')."')";
			mysql_query($query_insert) or die("Unable to insert data into the tbl_grade_category. ".mysql_error());
		}
	}
}
$_SESSION['g_cat_mes']="Record/s added successfully";

require_once '../library/close.php';
header('Location:grade_category.php');
?>
