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
if($_REQUEST['subject'] != ""){
	$data=" AND subj_name LIKE '".$_REQUEST['subject']."%'";
}

/*****************************pagination****************/
$sql_count="SELECT subj_id,subj_name FROM tbl_subjects WHERE subj_status='0' $data ORDER BY subj_name";

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
		$nav .="<a onclick="."search_subjects('".$page."') style="."cursor:pointer".">$page</a>";
	}
}

if ($pageNum > 1){
$page  = $pageNum - 1;
$prev  ="<a onclick="."search_subjects('".$page."') style="."cursor:pointer;color:#990066".">[Prev]</a>";
/*page=1*/
$first ="<a onclick="."search_subjects('1') style="."cursor:pointer;color:#000066".">[First Page]</a>";
}else{
$prev  = '&nbsp;'; // we're on page one, don't print previous link
$first = '&nbsp;'; // nor the first page link
}

if ($pageNum < $maxPage){
$page = $pageNum + 1;
$next ="<a onclick="."search_subjects('".$page."') style="."cursor:pointer;color:#990066".">[Next]</a>";
/*page=$maxPage*/
$last ="<a onclick="."search_subjects('".$maxPage."') style="."cursor:pointer;color:#000066".">[Last Page]</a>";
}else{
$next = '&nbsp;'; // we're on the last page, don't print next link
$last = '&nbsp;'; // nor the last page link
}

$query_subj="SELECT subj_id,subj_name FROM tbl_subjects WHERE subj_status='0' $data ORDER BY subj_name LIMIT $offset, $rowsPerPage";
$result_subj=mysql_query($query_subj) or die("Unable to select data from the tbl_subjects. ".mysql_error());
if(mysql_num_rows($result_subj) != 0){
	$count=0;
?>
<link href="../css/style.css" rel="stylesheet" type="text/css">
<table width="450" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="300" height="25" align="center" class="tbl_header_right">Subject</td>
    <td width="75" align="center" class="tbl_header_right">Edit</td>
    <td width="75" align="center" class="tbl_header">Delete</td>
  </tr>
  <?php while($row_subj=mysql_fetch_assoc($result_subj)){
	  		$count++;
	  ?>
  <tr onmouseover="this.style.backgroundColor='#DCF8FC';" onmouseout="this.style.backgroundColor='';">
    <td colspan="3" align="left">
    <div id="subj_div_<?php echo $count; ?>">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr class="body_text" onmouseover="this.style.backgroundColor='#DCF8FC';" onmouseout="this.style.backgroundColor='';">
        <td width="300" height="20" align="left" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_subj["subj_name"]; ?></td>
        <td width="75" align="center" class="border_bottom_left"><img src="../images/edit.png" width="10" height="10" style="cursor:pointer" onClick="edit_subject('subj_div_<?php echo $count; ?>','<?php echo $row_subj["subj_id"]; ?>','<?php echo $row_subj["subj_name"]; ?>');"></td>
        <td width="75" align="center" class="border_bottom_left_right"><img src="../images/delete.png" width="10" height="10" style="cursor:pointer" onClick="delete_subj('<?php echo $row_subj["subj_id"]; ?>');"></td>
      </tr>
    </table>
    </div>
    </td>
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
<div class="red_text">No records found</div>
<?php
}
require_once '../library/close.php';
?>