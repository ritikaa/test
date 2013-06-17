<?php
include("config/db.php");
switch($_POST['process'])
{
		case 'checkcat':
		$catname =$_POST['catname']."@softageindia.com";
		$strsqlcat = "select * from  tbl_users where email='".$catname."' ";
		$resultcat = mysql_query($strsqlcat);
		$rr=mysql_fetch_array($resultcat);
		//$expo= explode("@",$rr['email']);
	    //echo $ex=$expo[0];
		//echo $rr['email'];
		if(mysql_num_rows($resultcat)>=1)
		{
			echo "1";
		}
		else
		{
			echo "0";
		}
		break;
		case 'checkcat1':
		$catname1 =$_POST['catname1'];
		$strsqlcat = "select * from  tbl_users where location='".$catname1."' ";
		$resultcat = mysql_query($strsqlcat);
		if(mysql_num_rows($resultcat)>=1)
		{
			echo "1";
		}
		else
		{
			echo "0";
		}
		break;
		
}
		
		
	
	