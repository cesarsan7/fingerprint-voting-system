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
function edit_cat(div_id,cat_id,cat_name){
	$('#'+div_id).html('<p><img src="../images/loader.gif"/></p>');
	$('#'+div_id).load("edit_grade_category.php",{'cat_id':cat_id,'cat_name':cat_name});
}

function cat_validation(cat_name){
	valid=true;
	if($('#'+cat_name).val() == ""){
		valid=false;
		alert("Enter Grade Category");
		$('#'+cat_name).focus();
	}
	return valid;
}

function delete_cat(cat_id){
	if(confirm("Do you want to delete this record?")){
		window.location='delete_grade_category.php?cat_id='+cat_id;
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
        <div class="red_text" id="helpdiv" align="center"><?php if(isset($_SESSION['cat_up_mes'])){echo $_SESSION['cat_up_mes'];}?><?php if(isset($_SESSION['cat_del_mes'])){echo $_SESSION['cat_del_mes'];}?></div>
        <?php 
		$query_cat="SELECT grade_cat_id,grade_cat_name FROM tbl_grade_category WHERE grade_cat_status='0' ORDER BY grade_cat_name";
		$result_cat=mysql_query($query_cat) or die("Unable to select data from the tbl_grade_category. ".mysql_error());
		if(mysql_num_rows($result_cat) != 0){
			$count=0;
		?>
          <table width="300" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td width="200" height="25" align="center" class="tbl_header_right">Seats</td>
              <td width="50" align="center" class="tbl_header_right">Edit</td>
              <td width="50" align="center" class="tbl_header">Delete</td>
            </tr>
            <tr>
              <td height="25" colspan="3" align="left">
              <?php while($row_cat=mysql_fetch_row($result_cat)){ $count++; ?>
              <div id="cat_div_<?php echo $count; ?>" align="center">
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr class="body_text">
                  <td width="200" height="25" align="left" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_cat[1]; ?></td>
                  <td width="50" align="center" class="border_bottom_left"><img src="../images/edit.png" width="10" height="10" style="cursor:pointer" onclick="edit_cat('cat_div_<?php echo $count; ?>','<?php echo $row_cat[0]; ?>','<?php echo $row_cat[1]; ?>');"/></td>
                  <td width="50" align="center" class="border_bottom_left_right"><img src="../images/delete.png" width="10" height="10" style="cursor:pointer" onclick="delete_cat('<?php echo $row_cat[0]; ?>');"/></td>
                </tr>
              </table>
              </div>
              <?php }?>
              </td>
              </tr>
          </table>
          <?php }else{?>
          			<div class="red_text">no records found</div>
          <?php }?>
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
unset($_SESSION['cat_up_mes']);
unset($_SESSION['cat_del_mes']);
?>