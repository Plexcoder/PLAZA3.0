<?php
if(!mysql_connect("localhost","spaters_plaza","SIafwivlo"))
{
	die('HURRRR!! ERROR!!! --> '.mysql_error());
}
if(!mysql_select_db("spaters_plaza"))
{
	die('HURRR!! DB ERROR!!! --> '.mysql_error());
}

?>