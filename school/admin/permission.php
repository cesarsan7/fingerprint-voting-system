<?php 
session_start();
require_once '../library/config.php';
require_once '../library/functions.php';
$user_id=$_SESSION['user_id'];
$user_type=$_SESSION['user_type'];
if($user_type == "admin"){
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="../Templates/admin_template.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Election Voting System</title>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<link href="../css/jquery.autocomplete.css" rel="stylesheet" type="text/css" />
<script src="../jquery/jquery.js" type="text/javascript"></script>
<script src="../jquery/jquery.autocomplete.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
<link href="../SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />

<script src="../jquery/jquery.js" type="text/javascript"></script>
<script src="../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
<link href="../SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
<script language="javascript">
function set_permission(u_id,t_id,box_id){
	var type="";
	var mes="";
	if(document.getElementById(box_id).checked == true){
		type="assign";
		mes="Permission has been assigned";
	}else{
		type="remove";
		mes="Permission has been removed";
	}
	$.ajax({
		url: 'set_permission.php',
		cache: false,
		data:{'u_id':u_id,'t_id':t_id,'type':type},
		success: function(data) {
			document.getElementById("helpdiv").innerHTML=mes;	
		}
	});	
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
                  <td align="center" class="page_title_text"><!-- InstanceBeginEditable name="Editable_Title" -->SET USER PERMISSION<!-- InstanceEndEditable --></td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td align="left" class="body_text"><!-- InstanceBeginEditable name="Editable_Body" -->
                  <div id="helpdiv" class="red_text" align="center"></div>
        <?php 
		$query_user="SELECT * FROM tbl_user WHERE u_status='0' AND u_type ='user' ORDER BY u_name";
		$result_user=mysql_query($query_user) or die("Unable to select data from the tbl_user. ".mysql_error());
		if(mysql_num_rows($result_user) != 0){
		?>
                    <table border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="250" height="25" align="center" class="tbl_header_right_small">User Name</td>
                        <?php 
			  $query_t_count="SELECT COUNT(t_id) FROM tbl_tab";
			  $result_t_count=mysql_query($query_t_count) or die("Unable to select data from the tbl_tab. ".mysql_error());
			  $row_t_count=mysql_fetch_row($result_t_count);
			  
			  $count=0;
			  $t_count=0;
			  $query_t="SELECT * FROM tbl_tab";
			  $result_t=mysql_query($query_t) or die("Unable to select data from the tbl_tab. ".mysql_error());
			  while($row_t=mysql_fetch_row($result_t)){
				  $count++;
			  ?>
                        <td width="100" align="center" class="<?php if($row_t_count[0] == $count){echo "tbl_header_small";}else{echo "tbl_header_right_small";}?>"><?php echo $row_t[1]; ?></td>
                        <?php 
			  }
			  ?>
                      </tr>
                      <?php while($row_user=mysql_fetch_assoc($result_user)){?>
                      <tr class="body_text" onmouseover="this.style.backgroundColor='#EDFBD9';" onmouseout="this.style.backgroundColor='';">
                        <td height="20" align="left" class="border_bottom_left" style="padding-left:3pt;"><?php echo $row_user["u_name"]; ?></td>
                        <?php
			  $t_count=0;
			  $query_tab="SELECT * FROM tbl_tab";
			  $result_tab=mysql_query($query_tab) or die("Unable to select data from the tbl_tab. ".mysql_error());
              while($row_tab=mysql_fetch_row($result_tab)){
				  $t_count++;
			  ?>
                        <td width="100" align="center" class="<?php if($row_t_count[0] == $t_count){echo "border_bottom_left_right";}else{echo "border_bottom_left";}?>"><input type="checkbox" name="p_id_<?php echo $row_user["u_id"]; ?>_<?php echo $row_tab[0]; ?>" id="p_id_<?php echo $row_user["u_id"]; ?>_<?php echo $row_tab[0]; ?>" onclick="set_permission('<?php echo $row_user["u_id"]; ?>','<?php echo $row_tab[0]; ?>','p_id_<?php echo $row_user["u_id"]; ?>_<?php echo $row_tab[0]; ?>');" <?php if(checkUserPermission($row_user["u_id"],$row_tab[0]) == 1){echo "checked";}?>/></td>
                        <?php 
			  }
			  ?>
                      </tr>
                      <?php }?>
                    </table>
                    <?php }else{?>
          			<div class="red_text">No records found</div>
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
?>