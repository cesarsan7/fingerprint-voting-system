<?php 
session_start();
require_once '../library/config.php';
require_once '../library/functions.php';
$user_id=$_SESSION['user_id'];
$user_type=$_SESSION['user_type'];
if($user_type == "officer"){

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
<script src="../jquery/jquery.js" type="text/javascript"></script>
<script src="../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
<link href="../SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
<script language="javascript">
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
                            <li><a href="../admin/index.php">HOME</a></li>
                            <li><a href="../admin/permission.php">PERMISSION</a></li>
                            <li><a href="#" class="MenuBarItemSubmenu">USER&nbsp;&nbsp;</a>
                              <ul>
                                <li><a href="../admin/user.php">ADD</a></li>
                                <li><a href="../admin/view_user.php">VIEW</a></li>
                              </ul>
                          </li>
                            <li><a href="#" class="MenuBarItemSubmenu">ADMINISTRATION</a>
                              <ul>
                                <li><a href="#" class="MenuBarItemSubmenu">DISTRICT</a>
                                  <ul>
                                    <li><a href="../admin/grade_category.php">ADD</a></li>
                                    <li><a href="../admin/view_grade_category.php">VIEW</a></li>
                                  </ul>
                                </li>
                                <li><a href="../admin/grade.php">ADD SEATS</a></li>
                                <li><a href="../admin/view_grade.php">VIEW SEATS</a></li>
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
                  <td align="center" class="page_title_text"><!-- InstanceBeginEditable name="Editable_Title" -->
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                  <!-- InstanceEndEditable --></td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td align="left" class="body_text"><!-- InstanceBeginEditable name="Editable_Body" -->
                    <table width="900" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr class="body_text">
                      <td height="25" colspan="4" align="left" class="page_title_text">ADD STUDENT</td>
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
                      <td align="left">&nbsp;</td>
                    </tr>
                    <tr class="body_text">
                      <td width="280" height="25" align="left">Name</td>
                      <td width="20" align="center">:</td>
                      <td width="400" align="left"><?php echo $row_student["vt_name"]; ?></td>
                      <td width="200" align="left">&nbsp;</td>
                    </tr>
                    <tr class="body_text">
                      <td height="25" align="left" valign="top">Address</td>
                      <td align="center" valign="top">:</td>
                      <td align="left"><textarea name="address" id="address" cols="30" rows="8"><?php echo $row_student["vt_address"]; ?></textarea></td>
                      <td align="left"><?php if($row_student["vt_photo_url"] != ""){?><img src="<?php echo $row_student["vt_photo_url"]; ?>" width="200" height="200" /><?php }?></td>
                      <td rowspan="12" align="center"></td>
                    </tr>
                    <tr class="body_text">
                      <td height="25" align="left">NIC</td>
                      <td align="center">:</td>
                      <td align="left"><?php echo $row_student["nic"]; ?></td>
                      <td align="left">&nbsp;</td>
                    </tr>
                    <tr class="body_text">
                      <td height="25" align="left">Date of Birth</td>
                      <td align="center">:</td>
                      <td align="left"><?php echo $row_student["vt_dob"]; ?></td>
                      <td align="left">&nbsp;</td>
                    </tr>
                    <tr class="body_text">
                      <td height="25" align="left">Gender</td>
                      <td align="center">:</td>
                      <td align="left"><?php echo $row_student["vt_gender"]; ?></td>
                      <td align="left"><img src="<?php echo $row_student["vt_barcode_url"]; ?>" width="180" height="50" /></td>
                    </tr>
                    
                    <tr class="body_text">
                      <td height="25" align="left">Finger Enroll</td>
                      <td align="center">:</td>
                      <td align="left"><?php //echo $row_student["vt_other_income"]; ?></td>
                      <td align="center"><a href="<?php echo $row_student["vt_barcode_url"]; ?>" class="blue_text"  a target="_blank">Download</a></td>
                    </tr>
                    <tr class="body_text">
                      <td height="25" align="left" valign="top">&nbsp;</td>
                      <td align="center" valign="top">&nbsp;</td>
                      <td align="left">&nbsp;</td>
                      <td align="left">&nbsp;</td>
                    </tr>
                    <tr class="body_text">
                      <td height="25" align="left">&nbsp;</td>
                      <td align="center">&nbsp;</td>
                      <td align="left">&nbsp;</td>
                      <td align="left">&nbsp;</td>
                    </tr>
                    </table>
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