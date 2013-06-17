<?php 
session_start();
include("../config/db.php");
if($_SESSION['admin_id']==""){
header("Location:index.php");
exit();
}
if(isset($_POST['submit']))
{
extract($_POST);
$check=mysql_query("select * from tbl_admin	where password='".md5($oldpass)."' AND admin_id='".$_SESSION['admin_id']."'");
if(mysql_num_rows($check)>0)
   {
   $chang=mysql_query("update tbl_admin set password='".md5($newpass)."' where admin_id='".$_SESSION['admin_id']."'");
   if($chang){ 
   $msg="Your password has been changed Successfully";
   }
   }else{
   $msg="Old password is not match please try again!!";
  }
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Myshopbazzar.com</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/ddaccordion.js"></script>
<script type="text/javascript">
ddaccordion.init({
	headerclass: "submenuheader", //Shared CSS class name of headers group
	contentclass: "submenu", //Shared CSS class name of contents group
	revealtype: "click", //Reveal content when user clicks or onmouseover the header? Valid value: "click", "clickgo", or "mouseover"
	mouseoverdelay: 200, //if revealtype="mouseover", set delay in milliseconds before header expands onMouseover
	collapseprev: true, //Collapse previous content (so only one open at any time)? true/false 
	defaultexpanded: [], //index of content(s) open by default [index1, index2, etc] [] denotes no content
	onemustopen: false, //Specify whether at least one header should be open always (so never all headers closed)
	animatedefault: false, //Should contents open by default be animated into view?
	persiststate: true, //persist state of opened contents within browser session?
	toggleclass: ["", ""], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively ["class1", "class2"]
	togglehtml: ["suffix", "<img src='images/plus.gif' class='statusicon' />", "<img src='images/minus.gif' class='statusicon' />"], //Additional HTML added to the header when it's collapsed and expanded, respectively  ["position", "html1", "html2"] (see docs)
	animatespeed: "fast", //speed of animation: integer in milliseconds (ie: 200), or keywords "fast", "normal", or "slow"
	oninit:function(headers, expandedindices){ //custom code to run when headers have initalized
		//do nothing
	},
	onopenclose:function(header, index, state, isuseractivated){ //custom code to run whenever a header is opened or closed
		//do nothing
	}
})
</script>
<script src="js/jquery.jclock-1.2.0.js.txt" type="text/javascript"></script>
<script type="text/javascript">
$(function($) {
    $('.jclock').jclock();
});
</script>

<script language="javascript" type="text/javascript" src="js/niceforms.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="css/niceforms-default.css" />
<script type="text/javascript">
$(document).ready(function(){
$('#submit').click(function(){
var oldpass=$('#oldpass').val();
var newpass=$('#newpass').val();
var cpass=$('#cpass').val();
if(oldpass=="")
{
$('#dis').slideDown().html("<span>*Please Enter Old Password!</span>");
return false;
}
if(newpass=="")
{
$('#dis').slideDown().html('<span id="error">*Please Enter New Password!</span>');
return false;
}
if(cpass=="")
{
$('#dis').slideDown().html('<span id="error">*Please Enter Confirm Password!</span>');
return false;
}
if(newpass!=cpass)
{
$('#dis').slideDown().html('<span id="error">*New Password & Confirm Password Not Match!</span>');
return false;
}


});
});
</script>
<style type="text/css">
#dis
{
text-align:none;
height: 25px;
width: 250px;
font-size:15px;
color:#ff0000;
}
</style>
<!--START HERE FOR THE MESSAGE FADE IN FADE OUT -->
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript"> 
$(document).ready( function() {
$('#deletesuccess').delay(3000).fadeOut();
});
</script>
<!--START HERE FOR THE MESSAGE FADE IN FADE OUT -->
</head>

<body>
<div id="main_container">
	<?php include("header.php");?>
    <div class="main_content">
    <?php include("top_menu.php");?>                    
    <div class="center_content">  
    <?php include("left-pannel.php");?>    
    <div class="right_content">            
                <h2>Change Your Password</h2>
	             <?php if(@$msg!=''){ ?><div class="valid_box" id="deletesuccess"><?php echo @$msg;?></div> <?php  }?> 
				<div class="form">
				<form action="" method="post" class="niceform">
				<fieldset>
				<dl>
				<dt><label for="email">Old Password :</label></dt>
				<dd><input type="password" name="oldpass" id="oldpass" size="35" />
				<span id="emailError" style="display:none; color:#FF0000;">*Please Enter Valid Email!</span>
				</dd>
				</dl>
				<dl>
				<dt><label for="email">New Password:</label></dt>
				<dd><input type="password" name="newpass" id="newpass" size="35"/>
				<span id="emailError" style="display:none; color:#FF0000;">*Please Enter Valid Email!</span>
				</dd>
				</dl>
				<dl>
				<dt><label for="email">Confirm Password:</label></dt>
				<dd><input type="password" name="cpass" id="cpass" size="35" />
				<span id="emailError" style="display:none; color:#FF0000;">*Please Enter Valid Email!</span>
				</dd>
				</dl>
				<br /><label id="dis"></label>
				<dl class="submit"><input type="submit" name="submit" id="submit" value="Update" />
				</dl>
				</fieldset>
				
				</form>
				</div>  
      
     </div><!-- end of right content-->
   </div>   <!--end of center content -->               
     
    <div class="clear"></div>
    </div> <!--end of main content-->
	
   <?php include("footer.php");?> 
 </div>		
</body>
</html>