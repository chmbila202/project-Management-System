<?php
include"connection.php";
$id = $_GET['id'];
$sql = "SELECT * FROM chat WHERE id = '$id'";
	$sql = mysql_query($sql);
	
	if(!$sql){
		echo mysql_error();
	}
	
		else{
			while($array = mysql_fetch_array($sql)){
				?>
                <li><?php echo $array['msg']; ?></li>
                <?php
				
				}
		}

?>