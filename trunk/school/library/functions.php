<?php 
function getUserName($u_id){
	$query_user="SELECT u_name FROM tbl_user WHERE u_id='$u_id'";
	$result_user=mysql_query($query_user) or die("Unable to select data from the tbl_user. ".mysql_error());
	$row_user=mysql_fetch_row($result_user);
	return $row_user[0];
}




function genLibraryID(){
	$query_stu_id="SELECT MAX(vt_id) FROM tbl_student";
	$result_stu_id=mysql_query($query_stu_id) or die("Unable to select data from the tbl_student. ".mysql_error());
	$row_stu_id=mysql_fetch_row($result_stu_id);
	return ($row_stu_id[0]+1);
}

function GradeCategory($g_cat_id){
	$query_g_cat="SELECT grade_cat_id,grade_cat_name FROM  tbl_grade_category WHERE grade_cat_status='0' ORDER BY grade_cat_name";
	$result_g_cat=mysql_query($query_g_cat) or die("Unable to select data from the tbl_grade_category. ".mysql_error());
	while($row_g_cat=mysql_fetch_row($result_g_cat)){
?>
		<option value="<?php echo $row_g_cat[0]; ?>" <?php if($g_cat_id != "" && $g_cat_id == $row_g_cat[0]){echo "selected";}?>><?php echo $row_g_cat[1]; ?></option>
<?php
	}
}

?>