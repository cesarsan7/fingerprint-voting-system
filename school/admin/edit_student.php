<?php 
session_start();
require_once '../library/config.php';
require_once '../library/functions.php';
$user_id=$_SESSION['user_id'];
$user_type=$_SESSION['user_type'];
if($user_type == "admin"){

	$query_student="SELECT * FROM tbl_student WHERE vt_id='".$_GET['vt_id']."'";
	$result_student=mysql_query($query_student) or die("Unable to select data from the tbl_student. ".mysql_error());
	$row_student=mysql_fetch_assoc($result_student);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/admin_template.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>School Management System</title>
<script src="../javascript/mes_display.js" type="text/javascript"></script>
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
	$('#dob').datepicker({dateFormat: 'yy-mm-dd'});
function student_validation(){
	with(document.student_form){
		valid=true;
		if(name.value == ""){
			valid=false;
			alert("Please Enter Name");
			name.focus();

		return valid;
	}}
}

function check_username(){
	$('#uname_div').load("check_username.php",{'uname':$('#uname').val()});
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
	<form action="update_student.php" method="post" name="student_form" id="student_form" enctype="multipart/form-data" onsubmit="return student_validation();">
    <input name="st_id" id="st_id" type="hidden" value="<?php echo $_GET['vt_id']; ?>" />
       <table width="425" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr class="body_text">
              <td height="25" colspan="3" align="left" class="page_title_text">ADD STUDENT</td>
              </tr>
            <tr class="body_text">
              <td height="25" align="left">Student ID</td>
              
              <td align="center">:</td>
              <td align="left"><?php 
			  $count_zero ="";
			  for($x=1;$x<=(5-strlen(genLibraryID()));$x++){
				 $count_zero .="0";
			  }
			  echo $count_zero .=genLibraryID();
			  ?>
                <input name="vt_id" id="vt_id" type="hidden" value="<?php echo $count_zero; ?>" /></td>
            </tr>
            <tr class="body_text">
              <td width="150" height="25" align="left">Name</td>
              <td width="20" align="center">:</td>
              <td width="255" align="left"><input name="name" type="text" class="body_text" id="name"  value="<?php echo $row_student["vt_name"]; ?>"/></td>
            </tr>
            <tr class="body_text">
              <td height="25" align="left" valign="top">Address</td>
              <td align="center" valign="top">:</td>
              <td align="left"><textarea name="address" id="address" cols="30" rows="3"><?php echo $row_student["vt_address"]; ?></textarea></td>
            </tr>
            <tr class="body_text">
              <td height="25" align="left">NIC</td>
              <td align="center">:</td>
              <td align="left"><input name="tel" type="text" class="body_text" id="tel" size="15" value="<?php echo $row_student["nic"]; ?>"/></td>
            </tr>
            <tr class="body_text">
              <td height="25" align="left">Date of Birth</td>
              <td align="center">:</td>
              <td align="left"><input name="dob" type="text" class="body_text" id="dob" size="15" value="<?php echo $row_student["vt_dob"]; ?>"/></td>
            </tr>
            <tr class="body_text">
              <td height="25" align="left">Gender</td>
              <td align="center">:</td>
              <td align="left">
              <select name="gender" class="body_text" id="gender">
              <option value="">Select Gender</option>
              <option value="Male" <?php if($row_student["vt_gender"] == "male"){echo "selected";}?> >Male</option>
              <option value="Female" <?php if($row_student["vt_gender"] == "female"){echo "selected";}?> >Female </option>
              </select>
              </td>
            </tr>
            
            <tr class="body_text">
              <td height="25" align="left" valign="top">Student Information</td>
              <td align="center" valign="top">:</td>
              <td align="left"><textarea name="information" id="information" cols="30" rows="3" class="body_text"><?php echo $row_student["age"]; ?></textarea></td>
              
              
              
            </tr>
            <tr class="body_text">
              <td height="25" align="left">Photograph</td>
              <td align="center">:</td>
              <td align="left"><input name="photo" type="file" class="body_text" id="photo" /></td>
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
?>