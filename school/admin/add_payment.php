<?php 
session_start();
require_once '../library/config.php';
require_once '../library/functions.php';
 
$user_id=$_SESSION['user_id'];
$curdate = date('Y-m-d');

$query_student="INSERT INTO tbl_payment(st_id,pay_amount,pay_type,pay_date,u_id,pay_year,pay_term,time,remarks)
										
										VALUES('".$_POST['id']."','".$_POST['amount']."','".$_POST['pay_id']."','$curdate','$user_id','".$_POST['year']."','".$_POST['term']."','".$_POST['time']."','".$_POST['remarks']."')";


mysql_query($query_student) or die("Unable to insert data into the tbl_student. ".mysql_error());

$query_pay_id="SELECT MAX(pay_id) FROM tbl_payment";
$result_pay_id=mysql_query($query_pay_id) or die("Unable to select data from the tbl_student. ".mysql_error());
$row_pay_id=mysql_fetch_row($result_pay_id);


$item_count=$_POST['item_count'];
for($x=1;$x<=$item_count;$x++){
	
	$food_weight="weight_".$x;
	$food_event="event_".$x;
	$fd_count="fd_count_".$x;
	
	//if($_POST[$food_event] != "" && $_POST[$weight] != ""){
		$query_insert="INSERT INTO tbl_foods(pay_id,food,weight,count) VALUES('$row_pay_id[0]','".$_POST[$food_event]."','".$_POST[$food_weight]."','".$_POST[$fd_count]."')";
		mysql_query($query_insert) or die("Unable to insert data into the tbl_foods. ".mysql_error());
	}
//}



$_SESSION['student_com_mes']="Record has been added";

require_once '../library/close.php';
header('Location:payment.php');


?>


