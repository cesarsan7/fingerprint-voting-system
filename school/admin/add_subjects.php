<?php 
session_start();
require_once '../library/config.php';
$user_id=$_SESSION['user_id'];

$item_count=$_POST['item_count'];
for($x=1;$x<=$item_count;$x++){
	$subj="subj_".$x;
	if($_POST[$subj] != ""){
		/*Check subject already exist or not*/
		$query_ck="SELECT subj_id FROM tbl_subjects WHERE subj_name='".$_POST[$subj]."' AND subj_status='0'";
		$result_ck=mysql_query($query_ck) or die("Unable to select data from the tbl_subjects. ".mysql_error());
		if(mysql_fetch_row($result_ck) == 0){
			$query_insert="INSERT INTO tbl_subjects(subj_name,subj_status,u_id,subj_date) VALUES('".$_POST[$subj]."','0','$user_id','".date('Y-m-d g:i A')."')";
			mysql_query($query_insert) or die("Unable to insert data into the tbl_subjects. ".mysql_error());
		}
	}
}
$_SESSION['subj_com_mes']="Records have been added";
require_once '../library/close.php';
header('Location:subject.php');
?>