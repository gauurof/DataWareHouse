<?php 
error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);

mysql_connect("localhost","root","root1") or die("DB geht nicht!");
		mysql_select_db("alcatas");
		mysql_set_charset("UTF8");	
?>
