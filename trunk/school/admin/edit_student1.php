<?php 
session_start();
require_once '../library/config.php';
require_once '../library/functions.php';
$st_id=$_SESSION['st_id'];
{
	$query_student="SELECT * FROM tbl_student WHERE st_id='".$_GET['st_id']."'";
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
	<form action="update_student.php" method="post" name="student_form" id="student_form" onsubmit="return student_validation();">
    <input name="st_id" id="st_id" type="hidden" value="<?php echo $_GET['st_id']; ?>" />
       <table width="425" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr class="body_text">
              <td height="25" colspan="3" align="left" class="page_title_text">ADD STUDENT</td>
              </tr>
            <tr class="body_text">
              <td width="150" height="25" align="left">Name</td>
              <td width="20" align="center">:</td>
              <td width="255" align="left"><input name="name" type="text" class="body_text" id="name"  value="<?php echo $row_cl["st_name"]; ?>"/></td>
            </tr>
            <tr class="body_text">
              <td height="25" align="left" valign="top">Address</td>
              <td align="center" valign="top">:</td>
              <td align="left"><textarea name="address" id="address" cols="30" rows="3"><?php echo $row_cl["st_address"]; ?></textarea></td>
            </tr>
            <tr class="body_text">
              <td height="25" align="left">Telephone No</td>
              <td align="center">:</td>
              <td align="left"><input name="tel" type="text" class="body_text" id="tel" size="15" value="<?php echo $row_cl["st_tel"]; ?>"/></td>
            </tr>
            <tr class="body_text">
              <td height="25" align="left">Date of Birth</td>
              <td align="center">:</td>
              <td align="left"><input name="dob" type="text" class="body_text" id="dob" size="15" value="<?php echo $row_cl["st_dob"]; ?>"/></td>
            </tr>
            <tr class="body_text">
              <td height="25" align="left">Gender</td>
              <td align="center">:</td>
              <td align="left">
              <select name="gender" class="body_text" id="gender">
              <option value="">Select Gender</option>
              <option value="Male">Male <?php if($row_cl["st_gender"] == "male"){echo "selected";}?></option>
              <option value="Female">Female <?php if($row_cl["st_gender"] == "female"){echo "selected";}?></option>
              </select>
              </td>
            </tr>
            <tr class="body_text">
              <td height="25" align="left">Disability</td>
              <td align="center">&nbsp;</td>
              <td align="left"><textarea name="st_disability" cols="45" rows="5" class="body_text" id="st_disability"><?php echo $row_cl["st_disability"]; ?></textarea></td>
            </tr>
            <tr class="body_text">
              <td height="25" align="left">Lives With</td>
              <td align="center">:</td>
              <td align="left"><div id="live_div">
                <input type="radio" name="live" id="live" value="farther" <?php if($row_cl["st_lives_with"] == "farther"){echo "selected";}?>/>
                Father 
                <input type="radio" name="live" id="live2" value="Mother" <?php if($row_cl["st_lives_with"] == "Mother"){echo "selected";}?>/>
                Mother 
                <input type="radio" name="live" id="live3" value="Both"  <?php if($row_cl["st_lives_with"] == "Both"){echo "selected";}?>/>
                Both 
                <input type="radio" name="live" id="live4" value="Other" <?php if($row_cl["st_lives_with"] == "Other"){echo "selected";}?> />
                Other
              <?php echo $row_cl["st_lives_with"]; ?></div></td>
            </tr>
            <tr class="body_text">
              <td height="25" align="left">Father's Name</td>
              <td align="center">:</td>
              <td align="left"><input name="f_name" type="text" class="body_text" id="f_name" size="40" value="<?php echo $row_cl["st_farther_name"]; ?>" /></td>
            </tr>
            <tr class="body_text">
              <td height="25" align="left">Father's Contact No</td>
              <td align="center">:</td>
              <td align="left"><input name="f_tel" type="text" class="body_text" id="f_tel" size="15" value="<?php echo $row_cl["st_father_cont_no"]; ?>"/></td>
            </tr>
            <tr class="body_text">
              <td height="25" align="left">Father's Email Address</td>
              <td align="center">:</td>
              <td align="left"><input name="f_email" type="text" class="body_text" id="f_email" size="40" value="<?php echo $row_cl["st_father_email"]; ?>"/></td>
            </tr>
            <tr class="body_text">
              <td height="25" align="left">Father's Income</td>
              <td align="center">:</td>
              <td align="left"><input name="f_income" type="text" class="body_text" id="f_income" size="15" value="<?php echo $row_cl["st_father_income"]; ?>"/></td>
            </tr>
            <tr class="body_text">
              <td height="25" align="left">Father's Designation</td>
              <td align="center">:</td>
              <td align="left"><select name="f_designation" id="f_designation">
<option>farmer</option>
                <option>fishermen <?php if($row_cl["st_father_job"] == "fishermen"){echo "selected";}?></option>
                <option>self employed <?php if($row_cl["st_father_job"] == "self employed"){echo "selected";}?></option>
                <option>service men <?php if($row_cl["st_father_job"] == "service men "){echo "selected";}?></option>
                <option>private sector <?php if($row_cl["st_father_job"] == "private sector "){echo "selected";}?></option>
                <option>unemployed <?php if($row_cl["st_father_job"] == "unemployed "){echo "selected";}?></option>
                <option>cleark <?php if($row_cl["st_father_job"] == "cleark "){echo "selected";}?></option>
                <option selected="selected">select designation</option>
                
              <?php echo $row_cl["st_father_job"]; ?></select></td>
            </tr>
            <tr class="body_text">
              <td height="25" align="left">Mother's Name</td>
              <td align="center">:</td>
              <td align="left"><input name="m_name" type="text" class="body_text" id="m_name" size="40" value="<?php echo $row_cl["st_mother_name"]; ?>"/></td>
            </tr>
            <tr class="body_text">
              <td height="25" align="left">Mother's Contact No</td>
              <td align="center">:</td>
              <td align="left"><input name="m_tel" type="text" class="body_text" id="m_tel" size="15" value="<?php echo $row_cl["st_mother_cont_no"]; ?>"/></td>
            </tr>
            <tr class="body_text">
              <td height="25" align="left">Mother's Email Address</td>
              <td align="center">:</td>
              <td align="left"><input name="m_email" type="text" class="body_text" id="m_email" size="40" value="<?php echo $row_cl["st_mother_email"]; ?>"/></td>
            </tr>
            <tr class="body_text">
              <td height="25" align="left">Mother's Income</td>
              <td align="center">:</td>
              <td align="left"><input name="m_income" type="text" class="body_text" id="m_income" size="15" value="<?php echo $row_cl["st_mother_income"]; ?>"/></td>
            </tr>
            <tr class="body_text">
              <td height="25" align="left">Mother's Designation</td>
              <td align="center">:</td>
              <td align="left"><select name="m_designation" id="m_designation">
                <option selected="selected">select designation</option>
                <option>cleark <?php if($row_cl["st_mother_job"] == "cleark"){echo "selected";}?></option>
                <option>govermenr servant <?php if($row_cl["st_mother_job"] == "govermenr servant"){echo "selected";}?></option>
                <option>fishermen <?php if($row_cl["st_mother_job"] == "fishermen"){echo "selected";}?></option>
                <option>self employed <?php if($row_cl["st_mother_job"] == "self employed"){echo "selected";}?></option>
                <option>service women <?php if($row_cl["st_mother_job"] == "service women"){echo "selected";}?></option>
                <option>private sector <?php if($row_cl["st_mother_job"] == "private sector"){echo "selected";}?></option>
                <option>unemployed <?php if($row_cl["st_mother_job"] == "unemployed "){echo "selected";}?></option>
              </select></td>
            </tr>
            <tr class="body_text">
              <td height="25" align="left">Guardian's Name</td>
              <td align="center">:</td>
              <td align="left"><input name="g_name" type="text" class="body_text" id="g_name" size="40" value="<?php echo $row_cl["st_guardian_name"]; ?>"/></td>
            </tr>
            <tr class="body_text">
              <td height="25" align="left">Guardian's Contact No</td>
              <td align="center">:</td>
              <td align="left"><input name="g_tel" type="text" class="body_text" id="g_tel" size="15" value="<?php echo $row_cl["st_guardian_cont_no"]; ?>"/></td>
            </tr>
            <tr class="body_text">
              <td height="25" align="left">Guardian's Email Address</td>
              <td align="center">:</td>
              <td align="left"><input name="g_email" type="text" class="body_text" id="g_email" size="40" value="<?php echo $row_cl["st_guardian_name"]; ?>" /></td>
            </tr>
            <tr class="body_text">
              <td height="25" align="left">Guardian's Income</td>
              <td align="center">:</td>
              <td align="left"><input name="g_income" type="text" class="body_text" id="g_income" size="15" value="<?php echo $row_cl["st_guardian_income"]; ?>"/></td>
            </tr>
            <tr class="body_text">
              <td height="25" align="left">Guardian's Designation</td>
              <td align="center">:</td>
              <td align="left"><select name="g_designation" id="g_designation">
                <option>select designation<?php if($row_cl["st_guardian_job"] == "select designation"){echo "selected";}?></option>
                <option>cleark <?php if($row_cl["st_guardian_job"] == "cleark"){echo "selected";}?></option>
                <option>fishermen <?php if($row_cl["st_guardian_job"] == "fishermen"){echo "selected";}?></option>
                <option>goverment servant <?php if($row_cl["st_guardian_job"] == "unemployed goverment servant "){echo "selected";}?></option>
                <option>servicemen <?php if($row_cl["st_guardian_job"] == "servicemen "){echo "selected";}?></option>
                <option>self employed <?php if($row_cl["st_guardian_job"] == "self employed "){echo "selected";}?></option>
                <option>unemployed <?php if($row_cl["st_guardian_job"] == "unemployed "){echo "selected";}?></option>
                <option>farmer <?php if($row_cl["st_guardian_job"] == "farmer "){echo "selected";}?></option>value="<?php echo $row_cl["st_guardian_job"]; ?>"
              </select></td>
            </tr>
            <tr class="body_text">
              <td height="25" align="left">Other Income</td>
              <td align="center">:</td>
              <td align="left"><input name="other_income" type="text" class="body_text" id="other_income" size="15" value="<?php echo $row_cl["st_other_income"]; ?>"/></td>
            </tr>
            <tr class="body_text">
              <td height="25" align="left" valign="top">Student Information</td>
              <td align="center" valign="top">:</td>
              <td align="left"><textarea name="information" id="information" cols="30" rows="3"> <?php echo $row_cl["st_information"]; ?></textarea></td>
            </tr>
            <tr class="body_text">
              <td height="25" align="left">Photograph</td>
              <td align="center">:</td>
              <td align="left"><input name="photo" type="file" class="body_text" id="photo" /></td>
            </tr>
            <tr class="body_text">
              <td height="25" align="left">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="left"><input type="image" src="../images/add.gif" name="add" id="add" value="Submit" /></td>
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