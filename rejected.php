<?php
include"connection.php";
$id = $_GET['id'];
$accepted = "Rejected";
$sql = "UPDATE proposal SET status='$accepted' WHERE id = '$id';";
$sql = mysql_query($sql);
if($sql){
	header('location:chk_proposal.php');
	}
?>