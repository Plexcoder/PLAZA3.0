<?php
session_start();
if(isset($_SESSION['user'])!="")
{
	header("Location: home.php");
}
include_once 'dbconnect.php';

if(isset($_POST['btn-signup']))
{
	$name  = mysql_real_escape_string($_POST['name']);
	$sname = mysql_real_escape_string($_POST['sname']);
	$uname = mysql_real_escape_string($_POST['uname']);
	$email = mysql_real_escape_string($_POST['email']);
	$upass = md5(mysql_real_escape_string($_POST['upass']));
	$role  = mysql_real_escape_string($_POST['role']);
	$gend  = mysql_real_escape_string($_POST['gend']);
	
	
	if(mysql_query("INSERT INTO members(name,surname,username,email,password,role,gender) VALUES('$name','$sname','$uname','$email','$upass','$role','$gend')"))
	{
		echo "successfully registered";

	}
	else
	{
		?>
<script>alert('error while registering you...');</script>
<?php
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<title>Plaza 3.0</title>
			<link rel="stylesheet" href="style.css" type="text/css" />
		</head>
	<body>
	<center>
	  <div id="login-form">
		<form method="post">
		  <table align="center" width="100%" border="0">
			 <tr>
			  <td><input type="text" name="name" placeholder="Name" required /></td>
			</tr>
			 <tr>
			  <td><input type="text" name="sname" placeholder="Surname" required /></td>
			</tr>
			<tr>
			  <td><input type="text" name="uname" placeholder="User Name" required /></td>
			</tr>
			<tr>
			  <td><input type="email" name="email" placeholder="Your Email" required /></td>
			</tr>
			<tr>
			  <td><input type="password" name="upass" placeholder="Your Password" required /></td>
			</tr>
			<td>
				<select name="role">
				 <option value="select">Please select</option>
				 <option value="teacher">Teacher</option>
				 <option value="student">Student</option>
				</select></td>
			</tr>
			<td>
				<select name="gender">
				 <option value="select">Please select</option>
				 <option value="mr">Male</option>
				 <option value="mrs">Female</option>
				</select></td>
			</tr>
			<tr>
			  <td><button type="submit" name="btn-signup">Register right fucking now</button></td>
			</tr>
			<tr>
			  <td><a href="index.php">Already have an account?</a></td>
			</tr>
		  </table>
		</form>
	  </div>
	</center>
	</body>
	</html>