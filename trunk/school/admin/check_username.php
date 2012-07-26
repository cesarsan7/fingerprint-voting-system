<?php 
require_once '../library/config.php';
$data="";
if(isset($_REQUEST['u_id'])){
	$data=" AND u_id != '".$_REQUEST['u_id']."'";
}

$query_ck="SELECT u_id FROM tbl_user WHERE u_uname='".$_REQUEST['uname']."' AND u_status='0' $data";
$result_ck=mysql_query($query_ck) or die("unable to select data from the tbl_user. ".mysql_error());
if(mysql_num_rows($result_ck) != 0){
	echo "Sorry, This Username is already existed";
}


require_once '../library/close.php';
?>