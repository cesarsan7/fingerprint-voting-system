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
<script src="../jquery/jquery.js" type="text/javascript"></script>
<script src="../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
<link href="../SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
<script language="javascript">

function gen_foods(div_id,num){
	$('#'+div_id).load("gen_foods.php",{'num':num});
}

function del_div(div_id){
	$('#'+div_id).load("empty.php");
}



$(document).ready(function (){
	pay_type();
});

function pay_type(){
	if ($('#pay_id').val()=="foods"){
		$('#pay_div').load("load_food_pay.php");
	}else if($('#pay_id').val()=="effort"){
		$('#pay_div').load("load_pay.php");
	}else {
		$('#pay_div').load("empty.php");
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
                  <td align="center" class="page_title_text"><!-- InstanceBeginEditable name="Editable_Title" -->
                    <p>ADD PAYMENT</p>
                    <p>&nbsp;</p>
                  <!-- InstanceEndEditable --></td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td align="left" class="body_text"><!-- InstanceBeginEditable name="Editable_Body" -->
                  <div class="red_text" align="center" id="helpdiv"><?php if(isset($_SESSION['student_com_mes'])){echo $_SESSION['student_com_mes'];}?></div>
                  <form action="add_payment.php" method="post" name="add_payment" > 
                    <table width="420" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="100" height="25">Student ID </td>
                        <td width="20" align="center">:</td>
                        <td width="300"><input name="id" type="text" class="body_text" size="15
                        
                        " id="id" />
                       </td>
                      </tr>
                      <tr>
                        <td height="25" colspan="3"><table width="400" border="0" cellspacing="0" cellpadding="0">
                          <tr class="body_text">
                            <td width="100" height="25" align="left">Pay Type</td>
                            <td width="20" align="center">:</td>
                            <td width="280" align="left"><select name="pay_id" id="pay_id"  class="body_text" onchange="pay_type();">
                              <option value="cash">Cash</option>
                              <option value="effort">Effort</option>
                              <option value="foods">Foods</option>
                              <option selected="select" value="">Select Type</option>
                            </select></td>
                          </tr>
                        </table>
                       <div align="center" id="pay_div"></div>
                        </td>
                        </tr>
                      <tr>
                        <td height="25">Amount</td>
                        <td align="center">:</td>
                        <td>
                          <input name="amount" type="text" class="body_text" id="amount" />
                          </td>
                      </tr>
                      <tr>
                        <td height="25">Pay Year</td>
                        <td align="center">:</td>
                        <td>
                          <input name="year" type="text" class="body_text" id="year" />
                          </td>
                      </tr>
                      <tr>
                        <td height="25">How to pay</td>
                        <td align="center">:</td>
                        <td><label for="term"></label>
                          <select name="term" class="body_text" id="term">
                            <option>0</option>
                            <option>1month</option>
                            <option>2month</option>
                            <option>3month</option>
                            <option>4month</option>
                            <option>5month</option>
                            <option>6month</option>
                            <option>7month</option>
                            <option>8month</option>
                            <option>9month</option>
                            <option>10month</option>
                            <option>11month</option>
                            <option>1year</option>
                            <option selected="selected">Select How Long Time</option>
                          </select></td>
                      </tr>
                      <tr>
                        <td height="25">
                          <input type="submit" name="submit" id="submit" value="Submit" />
                        </td>
                        <td align="center">&nbsp;</td>
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
unset($_SESSION['student_com_mes']);
?>