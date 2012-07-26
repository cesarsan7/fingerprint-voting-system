<?php 
session_start();
require_once '../library/config.php';
require_once '../library/functions.php';
$user_id=$_SESSION['user_id'];
$user_type=$_SESSION['user_type'];
if($user_type == "officer"){
	
	
	$query_user="SELECT * FROM tbl_user WHERE u_id='$user_id'";
	$result_user=mysql_query($query_user) or die("unable to select data from the tbl_user. ".mysql_error());
	$row_user=mysql_fetch_assoc($result_user);
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/officer_template.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Election Voting System</title>
<script src="../jquery/jquery.js" type="text/javascript"></script>
<script src="../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
</head>

<body>
<table width="1000" align="center" border="5" cellspacing="0" cellpadding="0" bordercolor="#FBFAC8">
<tr>
  <td>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
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
<li><a href="#" class="MenuBarItemSubmenu">VOTER</a>
  <ul>
                  <li><a href="student.php">ADD</a></li>
                  <li><a href="view_student.php">VIEW</a></li>
                  </ul>
              </li>
              <li><a href="#">VOTING COUNT</a></li>
              <li><a href="../logout.php">LOGOUT</a></li>
            </ul></td>
</tr>
          <tr> </tr>
          <tr> </tr>
          <tr> </tr>
        </table></td>
        <td width="150">&nbsp;</td>
      </tr>
      <tr>
        <td width="810" align="center"><table border="0" cellspacing="0" cellpadding="0">
          <tr> </tr>
        </table></td>
      </tr>
    </table></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="left"><!-- InstanceBeginEditable name="Editable_Body" -->
	<div id="helpdiv" class="red_text" align="center">
 		<?php if(isset($_SESSION['user_up_mes'])){echo $_SESSION['user_up_mes'];}?>
        </div>
        <form action="update_profile.php" method="post" name="profile_form" id="profile_form" onsubmit="return user_profile_validation();">
          <table width="400" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr class="body_text">
              <td height="25" colspan="3" align="left"><table width="400" border="0" cellspacing="0" cellpadding="0">
                <tr class="body_text">
                  <td width="125" height="25" align="left">Username</td>
                  <td width="20" align="center">:</td>
                  <td width="255" align="left"><input name="uname" type="text" class="body_text" id="uname" size="25" value="<?php echo $row_user["u_uname"]; ?>" onkeyup="check_username('<?php echo $user_id; ?>');"/></td>
                  </tr>
                </table>
                <div id="umane_div" align="center" class="red_text"></div>
             </td>
            </tr>
            <tr class="body_text">
              <td width="125" height="25" align="left">Password</td>
              <td width="20" align="center">:</td>
              <td width="255" align="left"><input name="pwd" type="text" class="body_text" id="pwd" />
                <input name="old_pwd" id="old_pwd" type="hidden" value="<?php echo $row_user["u_pwd"]; ?>" /></td>
            </tr>
            <tr class="body_text">
              <td height="25" align="left">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="left"><input type="image" src="../images/update.gif" name="update" id="update" value="Submit" /></td>
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
</table>
</td>
</tr>
</table>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
<!-- InstanceEnd --></html>
<?php 
}else{
	header('Location:../index.php');
}
?>