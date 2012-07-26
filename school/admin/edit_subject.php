<?php 
$subj_id=$_REQUEST['subj_id'];

?>
<form action="update_subject.php" method="post" name="subject_form_<?php echo $subj_id; ?>" id="subject_form_<?php echo $subj_id; ?>" onSubmit="return subject_validation('subject_<?php echo $subj_id; ?>');">
<input name="subj_id" id="subj_id" type="hidden" value="<?php echo $subj_id; ?>">
<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#FAF8CF">
  <tr>
    <td width="300" align="left" class="border_bottom"><input name="subject_<?php echo $subj_id; ?>" type="text" class="body_text" id="subject_<?php echo $subj_id; ?>" size="50" value="<?php echo $_REQUEST['subj_name']; ?>"/></td>
    <td width="150" align="right" class="border_bottom"><input type="image" src="../images/update.gif" name="update" id="update" value="Submit"><img src="../images/cancel.gif" width="65" height="35" style="cursor:pointer" onClick="parent.location='view_subjects.php'"></td>
  </tr>
</table>

</form>