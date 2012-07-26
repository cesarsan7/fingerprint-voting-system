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
if($_REQUEST['g_cat_id'] != ""){
	if($data == ""){
		$data=" AND tbl_grade.grade_cat_id='".$_REQUEST['g_cat_id']."'";
	}else{
		$data .=" AND tbl_grade.grade_cat_id='".$_REQUEST['g_cat_id']."'";
	}
}

if($_REQUEST['grade'] != ""){
	if($data == ""){
		$data=" AND tbl_grade.grade_name LIKE '".$_REQUEST['grade']."%'";
	}else{
		$data.=" AND tbl_grade.grade_name LIKE '".$_REQUEST['grade']."%'";
	}
}

/*****************************pagination****************/
$sql_count="SELECT 
			tbl_grade.grade_id,
			tbl_grade.grade_name,
			tbl_grade.grade_cat_id,
			tbl_grade_category.grade_cat_name
			FROM tbl_grade INNER JOIN tbl_grade_category ON tbl_grade.grade_cat_id=tbl_grade_category.grade_cat_id WHERE tbl_grade.grade_status='0' $data ORDER BY tbl_grade.grade_name,tbl_grade_category.grade_cat_name ";

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
		$nav .="<a onclick="."search_grades('".$page."') style="."cursor:pointer".">$page</a>";
	}
}

if ($pageNum > 1){
$page  = $pageNum - 1;
$prev  ="<a onclick="."search_grades('".$page."') style="."cursor:pointer;color:#990066".">[Prev]</a>";
/*page=1*/
$first ="<a onclick="."search_grades('1') style="."cursor:pointer;color:#000066".">[First Page]</a>";
}else{
$prev  = '&nbsp;'; // we're on page one, don't print previous link
$first = '&nbsp;'; // nor the first page link
}

if ($pageNum < $maxPage){
$page = $pageNum + 1;
$next ="<a onclick="."search_grades('".$page."') style="."cursor:pointer;color:#990066".">[Next]</a>";
/*page=$maxPage*/
$last ="<a onclick="."search_grades('".$maxPage."') style="."cursor:pointer;color:#000066".">[Last Page]</a>";
}else{
$next = '&nbsp;'; // we're on the last page, don't print next link
$last = '&nbsp;'; // nor the last page link
}
//tbl_grade.grade_name,
$query_grade="SELECT 
			tbl_grade.grade_id,
			tbl_grade.grade_name,
			tbl_grade.grade_cat_id,
			tbl_grade_category.grade_cat_name
			FROM tbl_grade INNER JOIN tbl_grade_category ON tbl_grade.grade_cat_id=tbl_grade_category.grade_cat_id WHERE tbl_grade.grade_status='0' $data ORDER BY tbl_grade_category.grade_cat_name LIMIT $offset, $rowsPerPage";
$result_grade=mysql_query($query_grade) or die("Unable to select data from the tbl_grade. ".mysql_error());
if(mysql_num_rows($result_grade) != 0){
?>
  <table width="400" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr>
	  <td width="100" height="25" align="center" class="tbl_header_right">District</td>
	  <td width="200" align="center" class="tbl_header_right">Seats</td>
	  <td width="50" align="center" class="tbl_header_right">Edit</td>
	  <td width="50" align="center" class="tbl_header">Delete</td>
	</tr>
    <?php while($row_grade=mysql_fetch_row($result_grade)){?>
	<tr class="body_text" onmouseover="this.style.backgroundColor='#DCF8FC';" onmouseout="this.style.backgroundColor='';">
	  <td height="20" align="right" class="border_bottom_left" style="padding-right:3pt;"><?php echo $row_grade[3]; ?></td>
	  <td align="left" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_grade[1]; ?></td>
	  <td align="center" class="border_bottom_left"><img src="../images/edit.png" width="10" height="10" style="cursor:pointer" onClick="parent.location='edit_grade.php?grade_id=<?php echo $row_grade[0]; ?>'"></td>
	  <td align="center" class="border_bottom_left_right"><img src="../images/delete.png" width="10" height="10" style="cursor:pointer" onClick="delete_grade('<?php echo $row_grade[0]; ?>');"></td>
	</tr>
    <?php }?>
  </table>
<table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr class="body_text">
    <td width="500" height="20" align="left"><?php echo "<strong>" . $first . $prev ." Showing page $pageNum of $maxPage pages " . $next . $last . "</strong>";?></td>
    <td width="200" align="right"><strong>No.of Records : <?php echo $numrows;?></strong></td>
  </tr>
</table>
<?php }else{?>
<div class="red_text" align="center">No records found</div>
<?php }
require_once '../library/close.php';
?>
