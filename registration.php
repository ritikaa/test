<?php include("config/db.php");

if(isset($_POST['Submit'])){
//start here for the generate office code.
$max=mysql_fetch_array(mysql_query("select MAX(id) from tbl_users"));
$max2=$max[0]+1;
$max3="SF00".$max2;
//end office code
extract($_POST);
//this code is used for the password
$newpas=rand(1111111,9999999);

//this script for the owner images
$ownrimg=$_FILES['fileField']['name'];
$ownrtmp=$_FILES['fileField']['tmp_name'];
move_uploaded_file($ownrtmp,"agr_copy/$ownrimg" );

//this script for the rent agreement copy
$ragrcopy=$_FILES['fileField2']['name'];
$ragrcopy_tmp=$_FILES['fileField2']['tmp_name'];
move_uploaded_file($ragrcopy_tmp,"agr_copy/$ragrcopy" );

//this script for the client agreement copy
$clagrcopy=$_FILES['fileField1']['name'];
$clagrcopy_tmp=$_FILES['fileField1']['tmp_name'];
move_uploaded_file($clagrcopy_tmp,"agr_copy/$clagrcopy" );

//this script for the shop license copy
$shopliccopy=$_FILES['fileField11']['name'];
$shoplic_tmp=$_FILES['fileField11']['tmp_name'];
move_uploaded_file($shoplic_tmp,"lic_copy/$shopliccopy" );

//this script for the trade license copy
$tadliccopy=$_FILES['fileField12']['name'];
$tadlic_tmp=$_FILES['fileField12']['tmp_name'];
move_uploaded_file($tadlic_tmp,"lic_copy/$tadliccopy");

//$hhh=$_POST['email']."".$_POST['email2'];

  $query="INSERT INTO tbl_users (`id`, `type`, `subtype`, `circle_location`, `region`, `facility_code`, `address1`, `address2`, `city`, `pincode`, `location`, `area`, `fname`, `mname`, `lname`, `email`, `password`, `user_contact`, `emp_code`, `wonership`, `client_name`, `caddress`, `ccontact`, `agreement`, `cagree_exdate`, `owner_name`, `oaddress`, `ocontact`, `oagr_copy`, `owner_agr_exdate`, `rent_amount`, `rentagree_copy`, `rentagr_exdate`, `license`, `license_no`, `verifylicense_no`, `license_copy`, `license_exdate`, `tlicense`, `tlicense_no`, `tlicense_copy`, `ticense_exdate`, `date`) VALUES (NULL, '$type', '$subtype', '$spokesubtype', '$region', '$max3','$address1', '$address2', '$city', '$Pincode', '$location', '$area', '$ufname', '$umname', '$ulname', '$email', '$newpas', '$u_contact', '$emp_code', '$ownership', '$c_name', '$c_address', '$c_contact', '".$clagrcopy."', '$c_agr_exp', '$r_name', '$r_address', '$r_contact', '".$ragrcopy."', '$r_agr_exp', '$r_rent', '".$ownrimg."', '$o_agr_exp', '$license', '$se_lic_no', '$se_vlic_no', '".$shopliccopy."', '$se_lic_exp', '$tl_lic_no', '$tl_vlic_no', '".$tadliccopy."', '$tl_lic_exp',now())";

$sql=mysql_query($query);
if($sql){
$name=$_POST['ufname'];
 $lname=$_POST['ulname'];
 $to =$_POST['email']; 
  echo  $message = '
			<html>
			<head>
			 <title>Your Password</title>
			</head>
			<body>
			 
			 <table>
			   
			   <tr>
				 <td colspan=2><h3>Dear '.$name.' '.$lname.',</h3></td>
			   </tr>
			   
			   	<tr>
				 <td colspan=2>Your Email is : '.$to.'</td>
			   </tr>
			   <tr>
				 <td colspan=2>Your password is : '.$newpas.'</td>
			   </tr>
			   <tr>
				 <td colspan=2>Your Office Code is : '.$max3.'</td>
			   </tr>
			   <tr>
				 <td colspan=2>Please login "<a href="http://">http://"</a>Click here to Login</td>
			   </tr>
				<tr><td clospan=2>Thanks & Regards</td></tr>
				<tr><td clospan=2>softage.com</td></tr>
			 </table>
			</body>
			</html>
			'; die();
						//echo $message; exit;
						//$subject = "This is subject";
			$subject = 'Your password';
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			//$headers .= 'From:rajsunil1989@gmail.com'."\r\n";
			//echo "To: ".$to."Subject: ".$subject."Headers: ".$headers; exit;
	   $mail = mail($to, $subject, $message, $headers);
			if($mail)
				{
          $msg = "Your Registration has been succesfully and Office Code is ".$max3;
		//header("location:contactus.php");
		//exit;
}
}else{
@$msg="Sorry please try again!!";
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
	
<script language="javascript" src="js/validation.js" type="text/javascript"></script>	
<script src="js/jquery-1.7.1.js" type="text/javascript" /></script>
<script language="javascript" type="text/javascript" src="js/checkavailable.js"></script>

<script type="text/javascript" src="js/jquery-latest.js"></script>
<script type="text/javascript"> 
$(document).ready( function() {
$('#deletesuccess').delay(9000).fadeOut();
});
</script>


	
</head>
<body>
    <div class="main-wrap">
        <?php include("header.php");?>
        <div style="width: 100%; margin: 0; padding: 0; position: relative;">
            <ul id="breadcrumbs-1" class="breadcrumbs">
                <li><a class="home" href="index.php">Home</a> </li>
                <li><a href="registration.php">Registration</a> </li>
            </ul>
        </div>
        <div style="clear: both; height: 10px;">
        </div>
        
		<form  name="form" method="post" enctype="multipart/form-data" action="" onsubmit="return valid();" > 
        <?php if(@$msg!=''){?><span id="deletesuccess" style="color:#FF0000; text-align:center;"><?php echo @$msg;?></span><?php }?>
		<table width="100%" border="0">
        <tr>
        <td width="82%">
          
		<legend><strong>Please Fill the Facility Details</strong></legend>
		
		<br>
		<table width="70%" id="set1" align="center">
		
		<tr><td width="104">
		<label for="type">Type <span style="color:Red">*</span></label></td><td width="4">:</td>
		<td width="217">
		<select id="type" name="type" class="inputfield" onchange="typeselected()"  >
			<option value=""><---------Select---------></option>
			<option value="Corporate">Corporate</option>
			<option value="Circle">Circle</option>
			<option value="Spoke">Spoke</option>
		</select>
		<span id="typeError" style="display:none; color:#FF0000">*Please select the type!!</span>
		</td></tr>
			
		<tr class="hidden" id="subtyperow"><td>
		<label for="subtype" >Sub Type<span style="color:Red">*</span></label></td><td>:</td>
		<td>
		<select id="subtype" name="subtype" class="inputfield"  >
			<option value=""><---------Select---------></option>
			<option value="Warehouse">Warehouse</option>
			<option value="Office">Office</option>	
		</select>
		<span id="subtypeError" style="display:none; color:#FF0000">*Please select the subtype!!</span>
		
		</td></tr>
		
		<tr class="hidden" id="spokesubtype"><td>
		<label for="spokesubtype" >Circle Location <span style="color:Red">*</span></label></td><td>:</td>
		<td>
		<input id="spokesubtype2" name="spokesubtype"  class="inputfield"  onBlur="chackCirclelocation();" type="text">
		<span id="prod_name_indicator25" style="color:#FF0000;"></span>
		<span id="spokesubtype2Error" style="display:none; color:#FF0000">*Please enter circle location!!</span>
		
		</td>
		</tr>
		
		<br>
		<br>
			
		<tr><td>
		<label for="region">Region <span style="color:Red">*</span></label></td><td>:</td>
		<td>
		<select class="inputfield" name="region" id="resion"  >
			<option value=""><---------Select---------></option>
			<option value="North">North</option>
			<option value="South">South</option>
			<option value="East">East</option>
            <option value="West">West</option>
            <option value="Corporate">Corporate</option>
            <option value="Overseas">Overseas</option>
		</select>
<span id="resionError" style="display:none; color:#FF0000">*Please select the region!!</span>		
		
		</td></tr>
			
		<tr><td width="504">
		<label for="address1">Address1 <span style="color:Red">*</span></label></td><td>:</td>
		<td>
		<textarea name="address1" id="address1" cols="" rows="" class="inputfield" ></textarea>
		<span id="add1Error" style="display:none; color:#FF0000">*Please enter address1!!</span>
		<span id="validadd1Error" style="display:none; color:#FF0000">*Please enter valid charater!!</span>
			
		</td></tr>
		<tr><td>
		<label for="address2">Address2 <span style="color:Red">*</span></label></td><td>:</td>
		<td>
		<textarea name="address2" id="address2" cols="" rows="" class="inputfield" ></textarea>
		<span id="add2Error" style="display:none; color:#FF0000">*Please enter address2!!</span>
		<span id="validadd2Error" style="display:none; color:#FF0000">*Please enter valid character!!</span>
		<span id="validadd2noteqError" style="display:none; color:#FF0000">*Address1 should not be equal to address2!!</span>
		
		</td></tr>
        <tr><td>
		<label for="city">City <span style="color:Red">*</span></label></td><td>:</td>
		<td>
		<input id="city" name="city"  class="inputfield" type="text">
		<span id="cityError" style="display:none; color:#FF0000">*Please enter your city!!</span>
		<span id="validcityError" style="display:none; color:#FF0000">*Enter only alphabet character!!</span>
		</td></tr>
        <tr><td>
		<label for="Pincode">Pincode <span style="color:Red">*</span></label></td><td>:</td>
		<td>
		<input id="Pincode" name="Pincode"  class="inputfield" type="text" maxlength="6">
		
		<span id="PinError" style="display:none; color:#FF0000">*Please enter your pincode!!</span>
		<span id="vpinError" style="display:none; color:#FF0000">*Please enter pincode only in number!!</span>
		<span id="sixpinError" style="display:none; color:#FF0000">*Please enter 6 letter pincode !!</span>
		<span id="samepinError" style="display:none; color:#FF0000">*Invalid pincode !!</span>
		</td></tr>
		<br>
		<br>
		<tr><td>
		<label for="location">Location <span style="color:Red">*</span></label></td><td>:</td>
		<td>
		<input id="location" name="location" class="inputfield"  type="text" onBlur="validatelocation();"/>
		<span style="color:#FF0000;" id="prod_name_indicator2"></span><br />
		<span id="locationError" style="display:none; color:#FF0000">*Please enter your location!!</span>
		<span id="validlcationError" style="display:none; color:#FF0000">*Enter only alphabet character!!</span>
		</td></tr>
		<br>
		<br>
		<tr><td>
		<label for="area">Area(square feets) <span style="color:Red">*</span></label></td><td>:</td>
		<td><input id="area" name="area" class="inputfield" type="text"  > 
		<span id="areaError" style="display:none; color:#FF0000">*Please enter your area !!</span>
		<span id="areaocorfError" style="display:none; color:#FF0000">*Please enter area min 2000 and max 10000 sq ft.!!</span>
		<span id="areaspokError" style="display:none; color:#FF0000">*Please enter area min 300 and max 700 sq ft.!!</span>
		<span id="areaspwarehoError" style="display:none; color:#FF0000">*Please enter area min 10000 and max 25000 sq. ft. !!</span>
		<span id="areaspofficeError" style="display:none; color:#FF0000">*Please enter area min 3000 and max 5000 sq ft. !!</span>
        </td></tr> 
        <tr><td>
		<label for="ufname">User First Name <span style="color:Red">*</span></label></td><td>:</td>
		<td>
		<input id="ufname" name="ufname" class="inputfield"  type="text">
		<span id="fnameError" style="display:none; color:#FF0000">*Please enter first name!!</span>
		<span id="vf2nameError" style="display:none; color:#FF0000">*Enter min 3 letter and alphabet character!!</span>
		</td></tr>
		
		<tr><td>
		<label for="umname">User Middle Name</label></td><td>:</td>
		<td>
		<input id="umname" name="umname" class="inputfield"  type="text" >
		<!--<span id="mnameError" style="display:none; color:#FF0000">*Please enter middle name!!</span>-->
		<span id="vmidd2nameError" style="display:none; color:#FF0000">*Please enter alphabet character !</span>
		</td></tr>
		
		<tr><td>
		<label for="ulname">User Last Name <span style="color:Red">*</span></label></td><td>:</td>
		<td>
		<input id="ulname" name="ulname" class="inputfield"  type="text">
		<span id="lnameError" style="display:none; color:#FF0000">*Please enter last name!!</span>
		<span id="validlastError" style="display:none; color:#FF0000">*Please enter alphabet character!</span>
		</td></tr>
        <tr><td>
		<label for="mail">User Email Id <span style="color:Red">*</span></label></td><td>:</td>
		<td>
		<input id="email" name="email" type="text" class="inputfield" onBlur="validateEmail();"  placeholder="abc@softgaeindia.com"/ >
		
		<span id="prod_name_indicator" style="color:#FF0000;"></span>
		<span id="emailError" style="display:none; color:#FF0000">*Enter your email id!!</span>
		<span id="emailError1" style="display:none; color:#FF0000">*Invalid Email id!!</span>
		</td></tr>
    	<br>
		<br>
		
		<tr><td>
		<label for="u_contact">User Contact No. <span style="color:Red">*</span></label></td><td>:</td>
		<td>
		<input id="u_contact" name="u_contact" class="inputfield" type="text" maxlength="10">
		<span id="contactError" style="display:none; color:#FF0000">*Please enter contact number!!</span>
		<span id="vcontactError" style="display:none; color:#FF0000">*Please enter valid number!!</span>
		<span id="tenconError" style="display:none; color:#FF0000">*Please enter 10 digit number!!</span>
		<span id="contatcvalError" style="display:none; color:#FF0000">*Number start with 7,8,9 letter!!</span>
		
		</td></tr>
		
		<tr><td>
		<label for="emp_code">User Employee Code <span style="color:Red">*</span></label></td><td>:</td>
		<td>
		<input id="emp_code" name="emp_code" class="inputfield" type="text" maxlength="8">
		<span id="empError" style="display:none; color:#FF0000">*Please enter employee code!!</span>
		<span id="validempcError" style="display:none; color:#FF0000">*Start with S,s letter like S0001 !</span>
		
		</td></tr>
		
		<tr><td>
		<label for="ownership">Ownership <span style="color:Red">*</span></label></td><td>:</td>
		<td>
		<select id="ownership" name="ownership" class="inputfield" onchange="typeselected()" >
			<option value=""><---------Select---------></option>
			<option value="Owned">Owned</option>
			<option value="Rented">Rented</option>
			<option value="Client">Client</option>
		</select>
		<span id="ownerError" style="display:none; color:#FF0000">*Please select ownership!!</span>
		
		</td></tr>
	
		<br>
		<br>
			
		<tr class="client hidden"><td>
		<label for="c_name">Client Name <span style="color:Red">*</span></label></td><td>:</td>
		<td>
		<input id="c_name" name="c_name" class="inputfield" type="text">
		<span id="c_nameError" style="display:none; color:#FF0000">*Please enter client name!!</span>
		<span id="validclient2Error" style="display:none; color:#FF0000">*Enter only alphabet character!!</span>
		</td></tr>
			
		<tr class="client hidden"><td>
		<label for="c_address">Client Address <span style="color:Red">*</span></label></td><td>:</td>
		<td>
		<input id="c_address" name="c_address" class="inputfield" type="text"  >
		<span id="c_addressError" style="display:none; color:#FF0000">*Please enter client address!!</span>
		<span id="validclientadd4Error" style="display:none; color:#FF0000">*Enter valid character!!</span>
		
		
		</td></tr>
			
		<tr class="client hidden"><td>
		<label for="c_contact">Client Contact <span style="color:Red">*</span></label></td><td>:</td>
		<td>
		<input id="c_contact" name="c_contact" class="inputfield" type="text" maxlength="10">
		<span id="c_contactError" style="display:none; color:#FF0000">*Please enter contact number!!</span>
		<span id="vc_contError" style="display:none; color:#FF0000">*Please enter valid number!!</span>
		<span id="tenc_contError" style="display:none; color:#FF0000">*Please enter 10 digit number!!</span>
		<span id="validclitcon55Error" style="display:none; color:#FF0000">*Number starts with 7,8,9!</span>
		
		</td></tr>
			
		<tr class="client hidden">
		<td>Agreement Copy <span style="color:Red">*</span></td>
		<td>&nbsp;</td>
		<td><label for="fileField"></label>
		<input type="file" name="fileField1" id="fileField1" class="inputfield" />
		<span id="fileField1Error" style="display:none; color:#FF0000">*Please choose agreement copy!!</span>
		</td>
		</tr>	
	
		<tr class="client hidden"><td>
		<label for="c_agr_exp">Agreement Expiry Date <span style="color:Red">*</span></label></td><td>:</td>
		<td>
		<input id="c_agr_exp" name="c_agr_exp" class="inputfield" type="text" placeholder="mm/dd/yyyy">
		<span id="c_agr_expError" style="display:none; color:#FF0000">*Please enter agreement expiry date!!</span>
		<span id="c_agr_expDate1Error" style="display:none; color:#FF0000">*Your agreement date is expired!!</span>
		
		</td></tr>
		<tr class="rented hidden"><td>
		<label for="r_name">Owner Name <span style="color:Red">*</span></label></td><td>:</td>
		<td>
		<input id="r_name" name="r_name" class="inputfield"type="text" >
		<span id="r_nameError" style="display:none; color:#FF0000">*Please enter owner name!!</span>
		<span id="validownerError" style="display:none; color:#FF0000">*Enter only alphabet character!!</span>
		
		</td></tr>
			
		<tr class="rented hidden"><td>
		<label for="r_address">Owner Address <span style="color:Red">*</span></label></td><td>:</td>
		<td>
		<input id="r_address" name="r_address" class="inputfield" type="text" >
		<span id="r_addrError" style="display:none; color:#FF0000">*Please enter owner address!!</span>
		<span id="validowraddError" style="display:none; color:#FF0000">*Please Enter valid character!</span>
		
		</td></tr>
				
		<tr class="rented hidden"><td>
		<label for="r_contact">Owner Contact <span style="color:Red">*</span></label></td><td>:</td>
		<td>
		<input id="r_contact" name="r_contact" class="inputfield" type="text" maxlength="10" >
		<span id="r_contactError" style="display:none; color:#FF0000">*Please enter contact number!!</span>
		<span id="vr_conError" style="display:none; color:#FF0000">*Please enter valid number!!</span>
		<span id="tenr_conError" style="display:none; color:#FF0000">*Please enter 10 digit number!!</span>
		<span id="validowrcon2Error" style="display:none; color:#FF0000">*Number starts with 7,8,9!!</span>
		
		</td></tr>
				
		<tr class="rented hidden">
		<td>Agreement Copy <span style="color:Red">*</span></td>
		<td>&nbsp;</td>
		<td><label for="fileField"></label>
		<input type="file" name="fileField2" id="fileField2" class="inputfield" />
		<span id="fileField2Error" style="display:none; color:#FF0000">*Please select agreement copy !!</span>
		</td>
		</tr>
		
		<tr class="rented hidden"><td>
		<label for="r_agr_exp">Agreement Expiry Date <span style="color:Red">*</span></label></td><td>:</td>
		<td>
		<input id="r_agr_exp" name="r_agr_exp" class="inputfield" type="text" placeholder="mm/dd/yyyy" >
		<span id="r_agrError" style="display:none; color:#FF0000">*Please enter agreement expiry date!!</span>
		<span id="r_agr_expDate1Error" style="display:none; color:#FF0000">*Your agreement is expired!!</span>		
		
		</td></tr>
				
		<tr class="rented hidden"><td>
		<label for="r_rent">Rent Amount <span style="color:red">*</span></label></td><td>:</td>
		<td>
		<input id="r_rent" name="r_rent" class="inputfield" type="text" >
		<span id="r_rentError" style="display:none; color:#FF0000">*Please enter rent amount!!</span>
		<span id="vr_rentError" style="display:none; color:#FF0000">*Please enter only numeric value!!</span>
		<span id="rentvalid100Error" style="display:none; color:#FF0000">*Enter minimum Rs 1000 !</span>
		
		</td>
		</tr>			
		<tr class="owned hidden">
		<td>Agreement Copy <span style="color:Red">*</span></td>
		<td>&nbsp;</td>
		<td><label for="fileField"></label>
		<input type="file" name="fileField" id="fileField" class="inputfield" />
		<span id="fileFieldError" style="display:none; color:#FF0000">*Please select Agreement Copy!!</span>
		</td>
		</tr>
		<tr class="owned hidden"><td>
		<label for="o_agr_exp">Agreement Expiry Date <span style="color:Red">*</span></label></td><td>:</td>
		<td>
		<input id="o_agr_exp" name="o_agr_exp" class="inputfield" type="text" placeholder="mm/dd/yyyy">
		<span id="o_agr_expError" style="display:none; color:#FF0000">*Please enter agreement expiry date!!</span>
		<span id="o_agr_expDate1Error" style="display:none; color:#FF0000">*Your agreement expired!!</span>
		
		</td></tr>
			
		<tr><td>
		<label for="license">License <span style="color:Red">*</span></label></td><td>:</td>
		<td>
		<select id="license" name="license"class="inputfield" onchange="typeselected()" >
			<option value=""><---------Select---------></option>
			<option value="Shop&Establishment">Shop and Establishment</option>
			<option value="License">Trade License</option>
		</select>
		<span id="licenseError" style="display:none; color:#FF0000">*Please select license!!</span>
		
		</td></tr>
		<br>
		<br>
	
				
		<tr class="shop_estab hidden"><td>
		<label for="se_lic_no">License Number <span style="color:Red">*</span></label></td><td>:</td>
		<td>
		<input id="se_lic_no" name="se_lic_no" type="password" class="inputfield">
		<span id="se_lic_noError" style="display:none; color:#FF0000">*Please enter license number!!</span>
		<span id="se_licError" style="display:none; color:#FF0000">*Please enter only numeric value!!</span>
		
		</td></tr>
		
		<tr class="shop_estab hidden"><td>
		<label for="se_vlic_no">Verify License Number <span style="color:Red">*</span></label></td><td>:</td>
		<td>
		<input id="se_vlic_no" name="se_vlic_no" type="password" class="inputfield">
		<span id="se_vlic_noError" style="display:none; color:#FF0000">*Please enter verify license number!!</span>
		<span id="confirmError" style="display:none; color:#FF0000">*License or verify license does not match !!</span>
		
		</td></tr>
		
		<tr class="shop_estab hidden">
		<td>License copy <span style="color:Red">*</span></td>
		<td>&nbsp;</td>
		<td><label for="fileField1"></label>
		<input type="file" name="fileField11" id="fileField11" class="inputfield"  />
		<span id="fileField11Error" style="display:none; color:#FF0000">*Please choose license copy!!</span>
		
		</td></tr>
				
		<tr class="shop_estab hidden"><td>
		<label for="se_lic_exp">License Expiry Date <span style="color:Red">*</span></label></td><td>:</td>
		<td>
		<input id="se_lic_exp" name="se_lic_exp" type="text" class="inputfield" placeholder="mm/dd/yyyy">
		<span id="se_lic_expError" style="display:none; color:#FF0000">*Please enter license expiry date!!</span>
		<span id="se_lic_expDate1Error" style="display:none; color:#FF0000">*Your license date is expired!</span>
		
		</td></tr>
		<tr class="trade_license hidden"><td>
		<label for="tl_lic_no">License Number <span style="color:Red">*</span> </label></td><td>:</td>
		<td>
		<input id="tl_lic_no" name="tl_lic_no"  type="password" class="inputfield">
		<span id="tl_lic_noError" style="display:none; color:#FF0000">*Please enter license number!!</span>
		<span id="tradeError" style="display:none; color:#FF0000">*Please enter only numeric value!!</span>
		</td></tr>
		
		<tr class="trade_license hidden"><td>
		<label for="tl_vlic_no">Verify License Number <span style="color:Red">*</span></label></td><td>:</td>
		<td>
		<input id="tl_vlic_no" name="tl_vlic_no" type="password" class="inputfield">
		<span id="tl_vlic_noError" style="display:none; color:#FF0000">*Please verify license number!!</span>
		<span id="tradconfirmError" style="display:none; color:#FF0000">*License or verify license does not match !!</span>
		</td></tr>
				
		<tr class="trade_license hidden">
		<td>License copy <span style="color:Red">*</span></td>
		<td>&nbsp;</td>
		<td><label for="fileField2"></label>
		<input type="file" name="fileField12" id="fileField12" class="inputfield"  />
		<span id="fileField12Error" style="display:none; color:#FF0000">*Please choose license copy!!</span>
		</td>
		</tr>
		
		<tr class="trade_license hidden"><td>
		<label for="tl_lic_exp">License Expiry Date <span style="color:Red">*</span></label></td><td>:</td>
		<td>
		<input id="tl_lic_exp" name="tl_lic_exp" type="text"  class="inputfield" placeholder="mm/dd/yyyy">
		<span id="tl_lic_expError" style="display:none; color:#FF0000">*Please enter license expiry date!!</span>
		<span id="tl_lic_expDate1Error" style="display:none; color:#FF0000">*Your license date is expired!!</span>
		
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
		 <?php include("footer.php"); ?>
        </div>
      
	   
    </div>
</body>
</html>
