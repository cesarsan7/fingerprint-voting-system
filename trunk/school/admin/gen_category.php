<?php 
$num=$_REQUEST['num'];
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="50" height="25" align="center"><img src="../images/add.png" width="16" height="16" style="cursor:pointer" onclick="gen_cat('cat_div_<?php echo ($num+1); ?>','<?php echo ($num+1); ?>');$('#item_count').val(<?php echo ($num+1); ?>);"/></td>
    <td width="200" align="center" class="border_bottom_left_right"><input name="cat_<?php echo $num; ?>" type="text" class="body_text" id="cat_<?php echo $num; ?>" size="30" /></td>
    <td width="50" align="center"><img src="../images/delete.png" width="10" height="10" style="cursor:pointer" onClick="del_div('cat_div_<?php echo $num; ?>');"></td>
  </tr>
</table>
<div id="cat_div_<?php echo ($num+1); ?>"></div>