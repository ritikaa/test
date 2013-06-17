<?php 
include("../config/db.php");
if($_POST['sendmail']!= '') {	
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
		mysql_query("update admin set password='$newpas' where admin_id='".$fetch_detail['admin_id']."'");
		//include("forgot_mail.php");
				$to = $email;
$message = '
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
			';
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
           echo      $msg = "Your new password has been sent to your email please check your email!";
					//header("location:contactus.php");
					//exit;
				}

		} else {
		    echo $msg = "Soory invalid your email id try again!";
		} //end of num rows
	} // end of if($_POST[])
?>