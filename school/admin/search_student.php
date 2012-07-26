
<?php 
session_start();
require_once '../library/config.php';


$connection=mysql_connect($host,$uname,$pwd) or die("Could not connect".mysql_error());
mysql_select_db($db)or die("Could not connect with database.".mysql_error());

$data="";
if($_REQUEST['name'] != ""){
	if($data == ""){
		$data=" AND  vt_name LIKE '".$_REQUEST['name']."%'";
	}else{
		$data .=" AND  vt_name LIKE '".$_REQUEST['name']."%'";
	}
}


 
 










$query_cl="SELECT * FROM tbl_student WHERE vt_status='0' $data ORDER BY vt_name";
$result_cl=mysql_query($query_cl) or die("Unable to select data from the tbl_student. ".mysql_error());
if(mysql_num_rows($result_cl) != 0){
?>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<table width="975" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="300" height="25" align="center" class="tbl_header_right"><b>Voter Name</b></td>
    <td width="155" align="center" class="tbl_header_right"><b>Address</b></td>
    <td width="70" align="center" class="tbl_header_right"><b>NIC</b></td>
    <td width="100" align="center" class="tbl_header_right"><b>DOB</b></td>
    <td width="100" align="center" class="tbl_header_right"><b>Gender</b></td>
    
    <td width="75" align="center" class="tbl_header_right"><b>Voter Status</b></td>
    <td width="75" align="center" class="tbl_header_right"><b>Age</b></td>
    <td width="50" align="center" class="tbl_header_right">Edit</td>
    <td width="50" align="center" class="tbl_header_right">View</td>
    <td width="50" align="center" class="tbl_header_right">Delete</td>
    
  </tr>
    <?php while($row_cl=mysql_fetch_assoc($result_cl)){?>
    
    <tr >
    <td height="20" align="center" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_cl["vt_name"]; ?></td>
    <td align="center" class="border_bottom_left" style="padding-right:3pt;"><?php echo $row_cl["vt_address"]; ?></td>
    <td align="center" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_cl["nic"]; ?></td>
    <td align="center" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_cl["vt_dob"]; ?></td>
    <td width="100" align="center" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_cl["vt_gender"]; ?></td>
    
    <td align="center" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_cl["vt_status"]; ?></td>
    <td align="center" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_cl["age"]; ?></td>
    
    <td align="center" class="border_bottom_left"><img src="../images/edit.png" width="10" height="10" style="cursor:pointer" onClick="parent.location='edit_student.php?vt_id=<?php echo $row_cl["vt_id"]; ?>'"></td>
    <td align="center" class="border_bottom_left_right"><img src="../images/view.png" width="16" height="16" style="cursor:pointer" onclick="parent.location='display_student.php?vt_id=<?php echo $row_cl["vt_id"]; ?>'"/></td>
    
    <td align="center" class="border_bottom_left_right"><img src="../images/delete.png" width="10" height="10" style="cursor:pointer" onClick="delete_student('<?php echo $row_cl["vt_id"]; ?>');"></td>

     
    </tr>   
    <?php }?>
  
</table>
<?php }
mysql_close($connection);
?>
