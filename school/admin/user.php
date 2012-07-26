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
<script src="../javascript/reset.js" type="text/javascript"></script>
<script src="../jquery/jquery.js" type="text/javascript"></script>
<script language="JavaScript" src="../jquery/jquery.ui.all.js" type="text/javascript"></script>
<script src="../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
<link href="../SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<link href="../css/ui.datepicker.css" rel="stylesheet" type="text/css" />
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
<script language="javascript">
$(document).ready(function (){
	$('#date').datepicker({dateFormat: 'yy-mm-dd'});
	});
function user_validation(){
	with(document.user_form){
		valid=true;
		if(name.value == ""){
			valid=false;
			alert("Enter Name");
			name.focus();
		}else if(u_type.selectedIndex == 0){
			valid=false;
			alert("Select User Type");
			u_type.focus();
		}else if(uname.value == ""){
			valid=false;
			alert("Enter Username");
			uname.focus();
		}else if(pwd.value == ""){
			valid=false;
			alert("Enter Password");
			pwd.focus();
		}
		return valid;
	}
}

function check_username(){
	$('#uname_div').load("check_username.php",{'uname':$('#uname').val()});
}

$(document).ready(function (){
	$('#date').datepicker({dateFormat: 'yy-mm-dd'});
	
});
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
        <div id="helpdiv" align="center" class="red_text"><?php if(isset($_SESSION['user_com_mes'])){echo $_SESSION['user_com_mes'];}?></div>
        <form action="add_user.php" method="post" name="user_form" id="user_form" onsubmit="return user_validation();">
        <table width="420" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr class="body_text">
            <td align="center" class="rounded-corners">
          <table width="400" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr class="body_text">
              <td height="25" colspan="3" align="left" class="page_title_text">ADD USER</td>
              </tr>
            <tr class="body_text">
              <td width="125" height="25" align="left">Name</td>
              <td width="20" align="center">:</td>
              <td width="255" align="left"><input name="name" type="text" class="body_text" id="name" size="40" /></td>
            </tr>
            <tr class="body_text">
              <td height="25" align="left">NIC</td>
              <td align="center">:</td>
              <td align="left"><input name="nic" type="text" class="body_text" id="nic" size="25" /></td>
            </tr>
            <tr class="body_text">
              <td height="25" align="left" valign="top">Address</td>
              <td align="center" valign="top">:</td>
              <td align="left"><textarea name="address" cols="30" rows="3" class="body_text" id="address"></textarea></td>
            </tr>
            <tr class="body_text">
              <td height="25" align="left">Telephone No</td>
              <td align="center">:</td>
              <td align="left"><input name="tel" type="text" class="body_text" id="tel" size="25" /></td>
            </tr>
            <tr class="body_text">
              <td height="25" align="left">E mail</td>
              <td align="center">:</td>
              <td align="left"><input name="email" type="text" class="body_text" id="email" size="25" /></td>
            </tr>
            <tr class="body_text">
              <td height="25" align="left">date</td>
              <td align="center">:</td>
              <td align="left"><input name="date" type="text" class="body_text" id="date" size="25" /></td>
            </tr>
            <tr class="body_text">
              <td height="25" align="left">User Type</td>
              <td align="center">:</td>
              <td align="left">
              <select name="u_type" class="body_text" id="u_type">
              <option value="">Select User Type</option>
              <option value="admin">Admin</option>
              <option value="officer">Officer</option>
              </select>
              </td>
            </tr>
            <tr class="body_text">
              <td height="25" colspan="3" align="left"><table width="400" border="0" cellspacing="0" cellpadding="0">
                <tr class="body_text">
                  <td width="125" height="25" align="left">Username</td>
                  <td width="20" align="center">:</td>
                  <td width="255" align="left"><input name="uname" type="text" class="body_text" id="uname" size="25" onkeyup="check_username();"/></td>
                </tr>
              </table>
              <div id="uname_div" class="red_text" align="center"></div>
              </td>
              </tr>
            <tr class="body_text">
              <td height="25" align="left">Password</td>
              <td align="center">:</td>
              <td align="left"><input name="pwd" type="password" class="body_text" id="pwd" size="25" /></td>
            </tr>
            <tr class="body_text">
              <td height="25" align="left">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="left"><input type="image" src="../images/add.gif" name="add" id="add" value="Submit" />
                <img src="../images/clear.gif" width="65" height="35" style="cursor:pointer" onclick="reset_form('user_form');"/></td>
            </tr>
          </table>
          </td>
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
unset($_SESSION['user_com_mes']);
?>