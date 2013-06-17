<?php include("config/db.php");


if(isset($_POST['Submit'])){
//extract($_POST);
 $username = $_POST['username']; 
 $pass = $_POST['pass']; 

	$sql = @mysql_query("SELECT * FROM tbl_users WHERE username ='$username' AND password= '$pass'"); 
	$query = @mysql_num_rows($sql);		
	if($query ==1){ 
	       $rs=mysql_fetch_array($sql);
	
				$_SESSION['user_id']  = $rs['id'];
				$_SESSION['user_name'] = $username;
				$_SESSION['user_pass'] = $pass;
				$_SESSION['user_email']    = $rs['email'];
		 //echo "Success";
		 //header("Location:dashboard.php");
	    $msg="Login has been succesfully!!";
      	}else{
		@$msg="Invalid Username/Password!";
	}
}
?>
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <title>Welcome To Softage Facility Management</title>
    <link href="css/style.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" type="text/css" href="menu/ddsmoothmenu.css" />
    <script type="text/javascript" src="menu/jquery.min.js"></script>
    <script type="text/javascript" src="menu/ddsmoothmenu.js"></script>
	<script type="text/javascript" src="js/registration.js"></script>
    <script type="text/javascript">
        ddsmoothmenu.init({
            mainmenuid: "smoothmenu1", //menu DIV id
            orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
            classname: 'ddsmoothmenu', //class added to menu's outer DIV
            //customtheme: ["#1c5a80", "#18374a"],
            contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
        })
    </script>
    <!--end menu-->
 
	
<script type="text/javascript" src="js/jquery-latest.js"></script>
<script type="text/javascript"> 
$(document).ready( function() {
$('#deletesuccess').delay(3000).fadeOut();
});
</script>

<script language="javascript" type="text/javascript">
/*STATR HERE FOT THE LOGIN validation*/
function loginvalid(){
if(document.getElementById("username").value==""){
hideAllErrors();
document.getElementById("usernameError").style.display="inline";
document.getElementById("username").focus();
return false;
}
var emailadd = document.getElementById('username');
var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
if (!filter.test(emailadd.value)) {
hideAllErrors();
document.getElementById("validuserError").style.display="inline";
document.getElementById("username").focus();
return false;
}
if(document.getElementById("upass").value==""){
hideAllErrors();
document.getElementById("userpassError").style.display="inline";
document.getElementById("upass").focus();
return false;
}
}// end here for the login function

function hideAllErrors(){
document.getElementById("usernameError").style.display="none";
document.getElementById("validuserError").style.display="none";
document.getElementById("userpassError").style.display="none";
}
</script>	
<style>
.error{ width:auto; height:auto; font-size:12px; line-height:20px; color:#FF0000; display:none;}
</style>
</head>
<body>
    <div class="main-wrap">
       <!-- <div class="header-bg">
            <!-- Facility Management
        </div>-->
		<?php include("header.php");?>
        <div style="clear: both; height: 70px;">
        </div>
        <div class="login-m">
            <div class="login-mid">
                <div style="height: 100px;">
                </div>
				
				
					<div class="login-mid-s">
					
					<form  name="form" method="post" style="border:none;" action="" onsubmit="return loginvalid();" > 
               <?php if(@$msg!=''){?><span id="deletesuccess" style="color:#FF0000; text-align:center;"><?php echo @$msg;?></span><?php }?>
					<div style="float: left; width: 432px; margin: 0; padding: 0;">
					<span>Username</span>
					<label>
					<input id="username" type="text" name="username" class="login-mid-input" />
<br />
					<div id="usernameError" class="error">*Please enter your username!!</div>
					<div id="validuserError" class="error">*Please enter valid username!!</div>
					</label>
					</div>
					<div class="clr" style="height: 65px;">
					</div>
					<div style="float: left; width: 432px; margin: 0; padding: 0;">
					<span>Password</span>
					<label>
					<input id="upass" type="password" name="password" class="login-mid-input" /><br />
                    <div id="userpassError" class="error">*Please enter ypur password!!</div>
					</label>
					</div>
					<div class="clr" style="height: 90px;">
					</div>
					<div style="float: right; width: 100px; margin: 2px 0px 0 0; overflow: hidden;">
					
					<input type="submit" name="submit" class="login-btn" value="" />
					</div>
					</form>
					</div>

            </div>
        </div>
        <div style="clear: both; height: 20px;">
        </div>
        <?php include("footer.php");?>
    </div>
</body>
</html>
