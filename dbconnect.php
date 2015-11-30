<?php
if(!mysql_connect("localhost","spaters_plaza","SIafwivlo"))
{
	die('oops connection problem ! --> '.mysql_error());
}
if(!mysql_select_db("grades"))
{
	die('oops database selection problem ! --> '.mysql_error());
}

?>