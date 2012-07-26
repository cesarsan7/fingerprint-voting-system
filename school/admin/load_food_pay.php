<link href="../css/style.css" rel="stylesheet" type="text/css">
<table width="416" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr class="body_text">
    <td height="25" colspan="3" align="left"><table width="400" border="0" cellspacing="0" cellpadding="0">
      <tr class="body_text">
        <td width="20" height="25" align="center"><img src="../images/add.png" width="18" height="16" style="cursor:pointe&lt;r" onclick="gen_foods('foods_div_2','2');$('#item_count').val(2);"/></td>
        <td width="80" align="left">Food Item</td>
        <td width="20" align="center">:</td>
        <td width="150" align="left"><input name="event_1" type="text" class="body_text" id="event_1" size="19" /></td>
        <td width="100" align="left"><input name="weight_1" type="text" id="weigth_1" size="1" /> 
          <select name="fd_count_1" id="fd_count_1">
            <option>Kg</option>
            <option>Ltr</option>
            <option>Qty</option>
          Kg</select></td>
        <td width="20" align="center">&nbsp;</td>
      </tr>
    </table>
    
    <div id="foods_div_2"></div>
              <input name="item_count" id="item_count" type="hidden" value="1" />
    
    </td>
  </tr>
  <tr class="body_text">
    <td width="100" height="25" align="left">Remarks</td>
    <td width="20" align="center">:</td>
    <td width="296" align="left"><textarea name="remarks" cols="20" rows="3" class="body_text" id="remarks"></textarea></td>
  </tr>
</table>
