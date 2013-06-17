<?php include("config/db.php");
if(isset($_POST['Submit'])){
extract($_POST);
$check=mysql_query("select * from tbl_users	where password='".$oldpass."' AND id='".$_SESSION['user_id']."'");
if(mysql_num_rows($check)>0)
   {
   $chang=mysql_query("update tbl_users set password='".$newpass."' where id='".$_SESSION['user_id']."'");
   if($chang){ 
   $msg="Your password has been changed Successfully";
   }
   }else{
   $msg="Old password is not match please try again!!";
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
/*START HERE FOR THE CHANGE PASSWORD VALIDATION*/
function changepass(){
if(document.getElementById("oldpass").value==""){
hideAllErrors();
document.getElementById("oldpassError").style.display="inline";
document.getElementById("oldpass").focus();
return false;
}	
if(document.getElementById("newpass").value==""){
hideAllErrors();
document.getElementById("newpassError").style.display="inline";
document.getElementById("newpass").focus();
return false;
}	

if(document.getElementById("cpass").value==""){
hideAllErrors();
document.getElementById("cpassError").style.display="inline";
document.getElementById("cpass").focus();
return false;
}	
if((document.getElementById("newpass").value)!=(document.getElementById("cpass").value)){
hideAllErrors();
document.getElementById("confirmpassError").style.display="inline";
document.getElementById("cpass").focus();
return false;
}
}
//end here for the changepass function
function hideAllErrors(){
document.getElementById("oldpassError").style.display="none";
document.getElementById("newpassError").style.display="none";
document.getElementById("cpassError").style.display="none";
document.getElementById("confirmpassError").style.display="none";
}

/*END HERE FOR THE CHANGE PASSWORD VALIDATION*/

</script>
</head>
<body>
    <div class="main-wrap">
        <?php include("header.php");?>
        <div style="width: 100%; margin: 0; padding: 0; position: relative;">
            <ul id="breadcrumbs-1" class="breadcrumbs">
                <li><a class="home" href="index.php">Home</a> </li>
                <li><a href="chandepass.php">Change Password</a> </li>
            </ul>
        </div>
        <div style="clear: both; height: 10px;">
        </div>
       
		<form  name="form" method="post" enctype="multipart/form-data" action="" onsubmit="return changepass();" > 
        <?php if(@$msg!=''){?><span id="deletesuccess" style="color:#FF0000; text-align:center;"><?php echo @$msg;?></span><?php }?>
		<table width="100%" border="0">
        <tr>
        <td width="82%">
          
		<table width="70%" id="set2" align="center">
		<tr> 
		<td colspan="3" align="center"> <h2>Change User Password</h2></td> 
		</tr>
		
		<tr><td width="104">
		<label for="type">Old Password<span style="color:Red">*</span></label></td><td width="4">:</td>
		<td width="217">
		<input type="password" name="oldpass" id="oldpass" class="inputfield" /><br />
		<span id="oldpassError" style="display:none; color:#FF0000">*Please enter old password!!</span>
		</td></tr>
			
		<tr>
		<td>New Password<span style="color:Red">*</span></td>
		<td>&nbsp;</td>
		<td><label for="fileField2"></label>
		<input type="password" name="newpass" id="newpass" class="inputfield"  /><br />
		<span id="newpassError" style="display:none; color:#FF0000">*Please enter new password!!</span>
		</td>
		</tr>
		
		<tr><td>
		<label for="tl_lic_exp">Confirm Password<span style="color:Red">*</span></label></td><td>:</td>
		<td>
		<input type="password" name="cpass" id="cpass" class="inputfield"  /><br />
		<span id="cpassError" style="display:none; color:#FF0000">*Please enter confirm password!!</span>
		<span id="confirmpassError" style="display:none; color:#FF0000">*Please confirm OR new password are not mathc!!</span>

		
		</td></tr>
				
		<tr ><td>
		</td><td></td>
		<td>
		<input name="Submit"  value="Submit" type="submit" />
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
