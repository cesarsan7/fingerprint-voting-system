<?php 
require_once '../library/config.php';

/*pagination function*/
$rowsPerPage = 15;
$pageNum = 1;


if(isset($_REQUEST['page']) && $_REQUEST['page'] != 0){
    $pageNum = $_REQUEST['page'];
}
// counting the offset
$offset = ($pageNum-1) * $rowsPerPage;

$data="";
if($_REQUEST['name'] != ""){
	if($data == ""){
		$data=" AND u_name LIKE '".$_REQUEST['name']."%'";
	}else{
		$data .=" AND u_name LIKE '".$_REQUEST['name']."%'";
	}
}

if($_REQUEST['u_type'] != ""){
	if($data == ""){
		$data=" AND u_type='".$_REQUEST['u_type']."'";
	}else{
		$data .=" AND u_type='".$_REQUEST['u_type']."'";
	}
}

/*****************************pagination****************/
$sql_count="SELECT * FROM tbl_user WHERE u_status='0' $data ORDER BY u_name";

$rows_count=0;
$get_number_of_rows=mysql_query($sql_count) or die("Unable to select data from the tbl_contrac in count. " . mysql_error());
while($row_number=mysql_fetch_row($get_number_of_rows)){
	$rows_count++;
}
$numrows=$rows_count;

$maxPage = ceil($numrows/$rowsPerPage);

$self = $_SERVER['PHP_SELF'];
$nav  = '';

for($page = 1; $page <= $maxPage; $page++){
	if ($page == $pageNum){
		$nav .= " $page "; // no need to create a link to current page
	}else{
		$nav .="<a onclick="."search_users('".$page."') style="."cursor:pointer".">$page</a>";
	}
}

if ($pageNum > 1){
$page  = $pageNum - 1;
$prev  ="<a onclick="."search_users('".$page."') style="."cursor:pointer;color:#990066".">[Prev]</a>";
/*page=1*/
$first ="<a onclick="."search_users('1') style="."cursor:pointer;color:#000066".">[First Page]</a>";
}else{
$prev  = '&nbsp;'; // we're on page one, don't print previous link
$first = '&nbsp;'; // nor the first page link
}

if ($pageNum < $maxPage){
$page = $pageNum + 1;
$next ="<a onclick="."search_users('".$page."') style="."cursor:pointer;color:#990066".">[Next]</a>";
/*page=$maxPage*/
$last ="<a onclick="."search_users('".$maxPage."') style="."cursor:pointer;color:#000066".">[Last Page]</a>";
}else{
$next = '&nbsp;'; // we're on the last page, don't print next link
$last = '&nbsp;'; // nor the last page link
}

$query_user="SELECT * FROM tbl_user WHERE u_status='0' $data ORDER BY u_name LIMIT $offset, $rowsPerPage";
$result_user=mysql_query($query_user) or die("Unable to select data from the tbl_user. ".mysql_error());
if(mysql_num_rows($result_user) != 0){
?>
<link href="../css/style.css" rel="stylesheet" type="text/css" />


<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="200" height="25" align="center" class="tbl_header_right">Name</td>
    <td width="100" align="center" class="tbl_header_right">NIC</td>
    <td width="100" align="center" class="tbl_header_right">Telephone No</td>
    <td width="200" align="center" class="tbl_header_right">Email</td>
    <td width="200" align="center" class="tbl_header_right">Date</td>
    <td width="100" align="center" class="tbl_header_right">User Type</td>
    <td width="50" align="center" class="tbl_header_right">Edit</td>
    <td width="50" align="center" class="tbl_header">Delete</td>
  </tr>
  <?php while($row_user=mysql_fetch_assoc($result_user)){?>
  <tr class="body_text" onmouseover="this.style.backgroundColor='#DCF8FC';" onmouseout="this.style.backgroundColor='';">
    <td height="20" align="left" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_user["u_name"]; ?></td>
    <td align="center" class="border_bottom_left"><?php echo $row_user["u_nic"]; ?></td>
    <td align="center" class="border_bottom_left"><?php echo $row_user["u_tel"]; ?></td>
    <td align="left" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_user["email"]; ?></td>
    <td align="left" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_user["date"]; ?></td>
    <td align="left" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_user["u_type"]; ?></td>
    <td align="center" class="border_bottom_left"><img src="../images/edit.png" width="10" height="10" style="cursor:pointer" onClick="parent.location='edit_user.php?u_id=<?php echo $row_user["u_id"]; ?>'"></td>
    <td align="center" class="border_bottom_left_right"><img src="../images/delete.png" width="10" height="10" style="cursor:pointer" onClick="delete_user('<?php echo $row_user["u_id"]; ?>');"></td>
  </tr>
  <?php }?>
  <tr>
    <td height="20" colspan="8"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr class="body_text">
        <td width="600" height="20" align="left"><?php echo "<strong>" . $first . $prev ." Showing page $pageNum of $maxPage pages " . $next . $last . "</strong>";?></td>
        <td width="200" align="right"><strong>No.of Records : <?php echo $numrows;?></strong></td>
      </tr>
    </table></td>
  </tr>
</table>
<?php }else{?>
<div class="red_text">No recprds found</div>
<?php 
}
require_once '../library/close.php';
?>