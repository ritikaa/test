<?php 
session_start();
include("../config/db.php");
if(isset($_POST['submit'])){
//extract($_POST);

 $username = $_POST['username']; 
 $pass = md5($_POST['pass']); 

	$sql = @mysql_query("SELECT * FROM tbl_admin WHERE username ='$username' AND password= '$pass' AND status=1"); 
	$query = @mysql_num_rows($sql);		
	if($query ==1){ 
	       $rs=mysql_fetch_array($sql);
	
				$_SESSION['admin_id']  = $rs['admin_id'];
				$_SESSION['admin_user'] = $username;
				$_SESSION['admin_pass'] = $pass;
				$_SESSION['admin_email']    = $rs['email'];
		 //echo "Success";
		 header("Location:dashboard.php");
	
      	}else{
		@$msg="Invalid Username/Password!";
	}
}
?>
<?php

/*START HERE FOR THE FORGOT PASS*/ 
if(isset($_POST['sendmail'])!= '') {	
	$email = $_POST['email'];
	$check_email_sql = "SELECT * FROM admin WHERE email='$email'";
	$check_email_query = mysql_query($check_email_sql);
	$fetch_detail = mysql_fetch_array($check_email_query);
	$num_rows = mysql_num_rows($check_email_query);
	$name = $fetch_detail['sirname'];
	$password = $fetch_detail['password'];
	//$name = $fetch_detail['name'];
		if($num_rows >0) { 
		$newpas=rand(1111111,9999999);
		mysql_query("update admin set password='".md5($newpas)."' where admin_id='".$fetch_detail['admin_id']."'");
		//include("forgot_mail.php");
				$to = $email;
echo $message = '
			<html>
			<head>
			 <title>Your Password</title>
			</head>
			<body>
			 
			 <table>
			   
			   <tr>
				 <td colspan=2><h3>Dear '.$name.',</h3></td>
			   </tr>
			   
			   <tr>
				 <td height=10 colspan=2>&nbsp;</td>
			   </tr>
			   
				<tr>
				 <td colspan=2>On behalf of your request for password recovery .we are here having new password.</td>
			   </tr>
			
			   <tr>
				 <td colspan=2>Your new password is : '.$newpas.'</td>
			   </tr>
			   <tr>
				 <td colspan=2>Please login "  <a href="http://dev.nsglobalsystem.com/taskrabbit/login.php">http://dev.nsglobalsystem.com/taskrabbit/login.php"</a>here to change password your password </td>
			   </tr>
				<tr><td clospan=2>Thanks & Regards</td></tr>
				<tr><td clospan=2>TaskRabbit Team</td></tr>
			 </table>
			</body>
			</html>
			';die();
						//echo $message; exit;
						//$subject = "This is subject";
			$subject = 'Your Recovered password';
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$headers .= 'From:info@taskrabbit.com'."\r\n";
			//echo "To: ".$to."Subject: ".$subject."Headers: ".$headers; exit;
	        $mail = mail($to, $subject, $message, $headers);
			if($mail)
				{
                @$msg = "Your new password has been sent to your email please check your email!";
					//header("location:contactus.php");
					//exit;
				}

		} else {
		        @$msg = "Soory invalid your email id try again!";
		} //end of num rows
	} // end of if($_POST[])
	/*START HERE FOR THE FORGOT PASS*/
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include('title.php');?>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<script language="javascript" type="text/javascript" src="js/niceforms.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="css/niceforms-default.css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js">
</script>
<script type="text/javascript">
$(document).ready(function(){
$('#submit').click(function(){
var username=$('#username').val();
var password=$('#pass').val();

if(username=="")
{
$('#dis').slideDown().html("<span>*Please Enter Username!</span>");
return false;
}
if(password=="")
{
$('#dis').slideDown().html('<span id="error">*Please Enter Password!</span>');
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
<!-- THIS CODE START HERE FOR THE FORGOT PASSWORD-->
<link rel="stylesheet" href="css/reveal.css">	
<script type="text/javascript" src="js/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="js/jquery.reveal.js"></script>

<script language="javascript" type="text/javascript">
function check_form() {

document.getElementById("emailError").style.display = "none";

	if(document.getElementById("email").value == "") {
		document.getElementById("emailError").style.display = "inline";
		document.getElementById("email").focus();
		return false;
		}
	if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(document.getElementById('email').value))
	
		{
		//return true; 
		}
		else
		{
		document.getElementById("validemailError").style.display = "inline";
		document.getElementById("email").focus();
		return false;
		}
	}
		</script>

<!-- THIS CODE END HERE FOR THE FORGOT PASSWORD-->
</head>
<body>
<div id="main_container">

	<div class="header_login">
    <div class="logo"><a href="#"><img src="images/softage_logo.png" alt="" title="" border="0" /></a></div>
    
    </div>
    
	<div class="error_box_main">
	<?php if(@$msg!=''){ ?>
	<div class="error_box"><?php echo @$msg;?></div> <?php  }?> </div>
	
         <div class="login_form">
         
         <h3>Login Admin Panel</h3>
     

         <a href="#" data-reveal-id="myModal" class="forgot_pass">Forgot password</a> 
           
				<form action="" method="post" class="niceform" name="login">
				<fieldset>
				<dl>
				<dt><label for="email">Username:</label></dt>
				<dd><input type="text" name="username" id="username" size="54" /></dd>
				</dl>
				<dl>
				<dt><label for="password">Password:</label></dt>
				<dd><input type="password" name="pass" id="pass" size="54" /></dd>
				</dl>
				
				<br /><label id="dis"></label>
      			<dl class="submit">	<input type="submit" name="submit" id="submit" value="Login" />
				</dl>

				</fieldset>

				</form>
         </div>  
          
	<div id="myModal" class="reveal-modal">
			<h2>Forgot Password</h2>
			
			<form name="forgot" method="post" action="">
			<table width="90%" border="0" cellspacing="5" cellpadding="5">
          <tr>
            <td width="27%" align="left">Email :</td>
            <td width="73%" ><input name="email" id="email" type="text" />
			<span id="emailError" style="display:none;color:#FF0000;" >*Please enter email!</span>
            <span id="validemailError" style="display:none;color:#FF0000;" >*Please enter valid email!</span>
			</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td ><input type="submit" name="sendmail" value="Send" onclick="return check_form();"></td>
          </tr>
</table>
           
  <a class="close-reveal-modal">&#215;</a>
   </form>
		</div>
    
    <div class="footer_login">
    
    	<div class="left_footer_login">ADMIN PANEL | Powered by <a href="#" target="_blank"></a></div>
    	
    
    </div>

</div>	
</body>
</html>