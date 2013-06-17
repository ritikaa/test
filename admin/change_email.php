<?php 
session_start();
include("../config/db.php");
if($_SESSION['admin_id']==""){
header("Location:index.php");
exit();
}

if(isset($_POST['submit']))
{
$oldemail=$_POST['email'];
//$newemail=$_POST['newemail'];
   @$em = mysql_query("update tbl_admin set email='$oldemail' where admin_id='".$_SESSION['admin_id']."'");

	 @$msg="Your email has been changed Successfully";
}
$check=mysql_query("select * from tbl_admin where admin_id='".$_SESSION['admin_id']."' ");
$line= mysql_fetch_array($check);


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
<!--Start here for Check unique name users -->
<script language="javascript">
function valid(){
var emailadd = document.getElementById('email');
var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
if (!filter.test(emailadd.value)) {
hideAllErrors();
document.getElementById("emailError").style.display="inline";
document.getElementById("email").focus();
return false;
}
}//end here for the 
function hideAllErrors() {
document.getElementById("emailError").style.display="none";
}
</script>
</head>
<body>
<div id="main_container">
	<?php include("header.php");?>
    <div class="main_content">
    <?php include("top_menu.php");?>                    
    <div class="center_content">  
    <?php include("left-pannel.php");?>    
    <div class="right_content">            
            <h2>Change Email Address</h2>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript"> 
$(document).ready( function() {
$('#deletesuccess').delay(3000).fadeOut();
});
</script>			
                <?php if(@$msg!=''){ ?><div class="valid_box" id="deletesuccess"><?php echo @$msg;?></div> <?php  }?> 
	 			<div class="form">
				<form action="" method="post" class="niceform" onsubmit="return valid();">
				<fieldset>
				<dl>
				<dt><label for="email">Email Id :</label></dt>
				<dd><input type="text" name="email" id="email" size="35"  value="<?php echo $line['email'];?>" />
				<span id="emailError" style="display:none; color:#FF0000;">*Please Enter Valid Email!</span>
				</dd>
				</dl>
				<dl class="submit"><input type="submit" name="submit" id="submit" value="Submit" />
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