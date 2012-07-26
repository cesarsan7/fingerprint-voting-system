<?php 
session_start();
require_once '../library/config.php';
require_once '../library/functions.php';
$user_id=$_SESSION['user_id'];
$user_type=$_SESSION['user_type'];
if($user_type == "admin"){
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/admin_template.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Election Voting System</title>
<script src="../javascript/mes_display.js" type="text/javascript"></script>
<script src="../jquery/jquery.js" type="text/javascript"></script>
<script src="../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
<link href="../SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
<script language="javascript">
function gen_grade(div_id,num){
	$('#'+div_id).load("load_grade.php",{'num':num});
}

function del_div(div_id){
	$('#'+div_id).load("empty.php");
}

function grade_validation(){
	valid=true;
	var i=1;
	var status=0;
	for(i=1;i<=$('#item_count').val();i++){
		if(status == 0){
			var g_cat_id="g_cat_id_"+i;
			var grade="grade_"+i;
			if(document.getElementById(g_cat_id) && $('#'+g_cat_id).val() == "" && status == 0){
				status=1;
				valid=false;
				alert("Select Grade Category");
				$('#'+g_cat_id).focus();
			}else if(document.getElementById(grade) && $('#'+grade).val() == "" && status == 0){
				status=1;
				valid=false;
				alert("Enter Grade");
				$('#'+grade).focus();
			}
		}
	}
	return valid;
}
</script>
<!-- InstanceEndEditable -->
</head>

<body>
<table width="1000" align="center" border="5" cellspacing="0" cellpadding="0" bordercolor="#FBFAC8">
<tr>
  <td><table width="1000" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="810" align="center"><table width="1000" border="5" cellspacing="0" cellpadding="0" bordercolor="#FBFAC8">
            <tr>
              <td><table width="1000" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="20">&nbsp;</td>
                  <td width="960">&nbsp;</td>
                  <td width="20">&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="810" align="center"><table border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td><ul id="MenuBar1" class="MenuBarHorizontal">
                            <li><a href="index.php">HOME</a></li>
                            <li><a href="permission.php">PERMISSION</a></li>
                            <li><a href="#" class="MenuBarItemSubmenu">USER&nbsp;&nbsp;</a>
                              <ul>
                                <li><a href="user.php">ADD</a></li>
                                <li><a href="view_user.php">VIEW</a></li>
                              </ul>
                          </li>
                            <li><a href="#" class="MenuBarItemSubmenu">ADMINISTRATION</a>
                              <ul>
                                <li><a href="#" class="MenuBarItemSubmenu">DISTRICT</a>
                                  <ul>
                                    <li><a href="grade_category.php">ADD</a></li>
                                    <li><a href="view_grade_category.php">VIEW</a></li>
                                  </ul>
                                </li>
                                <li><a href="grade.php">ADD SEATS</a></li>
                                <li><a href="view_grade.php">VIEW SEATS</a></li>
                              </ul>
                            </li>
                            <li><a href="#" class="MenuBarItemSubmenu">CANDIDATES</a>
                              <ul>
                                <li><a href="#">ADD</a></li>
                                <li><a href="#">VIEW</a></li>
                              </ul>
                            </li>
                            <li><a href="#">VOTING COUNT</a>                              </li>
<li><a href="../logout.php">LOGOUT</a></li>
                          </ul></td>
                        </tr>
                        <tr> </tr>
                        <tr> </tr>
                        <tr> </tr>
                      </table></td>
                      <td width="150">&nbsp;</td>
                    </tr>
                  </table></td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td align="center" class="page_title_text"><!-- InstanceBeginEditable name="Editable_Title" --><!-- InstanceEndEditable --></td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td align="left" class="body_text"><!-- InstanceBeginEditable name="Editable_Body" -->
        <div id="helpdiv" class="red_text" align="center"><?php if(isset($_SESSION['grade_mes'])){echo $_SESSION['grade_mes'];}?></div>
        <form action="add_grade.php" method="post" name="grade_form" id="grade_form" onsubmit="return grade_validation();">
          <table width="450" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr class="page_title_text">
              <td height="25" colspan="4">ADD GRADE</td>
              </tr>
            <tr>
              <td width="50" height="25">&nbsp;</td>
              <td width="250" align="center" class="tbl_header_right">District</td>
              <td width="100" align="center" class="tbl_header">Seats</td>
              <td width="50">&nbsp;</td>
            </tr>
            <tr>
              <td colspan="4"><table width="450" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="50" height="25" align="center"><img src="../images/add.png" width="16" height="16" style="cursor:pointer" onclick="gen_grade('grade_div_2','2');$('#item_count').val(2);"/></td>
                  <td width="250" align="center" class="border_bottom_left">
                  <select name="g_cat_id_1" class="body_text" id="g_cat_id_1" style="width:15em;">
                  <option value="">Select Category</option>
                  <?php GradeCategory("");?>
                  </select>
                  </td>
                  <td width="100" align="center" class="border_bottom_left_right"><input name="grade_1" type="text" class="body_text" id="grade_1" size="10" style="text-align:right"/></td>
                  <td width="50" align="center">&nbsp;</td>
                </tr>
              </table>
              <div id="grade_div_2"></div>
              <input name="item_count" id="item_count" type="hidden" value="1" />
              </td>
              </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td align="right"><input type="image" src="../images/add.gif" name="add" id="add" value="Submit" /></td>
              <td>&nbsp;</td>
            </tr>
          </table>
          </form>
        <!-- InstanceEndEditable --></td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
              </table></td>
            </tr>
          </table></td>
          </tr>
      </table></td>
    </tr>
  </table></td>
</tr>
</table>
<script type="text/javascript">
<!--
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
//-->
</script>
</body>
<!-- InstanceEnd --></html>
<?php 
}else{
	header('Location:../index.php');
}
unset($_SESSION['grade_mes']);
?>