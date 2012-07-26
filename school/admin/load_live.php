<?php 
session_start();
require_once '../library/config.php';

$customerid=$_REQUEST['st_name'];

$query="SELECT st_lives_with FROM  tbl_student WHERE st_name='$st_name'";
$rsd = mysql_query($query);
$row=mysql_fetch_row($rsd);

?>
         farther
     <input type="radio" name="live" id="st_name" value="farther" <?php if($row[0] == "Yes"){echo "checked";}?> /> 
            mother
    <input type="radio" name="live" id="live" value="mother" <?php if($row[0] == "mother"){echo "checked";}?> />
        both
        <input type="radio" name="live" id="live" value="both" <?php if($row[0] == "both"){echo "checked";}?> />
        other
        <input type="radio" name="live" id="live" value="other" <?php if($row[0] == "other"){echo "checked";}?> />
<?php
mysql_close($connection);

?>