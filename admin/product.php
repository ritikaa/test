<?php 
session_start();
include("../config/db.php");
include_once("thumbnail.inc.php");
if($_SESSION['admin_id']==""){
header("Location:index.php");
exit();
}
if(isset($_POST['add'])=='Submit'){
extract($_POST);

$texta =addslashes($_POST['content']);
$shortdes =addslashes($_POST['shortdes']);
$image_name=$_FILES['images']['name']; 
$ptname =$_FILES['images']['tmp_name'];
move_uploaded_file($ptname,'product/'.$image_name);

//////1st/////////////
$ext = substr($image_name,-3,3);
$myarr = explode(".",$image_name);
$n=time().$myarr[0];
//$n1=$_SESSION['new_listid']."_".$tt."1.".$ext;
$n1=$n."1.".$ext;
//echo $n1;die;
$thumb=new Thumbnail('product/'.$image_name);
$thumb->resize(180,190);
$thumb->save('product/thumb/'.$n1);
//;//2nd

$sql="INSERT INTO `tbl_product`(`id`,`name`,`price`,`spe_price`,`model`,`image`,`thumb`,`short_des`,`description`,`status`,`date`) 
VALUES (NULL,'$name','$price','$spprice','$model','".$image_name."','".$n1."','$shortdes','$texta','$status', NOW())";
$sql1=mysql_query($sql);
if($sql1){
//$msg ="New user added successfully!";
header("Location:manage_product.php");
}else{
$msg ="Users not added try agains!";
}
}


$fetch=mysql_fetch_array(mysql_query("SELECT * FROM `tbl_product` WHERE id='".$_GET['id']."'"));
if(isset($_POST['edit'])=='Update'){
extract($_POST);

$texta =addslashes($_POST['content']);
$shortdes =addslashes($_POST['shortdes']);
$image_name=$_FILES['images']['name']; 
$ptname =$_FILES['images']['tmp_name'];

if($image_name!="") {
move_uploaded_file($ptname,'product/'.$image_name);

//////1st/////////////
$ext = substr($image_name,-3,3);
$myarr = explode(".",$image_name);
$n=time().$myarr[0];
//$n1=$_SESSION['new_listid']."_".$tt."1.".$ext;
$n1=$n."1.".$ext;
//echo $n1;die;
$thumb=new Thumbnail('product/'.$image_name);
$thumb->resize(180,190);
$thumb->save('product/thumb/'.$n1);
//;//2nd

$del_image = "product/thumb/".$_POST['old_image'];
if((file_exists($del_image)) && ($_POST['old_image']!="")){
unlink($del_image); }


$query=mysql_query("UPDATE `tbl_product` SET `name`='$name',`price`='$price',`spe_price`='$spprice', `model`='$model',`image`='".$image_name."',`thumb`='".$n1."',`short_des`='$shortdes',`description`='$texta',`status`= '$status' WHERE `id`='".$_GET['id']."'");

}else{
$query=mysql_query("UPDATE `tbl_product` SET `name`='$name',`price`='$price',`spe_price`='$spprice',`model`='$model', `short_des`='$shortdes',`description`='$texta',`status`= '$status' WHERE `id`='".$_GET['id']."'");
}

if($query){
header("Location:manage_product.php");
}else{
$msg="User not updated please try again";
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
<link rel="stylesheet" type="text/css" media="all" href="css/niceforms-default.css" />
<!--<script>
$(document).ready(function(){
$('#name').keyup(username_check);
});
	
function username_check(){	
var name = $('#name').val();
if(name == "" || name.length < 4){
$('#name').css('border', '0px #F8F8F8 solid');
$('#tick').hide();
}else{

jQuery.ajax({
   type: "POST",
   url: "check_prname.php",
   data: 'name='+ name,
   cache: false,
   success: function(response){
if(response == 1){
	$('#name').css('border', '1px #000 solid');	
	$('#tick').hide();
	$('#cross').fadeIn();
	}else{
	$('#name').css('border', '1px #000 solid');
	$('#cross').hide();
	$('#tick').fadeIn();
	     }

}
});
}
}
</script>-->
<style>
#username{
	padding:0px;
	/*font-size:18px;*/
	border:0px #000 solid;
}
#tick{display:none}
#cross{display:none}
</style>
<!--Start here for Check unique name users -->
<script language="javascript">
function valid(){
if(document.getElementById("name").value==""){
hideAllErrors();
document.getElementById("nameError").style.display="inline";
document.getElementById("name").focus();
return false;
}
if(document.getElementById("price").value==""){
hideAllErrors();
document.getElementById("priceError").style.display="inline";
document.getElementById("price").focus();
return false;
}
var mrpValue=document.getElementById('price').value;
if(isNaN(mrpValue)===true){
//alert('please input only numbers!');
document.getElementById("validpriceError").style.display="inline";
document.getElementById("price").focus();
  return false;
}

var mrpValue2=document.getElementById('spprice').value;
if(isNaN(mrpValue2)===true){
//alert('please input only numbers!');
document.getElementById("sppriceError").style.display="inline";
document.getElementById("spprice").focus();
  return false;
}

if(document.getElementById("model").value==""){
hideAllErrors();
document.getElementById("modelError").style.display="inline";
document.getElementById("model").focus();
return false;
}

if(document.getElementById("images").value==""){
hideAllErrors();
document.getElementById("imageError").style.display="inline";
document.getElementById("images").focus();
return false;
}
if(document.getElementById("status").selectedIndex==""){
hideAllErrors();
document.getElementById("statusError").style.display="inline";
document.getElementById("status").focus();
return false;
}
return true;
}//end here for the 

function hideAllErrors() {
document.getElementById("nameError").style.display="none";
document.getElementById("priceError").style.display="none";
document.getElementById("validpriceError").style.display="none";
document.getElementById("sppriceError").style.display="none";
document.getElementById("modelError").style.display="none";
document.getElementById("imageError").style.display="none";
document.getElementById("statusError").style.display="none";
}
</script>

<!--START HERE FOR THE MESSAGE FADE IN FADE OUT -->
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript"> 
$(document).ready( function() {
$('#deletesuccess').delay(3000).fadeOut();
});
</script>
<!--START HERE FOR THE MESSAGE FADE IN FADE OUT -->

<script type="text/javascript" src="tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "exact",
		elements : "content",
		theme : "advanced",
		width : 300,
		height : 290,
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		
	});
