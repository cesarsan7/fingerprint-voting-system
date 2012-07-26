<?php 
$num=$_REQUEST['num'];
?>
<table width="420" border="0" cellspacing="0" cellpadding="0">
<tr class="body_text">
  <td width="20" height="25" align="center"><img src="../images/add.png" width="18" height="16" style="cursor:pointer" onclick="gen_foods('foods_div_<?php echo ($num+1); ?>','<?php echo ($num+1); ?>');$('#item_count').val(<?php echo ($num+1); ?>);"/></td>
  
  
        
        <td width="80" align="left">Food Item</td>
        <td width="20" align="center">:</td>
    <td width="150" align="left"><input name="event_<?php echo $num; ?>" type="text" class="body_text" id="event_<?php echo $num; ?>" size="20" /></td>
        <td width="110" align="center"><input name="weight_<?php echo $num; ?>" type="text" id="weight_<?php echo $num; ?>" size="1" /> 
           <select name="fd_count_<?php echo $num; ?>" id="fd_count_<?php echo $num; ?>">
            <option>Kg</option>
            <option>Ltr</option>
            <option>Qty</option>
          </select>
          
          </td>
        

  
  
  
  
  <td width="50" align="center"><img src="../images/delete.png" width="10" height="10" style="cursor:pointer" onClick="del_div('foods_div_<?php echo $num; ?>');"></td>
</tr>
</table>
<div id="foods_div_<?php echo ($num+1); ?>"></div>