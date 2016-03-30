<?php 
error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);

mysql_connect("localhost","root","MetalForce81") or die("DB geht nicht!");
		mysql_select_db("datawarehouse");
		mysql_set_charset("UTF8");	
?>
