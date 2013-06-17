<?php
include("config/db.php");
switch($_POST['process'])
{
		case 'checkemail':
		$emailcheck =$_POST['emailcheck'];
		$strsqlcat = "select * from  tbl_users where email='".$emailcheck."' ";
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
		case 'checklocation':
		$location1 =$_POST['location1'];
		$strsqlcat = "select * from  tbl_users where location='".$location1."' ";
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
		
		case 'checkcircle':
	    $circleloc =$_POST['circleloc'];
		$strsqlcats = "select * from  tbl_users where location='".$circleloc."' ";
		$resultcats = mysql_query($strsqlcats);
		if(mysql_num_rows($resultcats)>=1)
		{
			echo "1";
		}
		else
		{
			echo "0";
		}
		break;
		
}
		
		
	
	