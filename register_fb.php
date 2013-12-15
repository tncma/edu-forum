<?php
	include ("connection.php");
	
	if(isset($_GET['token'])){
		$tokenarr=explode("::",base64_decode($_GET['token']));
		$passcode=$tokenarr[0];
		$username=$tokenarr[1];
		$name=explode('.',$username);
		$firstname=$name[0];
		$lastname=$name[1];
	}


	if($_REQUEST['flag']=='register'){

			$sqlreg			=	"insert into registration set 	
			fname			=	'".mysql_real_escape_string($_POST['fname'])."',
			lname			=	'".mysql_real_escape_string($_POST['lname'])."',
			email			=	'".mysql_real_escape_string($_POST['email'])."',
			passcode		=	'".mysql_real_escape_string($_POST['passcode'])."',
			entry_date		=	now()";
					
			$rs				=	mysql_query($sqlreg);
			
			header('Location:welcome.php');
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login with Facebook</title>
</head>
<body>
<form action="register_fb.php?flag=register" method="post" name="signup">
        	<input type="hidden" name="passcode" value="<?php echo $passcode; ?>"/>
				<table border="0" width="550" cellspacing="3" cellpadding="3">
					<tr>
						<td width="150">First Name</td>
						<td>
        	<input type="text" name="fname" value="<?php echo $firstname; ?>" style="width:300px;" /></td>
					</tr>
					<tr>
						<td width="150">Last Name</td>
						<td>
            <input type="text" name="lname" value="<?php echo $lastname; ?>" style="width:300px;" /></td>
					</tr>
					<tr>
						<td width="150">Email</td>
						<td><input type="text" name="email" id="email" value="" style="width:300px;" /></td>
					</tr>
					<tr>
						<td width="150">&nbsp;</td>
						<td><input type="submit" value="Submit" name="B1"></td>
					</tr>
				</table>
        </form>
</body>
</html>