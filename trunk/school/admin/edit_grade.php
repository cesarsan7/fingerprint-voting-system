<?php 
session_start();
require_once '../library/config.php';
require_once '../library/functions.php';
$user_id=$_SESSION['user_id'];
$user_type=$_SESSION['user_type'];
if($user_type == "admin"){
	$query_grade="SELECT grade_name,grade_cat_id FROM tbl_grade WHERE grade_id='".$_GET['grade_id']."' AND grade_status='0'";
	$result_grade=mysql_query($query_grade) or die("Unable to select data from the tbl_grade. ".mysql_error());
	$row_grade=mysql_fetch_row($result_grade);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/admin_template.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Election Voting System</title>
<script src="../jquery/jquery.js" type="text/javascript"></script>
<script src="../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
<link href="../SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
<script language="javascript">
function grade_validation(){
	with(document.grade_form){
		valid=true;
		if(grade.value == ""){
			valid=false;
			alert("Enter Grade");
			grade.focus();
		}else if(g_cat_id.selectedIndex == 0){
			valid=false;
			alert("Select Grade Category");
			g_cat_id.focus();
		}
		return valid;
	}
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
        <div class="red_text" align="center"><?php if(isset($_SESSION['up_error_mes'])){echo $_SESSION['up_error_mes'];}?></div>
        <form action="update_grade.php" method="post" name="grade_form" id="grade_form" onsubmit="return grade_validation();">
        <input name="grade_id" id="grade_id" type="hidden" value="<?php echo $_GET['grade_id']; ?>" />
        <table width="410" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr class="body_text">
            <td align="center" class="rounded-corners">
          <table width="400" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr class="body_text">
              <td height="25" colspan="3" align="left" class="page_title_text">EDIT District/Seats</td>
              </tr>
            <tr class="body_text">
              <td width="125" height="25" align="left">District</td>
              <td width="20" align="center">:</td>
              <td width="255" align="left"><select name="g_cat_id" class="body_text" id="g_cat_id" style="width:15em;">
                <option value="">Select Category</option>
                  <?php GradeCategory($row_grade[1]);?>
              </select></td>
            </tr>
            <tr class="body_text">
              <td height="25" align="left">Seats</td>
              <td align="center">:</td>
              <td align="left"><input name="grade" type="text" class="body_text" id="grade" size="10" value="<?php echo $row_grade[0]; ?>"/></td>
            </tr>
            <tr class="body_text">
              <td height="35" align="left">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="left"><input type="image" src="../images/update.gif" name="update" id="update" value="Submit" /></td>
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
unset($_SESSION['up_error_mes']);
?>