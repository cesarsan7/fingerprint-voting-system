<?php 
session_start();
require_once '../library/config.php';

$user_id=$_SESSION['user_id'];
$curdate = date('Y-m-d');
$curtime = date('g:i A');
$att_year=date('Y');
$att_month=date('m');



	$stu_barcode=$_POST['stu_barcode'];
	$query_st_id="SELECT st_id FROM tbl_student where stu_barcode='$stu_barcode'"; 
    $result_st_id=mysql_query($query_st_id) or die("Unable to select data from the tbl_attendance. ".mysql_error());
   $row_st_id=mysql_fetch_row($result_st_id);


 $query_attendence="INSERT INTO tbl_attendance(st_id,att_date,att_status,u_id,att_year,att_month,time)      VALUES('$row_st_id[0]','$curdate','1','$user_id','$att_year','$att_month','$curtime')";


mysql_query($query_attendence) or die("Unable to insert data into the tbl_attendance. ".mysql_error());




		

$_SESSION['student_com_mes']="Record has been added";

require_once '../library/close.php';
header('Location:attendense.php');


?>


