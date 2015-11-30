<?php 
session_start();
include_once 'dbconnect.php';

if(!isset($_SESSION['user']))
{
	header("Location: index.php");
}
$res=mysql_query("SELECT * FROM members WHERE user_id=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);

$result = mysql_query("SELECT * FROM members");


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<title>Plaza 3.0</title>
			<link rel="stylesheet" href="style.css" type="text/css" />
		</head>
	
		<body>
			<div id="header">
			  <div id="left">
				<label>Plaza 3.0</label>
			  </div>
			  <div id="right">
				<div id="content"> <?php echo $userRow['gender']; ?>. <?php echo $userRow['surname']; ?>, you are currently logged in as <?php echo $userRow['role'];?> <a href="logout.php?logout">Sign Out</a> </div>
			  </div>
			</div>
			<div id="main">
			<div id="clearfix"> </div>
			<div id="content">
			  <?php
			mysql_connect("localhost","grades","root");
			mysql_select_db("grades");

			$result = mysql_query("SELECT * FROM members WHERE user_id = '". $_GET['user_id'] . "'");
			while($data = mysql_fetch_assoc($result)){
				echo "" . $userRow['role'] . "&nbspno.&nbsp". $data['user_id'] . "<br/>";
				echo "Name: " . $data['name'] . "<br/>";
				echo "Surname: " . $data['surname'] . "<br/>";
				
			}
			?>
			<a href="home.php">Terug naar overzicht</a>
			</div>
		</body>
	</html>