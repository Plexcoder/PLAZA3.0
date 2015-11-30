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
			<title>Partner care grade system Welcome</title>
			<link rel="stylesheet" href="style.css" type="text/css" />
		</head>
		<body>
			<div id="header">
			  <div id="left">
				<label>grade assessment exchange</label>
			  </div>
			  <div id="right">
				<div id="content">
				  <?php
				/* This sets the time format to 24 hour */
				$time = date("H");
				/* Set timezone */
				$timezone = date("e");
				/* if is less then, or equal to 12:00*/
				if ($time < "12") {
					echo "Good morning";
				} else
				/* If it is less then, or equal to 12:00 o'clock and before 17:00 o'clock */
				if ($time >= "12" && $time < "18") {
					echo "Good afternoon";
				} else
				/* If it is less then, or equal to 18:00 o'clock and before 00:00 o'clock */
				if ($time >= "18" && $time < "0") {
					echo "Good evening";
				} else
				/* And if it is later than, or equal to 00:00 midnight */
				if ($time >= "0") {
					echo "Good night";
				}
				?>
				  <?php echo $userRow['gender']; ?>. <?php echo $userRow['surname']; ?>, you are currently logged in as <?php echo $userRow['role'];?> <a href="logout.php?logout">Sign Out</a> </div>
			  </div>
			</div>
			<div id="main">
			<div id="clearfix">
			</div>
			<div id="content">
			<?php 
			while ($data = mysql_fetch_assoc($result)){
				echo "<a href='detail.php?user_id=" . $data['user_id'] . "'>" ; 
				echo "name: ". $data['name'] ." ".$data['surname'] . "";
				echo "<br/>";
				}

			?>
			<a href="detail.php">details</a>
			</div>
			<div id="DateTime"> 
			<a><?php echo date('l jS \of F Y h:i:s A');?></a>
			</div>
			</div>

		</body>
	</html>