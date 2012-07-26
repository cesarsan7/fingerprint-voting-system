
<?php 
session_start();
require_once '../library/config.php';




$data="";
if($_REQUEST['id_name'] != ""){
	//if($data == "")
	//{
		$data=" WHERE  stu_barcode LIKE '".$_REQUEST['id_name']."%'";
	//}else{
		//$data=" WHERE  stu_barcode LIKE '".$_REQUEST['id_name']."%'";
	//}
}


$query_att="SELECT 
			tbl_attendance.att_date,
			tbl_attendance.time,
			tbl_attendance.att_status,
			tbl_attendance.u_id,
			tbl_student.st_name,
			tbl_student.st_id
			
 FROM tbl_attendance INNER JOIN  tbl_student ON tbl_attendance.st_id=tbl_student.st_id $data  ORDER BY att_date";
$result_att=mysql_query($query_att) or die("Unable to select data from the tbl_student. ".mysql_error());
if(mysql_num_rows($result_att) != 0){
?>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<body class="border_bottom_left_right"><table width="680" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr class="tbl_header">
    <td width="300" height="25" align="center" class="border_top_bottom_left"><b>Name</b></td>
    <td width="250" height="25" align="center" class="border_top_bottom_left"><b>st_id</b></td>
    <td width="80" align="center" class="border_top_bottom_left_right"><b>Atten Date</b></td>
    <td width="75" align="center" class="border_top_bottom_left_right"><b>Time</b></td>
    <td width="75" align="center" class="border_top_bottom_left_right"><b>Student Status</b></td>
    <td width="75" align="center" class="border_top_bottom_left_right"><b>User ID</b></td>
    
  </tr>
   <?php while($row_att=mysql_fetch_row($result_att)){?>
    
    
     	 	 	
    
    <tr >
    <td height="20" align="center" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_att[4]; ?></td>
    <td height="20" align="center" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_att[5]; ?></td>
    <td width="80" align="center" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_att[0]; ?></td>
    <td align="center" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_att[1]; ?></td>
    <td align="center" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_att[3]; ?></td>
    <td align="center" class="border_bottom_left_right" style="padding-left:3pt;"><?php echo $row_att[2]; ?></td>
      
    <?php }?>
  
</table>
<?php }
mysql_close($connection);
?>
