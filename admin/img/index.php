<?php 
session_start();
include_once("../includes/config/db.php");
extract($_POST);


$msg='';
$msg1='';

	if(isset($_POST['submit']))
	{
		$db  = new db;
	 	 $sql = mysql_query("select * from admin where username='$uname' and password='$pass'"); 
		
		if(mysql_num_rows($sql)>0)
		{   $rs=mysql_fetch_array($sql);
		 
			$_SESSION['admin_id']       = $rs['admin_id'];
			$_SESSION['admin_username'] = $uname;
			$_SESSION['admin_password'] = $pass;
			
//echo $_SESSION['admin_id'];die;
			header("location:dashboard.php");
			exit;
		}
		else
		{
			$msg = "Invalid login info!";
		}
	}
	
	if(isset($_POST['log'])== "Logout")
	{
		@session_destroy();
		@session_unregister(admin_id);
		@session_unregister(admin_username);
		@session_unregister(admin_password);
		echo "Successfully Logged Out!";
	}

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xml:lang="en" xmlns="http://www.w3.org/1999/xhtml" lang="en"><head>


    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <?php include("title_allpage.php"); ?>
    
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/960.css">
	<link rel="stylesheet" type="text/css" href="css/admin.css">
</head>
<body>

    <div id="wrapper" class="login">
        <div id="header">
            <p id="backtosite">Admin Login - Mika Singh</p> 
        </div>

        <div id="main">
            <div id="login">
         <?php if($msg!=''){?>   <div id="authMessage" class="message"><?php echo $msg;?></div><?php }?>
		 <?php if($msg1!=''){?>   <div id="flashMessage" class="success"><?php echo $msg1;?></div><?php }?>	
			<div class="users form">
    <form id="UserAdminLoginForm" method="post" action="" accept-charset="utf-8">
	<div style="display: none;"><input name="_method" value="POST" type="hidden">
	<input name="data[_Token][key]" value="32066f847a33affa482f0fa795954405255d0ee3" id="Token1567874716" type="hidden"></div> 
	       <fieldset>
        <div class="input text required"><label for="UserUsername">Username</label><input value="" name="uname" maxlength="60" id="username" type="text"></div>
        <div class="input password required"><label for="UserPassword">Password</label><input name="pass" id="password" type="password"></div>        </fieldset>
    <div class="submit"><input name="submit" value="Log In" type="submit"></div>
	
	</form>
	
	
	</div>            </div>
        </div>

        <div id="footer">   </div>
    </div>
<?php include("footer.php");?>

    <!-- 0.2754s --></body></html>