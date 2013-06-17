<?php 
session_start();
error_reporting(0);
include("../config/db.php");
if($_SESSION['admin_id']==""){
header("Location:index.php");
exit();
}
/*START HERE FOTTHE single DELETE*/
if(isset($_GET['act'])=='del')
{
$query="delete from tbl_users where id='".$_GET['id']."'";
mysql_query($query);
header("Location:manage_user.php");
 exit();
}
/*END HERE FOTTHE single DELETE*/
$sql="SELECT * FROM users";
$result=mysql_query($sql);
$count=mysql_num_rows($result);

$details=@mysql_query("SELECT * FROM `tbl_users` order by id desc");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("title.php");?>
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
<script language="JavaScript">
function toggle(source) {
  checkboxes = document.getElementsByName('checkbox[]');
  for(var i in checkboxes)
    checkboxes[i].checked = source.checked;
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
   <!-- statr of right content--> 
    <div class="right_content">            
    <h2>Manage Users</h2>
<form name="manage" action="" method="post">   
<table id="rounded-corner">
    <thead>
    	<tr>
        	<th width="34" class="rounded-company" >
			<input type="checkbox" onClick="toggle(this)" />&nbsp;</th>
            <th width="102" class="rounded" scope="col">Surname</th>
            <th width="99" class="rounded" scope="col">Username</th>
            <th width="117" class="rounded" scope="col">Email</th>
            <th width="83" class="rounded" scope="col">Status</th>
			<th width="84" class="rounded" scope="col">Date</th>
            <th width="37" class="rounded" scope="col">Edit</th>
            <th width="33" class="rounded-q4" scope="col">Delete</th>
        </tr>
    </thead>
 	<tbody>
    <?php while($row=mysql_fetch_array($details)){?>
    <tr>
    <td><input name="checkbox[]" type="checkbox" id="checkbox[]" value="<?php echo $row['id']; ?>"></td>
    <td><?php echo ucfirst($row['surname']);?></td>
    <td><?php echo ucfirst($row['username']);?></td>
    <td><?php echo $row['email'];?></td>
    <td><?php if($row['status']==1){ echo "Active";}else{ echo "In Active";}?></td>
    <td><?php echo date("d/m/Y",strtotime($row['date']));?></td>
    <td><a href="add_user.php?id=<?php echo $row['id'] ?>"><img src="images/user_edit.png" alt="" title="" border="0" /></a></td>
    <td nowrap="nowrap"><a href="manage_user.php?act=del&id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure want to delete?');"><img src="images/trash.png" alt="" title="" border="0" /></a></td>
    </tr>
    <?php //$sn++;
	} ?>
    </tbody>
</table>
<a href="add_user.php" class="bt_green"><span class="bt_green_lft"></span><strong>Add new</strong><span class="bt_green_r"></span></a>   
<a href="#" class="bt_red"><span class="bt_red_lft"></span><strong><input type="submit" name="delete" value="Delete" /></strong><span class="bt_red_r"></span></a> 
<?php 

if(isset($_POST['delete']))
{
  for($i=0;$i<$count;$i++){
  //echo $_REQUEST['checkbox'][$i];

  $del_id=$_REQUEST['checkbox'][$i];
  $sql = "DELETE FROM users WHERE id='$del_id'";
  $result = mysql_query($sql);
}
  if($result){ echo "<meta http-equiv=\"refresh\" content=\"0;URL=manage_user.php\">";}
}
?>
</form>
   </div>
   <!-- end of right content-->    
  </div>   <!--end of center content -->                    
    <div class="clear"></div>
    </div> <!--end of main content-->	
   <?php include("footer.php");?> 
  </div>		
</body>
</html>