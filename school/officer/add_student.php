<?php 
session_start();
require_once '../library/config.php';

$query_student="INSERT INTO tbl_student(vt_name,vt_address,nic,vt_dob,vt_gender,age,vt_barcode_url,vt_barcode,vt_status,vt_photo_url,vt_finger_url)
										
										VALUES('".$_POST['name']."','".$_POST['address']."','".$_POST['nic']."','".$_POST['dob']."','".$_POST['gender']."','".$_POST['age']."','','".$_POST['vt_id']."','0','','".$_POST['vt_finger_url']."')";


mysql_query($query_student) or die("Unable to insert data into the tbl_student. ".mysql_error());

$query_vt_id="SELECT MAX(vt_id) FROM tbl_student";
$result_vt_id=mysql_query($query_vt_id) or die("Unable to select data from the tbl_student. ".mysql_error());
$row_vt_id=mysql_fetch_row($result_vt_id);

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
	$stored_object = "photoes_".$row_vt_id[0].".".$type;
	$file_url=$new_upload_path.$stored_object;
	
	
	
	if(move_uploaded_file($_FILES['photo']['tmp_name'], $new_upload_path.$stored_object)) {
		$query_update="UPDATE tbl_student SET vt_photo_url='$file_url' WHERE vt_id='$row_vt_id[0]'";
		mysql_query($query_update) or die("Unable to update tbl_student. ".mysql_error());
	} else{
	} 

}

if(file_exists("../barcode")){
}else{
	mkdir("../barcode");
}

require_once '../library/barcode.php';

$barcode_url="../barcode/Barcode_".$row_vt_id[0].".gif";
$bc = new barCode();
$bc->build($_POST['vt_id'],'','',$barcode_url);


$vt_id=$_POST['vt_id'];

$query_update="UPDATE tbl_student SET vt_barcode_url='$barcode_url' , vt_barcode='$vt_id'  WHERE vt_id='$row_vt_id[0]'";
mysql_query($query_update) or die("Unable to update tbl_student. ".mysql_error());
		

$_SESSION['student_com_mes']="Record has been added";

require_once '../library/close.php';
header('Location:student.php');


?>