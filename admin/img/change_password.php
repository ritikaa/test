<?php
session_start();
include_once("../includes/config/db.php");
$db= new db();
if($_SESSION['admin_id']=='')
{
header("Location:index.php");
exit;
}
$msg = '';
if(isset($_POST['submit']))
{
//$username=$_POST['username'];
$oldpass=$_POST['oldpas'];
$newpass=$_POST['newpas'];
//$email=$_POST['email'];

$check=mysql_query("select * from admin where password='$oldpass' AND admin_id='".$_SESSION['admin_id']."'");
if(mysql_num_rows($check)>0)
   {

     $db->query("update admin set password='$newpass' where admin_id='".$_SESSION['admin_id']."'");
    
	 $msg="Password changed Successfully";
   }
  
else
     {
       $msg="Error ! Old Password is Not Matching, try again.";
     }
}
$db=mysql_query("select * from admin");

?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xml:lang="en" xmlns="http://www.w3.org/1999/xhtml" lang="en"><head>


    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <?php include("title_allpage.php"); ?>
    
	<script type="text/javascript" src="js/jquery_003.js"></script>
<script type="text/javascript" src="js/croogo.js"></script><script type="text/javascript">
//<![CDATA[
$.extend(Croogo, {"basePath":"\/croogo\/","params":{"controller":"settings","action":"admin_dashboard","named":[]}});
//]]>
</script>
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/960.css">
	<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="css/admin.css">
	<link rel="stylesheet" type="text/css" href="css/thickbox.css">

	<script type="text/javascript" src="js/jquery-ui.js"></script>
	<script type="text/javascript" src="js/jquery_002.js"></script>
	<script type="text/javascript" src="js/jquery_007.js"></script>
	<script type="text/javascript" src="js/jquery_004.js"></script>
	<script type="text/javascript" src="js/jquery_005.js"></script>
	<script type="text/javascript" src="js/superfish.js"></script>
	<script type="text/javascript" src="js/supersubs.js"></script>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/jquery_006.js"></script>
	<script type="text/javascript" src="js/thickbox-compressed.js"></script>
	<script type="text/javascript" src="js/admin.js"></script>
	
	
<script language="javascript">
function validate(){
document.getElementById("oldpasError").style.display = "none";
document.getElementById("newpasError").style.display = "none";
document.getElementById("cpasError").style.display = "none";

if (document.getElementById('oldpas').value == "")  {
document.getElementById("oldpasError").style.display = "inline";
document.getElementById("oldpas").focus();
return false;
}
if (document.getElementById('newpas').value == "")  {
document.getElementById("newpasError").style.display = "inline";
document.getElementById("newpas").focus();
return false;
}
if (document.getElementById('cpas').value == "")  {
document.getElementById("cpasError").style.display = "inline";
document.getElementById("cpas").focus();
return false;
}
if (document.getElementById('cpas').value != document.getElementById('newpas').value)  {
document.getElementById("invalidpasError").style.display = "inline";
document.getElementById("cpas").focus();
return false;
}
}
</script>

</head><body>

    <div id="wrapper">
        <?php include("headertop.php");?>
       <?php include("headernav.php");?>
        



        <div id="main" class="container_16"> 
		<?php if($msg!=''){?>   <div id="flashMessage" class="success"><?php echo $msg;?></div><?php }?>	
            <div class="grid_16"> 
                <div id="content"> 
                    <div class="settings form"> 
    <h2>Settings: Change Password</h2> 
 
    <form id="form1" name="form1" method="POST" action="" accept-charset="utf-8" onsubmit="return validate()">   <fieldset> 
    <div class="setting"><div class="input text"><label for="Setting0Value">Old&nbsp;Password&nbsp;</label><input name="oldpas" id="oldpas" type="password" value="" rel="" id="oldpass" /><br /><span id="oldpasError" style="display:none;" class="inputerror">*Please enter your old password!</span></div></div>
	
	<div class="setting"><div class="input textarea"><label for="Setting1Value">New&nbsp;Password</label><input name="newpas" id="newpas" type="password" value="" rel="" id="newpassw" /><br /><span id="newpasError" style="display:none;" class="inputerror">*Please enter your new password!</span></div></div>
	
	<div class="setting">
	
	<div class="input text"><label for="Setting2Value">Retype&nbsp;New&nbsp;Password</label><input name="cpas" id="cpas" type="password" value="" rel=""/><br /><span id="cpasError" style="display:none;" class="inputerror">*Please enter confirm password!</span><span id="invalidpasError" style="display:none;" class="inputerror">*confirm password is not matching!</span></div>
	</div>   
	
	</fieldset> 
    <div class="submit"><input type="submit" name="submit" value="Submit" onclick="return validate();"/></div>
	
	</form></div>                </div> 
            </div> 
            <div class="clear">&nbsp;</div> 
        </div>
        
        <div class="push"></div>
    </div>



 <?php include("footer.php");?>
    
    <!-- 0.2893s -->
    </body></html>