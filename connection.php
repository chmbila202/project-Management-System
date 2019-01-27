<?php
$sql = mysql_connect("localhost","root","");
$sql = mysql_select_db("affiliated",$sql);
if(!$sql){
	echo mysql_error();
	}
?>