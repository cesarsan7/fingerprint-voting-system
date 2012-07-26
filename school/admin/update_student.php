<?php 
session_start();
require_once '../library/config.php';
$user_id=$_SESSION['user_id'];
$vt_id=$_POST['vt_id'];

/*$live="";
if(isset($_POST["live"])){
	$live=$_POST["live"];
}*/


$query_update="UPDATE tbl_student SET vt_name='".$_POST['name']."',vt_address='".$_POST['address']."',nic='".$_POST['nic']."',vt_dob='".$_POST['dob']."',vt_gender='".$_POST['gender']."',age='".$_POST['age']."' WHERE vt_id='".$_POST['vt_id']."'";

if($_FILES['photo']['name'] != null){
	/*url file update */
		$query_photo_url="SELECT vt_photo_url FROM tbl_student WHERE vt_id='".$_POST['vt_id']."'";
		$result_photo_url=mysql_query($query_photo_url) or die("Unable to select data from the tbl_student. ".mysql_error());
		$row_photo_url=mysql_fetch_row($result_photo_url);
		unlink($row_photo_url[0]);
		//$row_photo_url[0];
	//if u have array 0,1.. put fetch_row 
	
	
	/*upload photograph*/
	$upload_path="../photoes";
	if($_FILES['photo']['name'] != null){
		if(file_exists("$upload_path")){
		}else{
			mkdir("$upload_path");
		}
		$full_file_name =$_FILES['photo']['name'];
		$type=trim(strrchr($full_file_name,'.'),'.');
		
		$new_upload_path ="../photoes/";
		$stored_object = "photoes_".$_POST['vt_id'].".".$type;
		$file_url=$new_upload_path.$stored_object;
		
		if(move_uploaded_file($_FILES['photo']['tmp_name'], $new_upload_path.$stored_object)) {
			$query_update="UPDATE tbl_student SET vt_photo_url='$file_url' WHERE vt_id='".$_POST['vt_id']."'";
			mysql_query($query_update) or die("Unable to update tbl_student. ".mysql_error());
		} else{
		} 
	
	}
}


$_SESSION['student_up_mes']="Record has been updated";
require_once '../library/close.php';
header('Location:view_student.php');
 
?>