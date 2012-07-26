<?php 
require_once '../library/config.php';
require_once '../library/functions.php';
$num=$_REQUEST['num'];
?>
<table width="450" border="0" cellspacing="0" cellpadding="0">
<tr>
  <td width="50" height="25" align="center"><img src="../images/add.png" width="16" height="16" style="cursor:pointer" onclick="gen_grade('grade_div_<?php echo ($num+1); ?>','<?php echo ($num+1); ?>');$('#item_count').val(<?php echo ($num+1); ?>);"/></td>
  <td width="250" align="center" class="border_bottom_left">
  <select name="g_cat_id_<?php echo $num; ?>" class="body_text" id="g_cat_id_<?php echo $num; ?>" style="width:15em;">
  <option value="">Select Category</option>
  <?php GradeCategory("");?>
  </select>
  </td>
  <td width="100" align="center" class="border_bottom_left_right"><input name="grade_<?php echo $num; ?>" type="text" class="body_text" id="grade_<?php echo $num; ?>" size="10" style="text-align:right"/></td>
  <td width="50" align="center"><img src="../images/delete.png" width="10" height="10" style="cursor:pointer" onClick="del_div('grade_div_<?php echo $num; ?>');"></td>
</tr>
</table>
<div id="grade_div_<?php echo ($num+1); ?>"></div>
<?php
require_once '../library/close.php';
?>