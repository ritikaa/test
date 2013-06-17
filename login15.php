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
    <!--menu-->
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
</head>
<body>
    <div class="main-wrap">
        <?php include("header.php");?>
        <div style="width: 100%; margin: 0; padding: 0; position: relative;">
            <ul id="breadcrumbs-1" class="breadcrumbs">
                <li><a class="home" href="index.php">Home</a> </li>
                <li><a href="login.php">Login</a> </li>
            </ul>
        </div>
        <div style="clear: both; height: 10px;">
        </div>
       
		<form  name="form" method="post" enctype="multipart/form-data" action="" onsubmit="return loginvalid();" > 
        <?php if(@$msg!=''){?><span id="deletesuccess" style="color:#FF0000; text-align:center;"><?php echo @$msg;?></span><?php }?>
		<table width="100%" border="0">
        <tr>
        <td width="82%">
          
		<table width="70%" id="set2" align="center">
		<tr> 
		<td colspan="3" align="center"><h2>User Login</h2></td> 
		</tr>
		<tr><td width="104">
		<label for="type">User Email<span style="color:Red">*</span></label></td><td width="4">:</td>
		<td width="217">
		<input type="text" name="username" id="username" class="inputfield" /><br />
		<span id="usernameError" style="display:none; color:#FF0000">*Please enter user email id!!</span>
		<span id="validuserError" style="display:none; color:#FF0000">*Please enter valid email id!!</span>

		
		</td></tr>
			
		<tr>
		<td>Password<span style="color:Red">*</span></td>
		<td>&nbsp;</td>
		<td><label for="fileField2"></label>
		<input type="password" name="pass" id="upass" class="inputfield" /><br />
		<span id="userpassError" style="display:none; color:#FF0000">*Please enter your password!!</span>
		</td>
		</tr>
		
					
		<tr ><td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>
		<input name="Submit"  value="Login" type="submit" />
		</td></tr>
		
		</table> 
   
   </td>
         
		<td width="18%" valign="top"><table width="55%" border="0" >
        <tr>
        <td> 
		<img src="image1/2.jpg" width="183px" height="140px"/>
		</td>
        </tr>
              
		<tr>
        <td><img src="image1/soft.jpg" width="183px" height="140px" />
        </td>
        </tr>
		
		<tr>
        <td><img src="image1/soft1.jpg" width="183px" height="140px" /></td>
        </tr>
        </table></td>
        </tr>
        
		</table>   
		</form>
		
        </div>
        <div style="clear: both; height: 20px;">
        </div>
       <?php include("footer.php");?>
    </div>
</body>
</html>