</script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "exact",
		elements : "shortdes",
		theme : "advanced",
		width : 250,
		height :200,
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		
	});
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
                <?php if(isset($_GET['id'])!=''){?><h2>Edit Product</h2><?php }else{?><h2>Add Product</h2><?php }?>
               <?php if(@$msg!=''){ ?><div class="valid_box" id="deletesuccess"><?php echo @$msg;?></div> <?php }?> 
				<div class="form">
				<form action="" method="post" class="niceform" enctype="multipart/form-data" onsubmit="return valid();">
				<fieldset>
				<dl>
				<dt><label for="email">Product Name :</label></dt>
				<dd><input type="text" name="name" id="name" size="25" value="<?php echo $fetch['name'];?>" />
				<span id="nameError" style="display:none; color:#FF0000;">*Please Enter Product Name!</span><br />
                 
				</dd>
				</dl>
				<dl>
				<dt><label for="email">Price:</label></dt>
				<dd><input type="text" name="price" id="price" size="25"  value="<?php echo $fetch['price'];?>" />
				<span id="priceError" style="display:none; color:#FF0000;">*Please Enter product price!</span><br />
                <span id="validpriceError" style="display:none; color:#FF0000;">*Please valid price!</span>
				
				</dd>
				</dl>
				<dl>
				<dt><label for="password">Special Price :</label></dt>
				<dd><input type="text" name="spprice" id="spprice" size="25"  value="<?php echo $fetch['spe_price'];?>" />
				<span id="sppriceError" style="display:none; color:#FF0000;">*Please Enter sepcial price!</span>
				</dd>
				</dl>
				
				<dl>
				<dt><label for="password">Model No :</label></dt>
				<dd><input type="text" name="model" id="model" size="25"  value="<?php echo $fetch['model'];?>" />
				<span id="modelError" style="display:none; color:#FF0000;">*Please Enter model No!</span>
				</dd>
				</dl>
				
				<dl>
				<dt><label for="email">Product Image :</label></dt>
				
				<dd>
				<input type="hidden" id="old_image" name="old_image" value="<?php echo $fetch['thumb']; ?>"/>
				<input type="file" name="images" id="images"/><img src="product/thumb/<?php echo $fetch['thumb'];?>" width="35" height="50" />
				<span id="imageError" style="display:none; color:#FF0000;">*Please Enter product image!</span>
				</dd>
				</dl>
				<dl>
				<dt><label for="email">Short Brief :</label></dt>
				<dd><textarea name="shortdes" id="shortdes"><?php echo $fetch['short_des'];?></textarea>
				<span id="emailError" style="display:none; color:#FF0000;">*Please short description!</span>
				</dd>
				</dl>
				<dl>
				<dt><label for="email">Long Brief :</label></dt>
				<dd><textarea name="content" id="content"><?php echo $fetch['description'];?></textarea>
				<span id="emailError" style="display:none; color:#FF0000;">*Please Enter long description!</span>
				</dd>
				</dl>
				<dl>
				<dt><label for="gender">Status :</label></dt>
				<dd>
				<select name="status" id="status">
				<option value="">Select</option>
				<option value="1" <?php if($fetch['status']==1){?> selected="selected" <?php }?>>Active</option>
				<option value="0" <?php if($fetch['status']==0){?> selected="selected" <?php }?>>In Active</option>
				</select>
				<span id="statusError" style="display:none; color:#FF0000; margin-left:160px;">*Please Select status!</span>
				</dd>
				</dl>
				<dl class="submit"><?php if(isset($_GET['id'])!=''){?>
				<input type="submit" name="edit" id="submit" value="Update" />
				<?php }else{?>
				<input type="submit" name="add" id="submit" value="Submit" />
				<?php }?>
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