<?php 
$cat_id=$_REQUEST['cat_id'];
?>
<form action="update_grade_category.php" method="post" name="cat_form_<?php echo $cat_id; ?>" id="cat_form_<?php echo $cat_id; ?>" onSubmit="return cat_validation('cat_<?php echo $cat_id; ?>');">
<input name="cat_id" id="cat_id" type="hidden" value="<?php echo $cat_id; ?>">
<table width="300" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="160" align="left">
      <input name="cat_<?php echo $cat_id; ?>" type="text" class="body_text" id="cat_<?php echo $cat_id; ?>" size="26" value="<?php echo $_REQUEST['cat_name']; ?>"/>
    </td>
    <td width="140" align="right"><input type="image" src="../images/update.gif" name="update" id="update" value="Submit"><img src="../images/cancel.gif" width="65" height="35" style="cursor:pointer" onClick="parent.location='view_grade_category.php'"></td>
  </tr>
</table>
</form>