<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<style>body{padding-top: 60px;}</style>
	
    <link href="bootstrap3/css/bootstrap.css" rel="stylesheet" />
 
	<link href="assets/css/login-register.css" rel="stylesheet" />
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
	
	<script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/js/login-register.js" type="text/javascript"></script>

</head>
<body>
<div class="container">

</div>

<div class="col-sm-4"></div>
<div class="col-sm-4">
<div class="jumbotron">
<h2>Project management system </h2>
<h4>Login :</h4>
<div class="form">
<form method="post" action="" enctype="multipart/form-data">
<div class="form-group">
<input type="email" class="form-control" placeholder="Enter Your Email" name="email" />
</div>
<div class="form-group">
<input type="password" class="form-control" name="pass" placeholder="Enter Your Password" />
</div>
<input type="submit" name="btn_sub" class="btn btn-success pull-right" />
</form>
<footer>
        <small>&copy; Copyright 2018, Muhammad Bilal Sadiq</small>
</footer>
</div>
</div>
</div>
<div class="col-sm-4"></div>

</div>


</body>

</html>
<?php
include "connection.php";
if(isset($_POST['btn_sub'])){
$em = $_POST['email'];
$pass = $_POST['pass'];
$sql = "SELECT * FROM user WHERE email = '$em' AND pass  = '$pass';";
$sql = mysql_query($sql);
if(!$sql){
	echo mysql_error();
	}
	else{
		$row = mysql_fetch_array($sql);
		if($row['email'] == $em && $row['pass'] == $pass){
		$_SESSION['id']=$row['id'];
		
		header('location:main.php');
		}
		else{
			?>
            <script>
			alert('Your username and email is invalid');
            </script>
            <?php
			}
		}
}
?>