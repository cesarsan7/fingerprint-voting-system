<?php 
session_start();
require_once '../library/config.php';
require_once '../library/functions.php';
$user_id=$_SESSION['user_id'];
$user_type=$_SESSION['user_type'];
if($user_type == "officer"){
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
<script language="javascript">
$(document).ready(function (){
	search_student('0');
});

function search_student(page){
	
	
	
	$('#student_div').html('<p><img src="../images/loading.gif"/></p>');
	$('#student_div').load("search_student.php",{'name':$('#name').val(),'page':page});
	
	
}

function delete_student(vt_id){
	if(confirm("Do you want to delete this student?")){
		window.location='delete_student.php?vt_id='+vt_id;
	}
}

</script>
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
	
	
               <table width="420" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td align="center" class="rounded-corners"><table width="400" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td height="25" colspan="3" align="left" class="page_title_text">SEARCH VOTER</td>
                </tr>
                <tr>
                  <td width="125" height="25" align="left">Name</td>
                  <td width="20" align="center">:</td>
                  <td width="355" align="left"><input name="name" type="text" class="body_text" id="name" size="40" /></td>
                </tr>
                
                <tr>
                  <td height="25" align="left">&nbsp;</td>
                  <td align="center">&nbsp;</td>
                  <td align="left"><input type="image" src="../images/search.gif" name="search" id="search" value="Submit" onclick="search_student('0');"/></td>
                </tr>
              </table></td>
            </tr>
          </table>
          <br />
          <div class="red_text" align="center" id="helpdiv"><?php if(isset($_SESSION['student_del_mes'])){echo $_SESSION['student_del_mes'];}?><?php if(isset($_SESSION['student_up_mes'])){echo $_SESSION['student_up_mes'];}?></div>
        <div id="student_div" align="center"></div>
        <div id="student_div" align="center"></div><!-- InstanceEndEditable --></td>
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
unset($_SESSION['student_del_mes']);
unset($_SESSION['student_up_mes']);
?>