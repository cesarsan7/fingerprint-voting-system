<?php 
session_start();
require_once '../library/config.php';
$user_id=$_SESSION['user_id'];

$subj_id=$_POST['subj_id'];
$subject="subject_".$subj_id;

$query_ck="SELECT subj_id FROM tbl_subjects WHERE subj_name='".$_POST[$subject]."' AND subj_status='0' AND subj_id !='$subj_id'";
$result_ck=mysql_query($query_ck) or die("Unable to select data from the tbl_subjects. ".mysql_error());
if(mysql_fetch_row($result_ck) == 0){
	$query_update="UPDATE tbl_subjects SET subj_name='".$_POST[$subject]."',u_id='$user_id' WHERE subj_id ='$subj_id'";
	mysql_query($query_update) or die("Unable to update tbl_subjects. ".mysql_error());
	$_SESSION['subj_up_mes']="Subject has been updated";
}else{
	$_SESSION['subj_up_mes']="The subject you have entered is already existed";
}
require_once '../library/close.php';
header('Location:view_subjects.php');
?>