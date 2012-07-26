
<?php 
session_start();
require_once '../library/config.php';

$data="";
if($_REQUEST['id_name'] != ""){
	
		$data=" WHERE  stu_barcode LIKE '".$_REQUEST['id_name']."%'";
	
}


$query_pay="SELECT 
			
			tbl_payment.pay_amount,
			tbl_payment.pay_date,
			tbl_payment.u_id,
			tbl_payment.pay_term,
			tbl_student.st_name,
			tbl_student.st_id,
			tbl_payment.time,
			tbl_payment.remarks,
			tbl_payment.pay_type,
			tbl_student.st_guardian_name,
			tbl_payment.pay_id
			
			
 FROM tbl_payment INNER JOIN tbl_student ON tbl_payment.st_id=tbl_student.st_id $data  ORDER BY st_id";
$result_pay=mysql_query($query_pay) or die("Unable to select data from the tbl_student. ".mysql_error());
if(mysql_num_rows($result_pay) != 0){
?>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<body class="border_bottom_left_right"><table width="680" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr class="tbl_header">
    <td width="300" height="25" align="center" class="border_top_bottom_left"><b>Name</b></td>
    <td width="250" height="25" align="center" class="border_top_bottom_left"><b>ID</b></td>
    <td width="250" height="25" align="center" class="border_top_bottom_left"><b>Pay Type</b></td>
    <td width="80" align="center" class="border_top_bottom_left_right"><b>Amount</b></td>
    <td width="80" align="center" class="border_top_bottom_left_right"><b>Foods</b></td>
    <td width="80" align="center" class="border_top_bottom_left_right"><b>Qnty</b></td>
    <td width="80" align="center" class="border_top_bottom_left_right"><b>Time</b></td>
    <td width="75" align="center" class="border_top_bottom_left_right"><b>Remarks</b></td>
    <td width="75" align="center" class="border_top_bottom_left_right"><b>Pay Date</b></td>
    <td width="75" align="center" class="border_top_bottom_left_right"><b>User ID</b></td>
    <td width="75" align="center" class="border_top_bottom_left_right"><b>Pay Term</b></td>
    <td width="75" align="center" class="border_top_bottom_left_right"><b>Gaurdian</b></td>
    
  </tr>
   <?php while($row_pay=mysql_fetch_row($result_pay)){?>
    
    
     	 	 	
    
    <tr >
    <td height="20" align="center" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_pay[4]; ?></td>
    <td height="20" align="center" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_pay[5]; ?></td>
    <td align="center" class="border_bottom_left_right" style="padding-left:3pt;"><?php echo $row_pay[8]; ?></td>
    <td width="80" align="center" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_pay[0]; ?></td>
    <td align="center" class="border_bottom_left" style="padding-left:3pt;"></td>
    <td align="center" class="border_bottom_left" style="padding-left:3pt;"></td>
    <td align="center" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_pay[6]; ?></td>
    <td align="center" class="border_bottom_left_right" style="padding-left:3pt;"><?php echo $row_pay[7]; ?></td>
    <td align="center" class="border_bottom_left_right" style="padding-left:3pt;"><?php echo $row_pay[1]; ?></td>
    <td align="center" class="border_bottom_left_right" style="padding-left:3pt;"><?php echo $row_pay[2]; ?></td>
    <td align="center" class="border_bottom_left_right" style="padding-left:3pt;"><?php echo $row_pay[3]; ?></td>
    <td align="center" class="border_bottom_left_right" style="padding-left:3pt;"><?php echo $row_pay[9]; ?></td>
    </tr >
    
    <?php 
    if ($row_pay[8]=="foods"){
    $query_food="SELECT food,weight FROM tbl_foods WHERE pay_id='$row_pay[10]'";
	$result_food=mysql_query($query_food) or die("Unable to select data from the tbl_foods. ".mysql_error());
	?>
    
    <?php while($row_food=mysql_fetch_assoc($result_food)){?>
    
	<tr>
    <td height="20" align="center" class="border_bottom_left" style="padding-left:3pt;"></td>
    <td height="20" align="center" class="border_bottom_left" style="padding-left:3pt;"></td>
    <td align="center" class="border_bottom_left_right" style="padding-left:3pt;"></td>
    <td width="80" align="center" class="border_bottom_left" style="padding-left:3pt;"></td>
    <td align="center" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_food["food"]; ?></td>
    <td align="center" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_food["weight"]; ?></td>
    <td align="center" class="border_bottom_left" style="padding-left:3pt;"></td>
    <td align="center" class="border_bottom_left_right" style="padding-left:3pt;"></td>
    <td align="center" class="border_bottom_left_right" style="padding-left:3pt;"></td>
    <td align="center" class="border_bottom_left_right" style="padding-left:3pt;"></td>
    <td align="center" class="border_bottom_left_right" style="padding-left:3pt;"></td>
    <td align="center" class="border_bottom_left_right" style="padding-left:3pt;"></td>
    </tr >
	
	<?php }?>
	
    <?php }?>
    <?php }?>
  
</table>
<?php }
mysql_close($connection);
?>
