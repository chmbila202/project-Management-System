<?php
require_once"connection.php";
session_start();
?>
<?php
if(isset($_SESSION['id'])){
$id = $_SESSION['id'];
$sql = "SELECT * FROM user WHERE id = '$id';";
$sql = mysql_query($sql);
if(!$sql){
	echo mysql_error();
	}
	else{
		$row=mysql_fetch_array($sql)
			?>
            
            
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html"><?php $row['name']; ?></a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"><a href="logout.php?id=<?php echo $row['id']; ?>" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="<?php echo $row['img']; ?>" class="user-image img-responsive"/>
					</li>
				
					
                    				
					
					                   
                <li  >
                        <a  href="main.php"><i class="fa fa-user fa-3x"></i> Profile</a>
                    </li>
                    <?php
					if($row['role'] == 'Head' ){
					?>
                    <li>
                        <a href="add.php"><i class="fa fa-users fa-3x"></i>Add User</a>
                    </li>
                    <li>
                        <a href="chk_proposal.php"><i class="fa fa-briefcase fa-3x"></i>Check Proposal</a>
                    </li>
                    
                    <li>
                        <a href="timer.php"><i class="fa fa-times-circle-o fa-3x"></i>Set Time</a>
                    </li>
                    <?php
					}
					else if($row['role'] == 'Focal Person' ){
						?>
                 
                            <li>
                        <a  class="active-menu"  href="add_proposal.php"><i class="fa fa-briefcase fa-3x"></i>Add Proposal</a>
                    </li>
                        
                    <li>
                        <a href="chk_proposal.php"><i class="fa fa-briefcase fa-3x"></i>Check Proposal</a>
                    </li>
                    <li>
                        <a href="timer.php"><i class="fa fa-times-circle-o fa-3x"></i>Check Late Date</a>
                    </li>
                    
                        <?php
						}
				
					?>
                    <li>
                        <a href="chh.php"><i class="fa-mail-reply-all"></i>Chat</a>
                    </li>
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Profile</h2>   
                        <h5>Welcome <?php echo $row['name']; ?> , Love to see you back. </h5>
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
                  <div class="form">
<form method="post" action="" enctype="multipart/form-data">


<div class="form-group">
<input type="hidden" name="role" value="Student" />
</div>
<div class="form-group">
<input type="text" name="p_title" class="form-control" placeholder="Enter Project Title"/>
</div>
<div class="form-group">
<textarea name="p_des" style="resize:none" placeholder="Enter Project Description" class="form-control"></textarea>
</div>
<?php
$sql = "SELECT * FROM user WHERE id = '$id';";
$sql = mysql_query($sql);
if(!$sql){
	echo mysql_error();
	}
	else{
		$row=mysql_fetch_array($sql)
			?>

<div class="form-group">

<input type="hidden" name="name" value="<?php echo $row['name'];?>"/>
<input type="hidden" name="reg" value="<?php echo $row['reg'];?>" />

<input type="hidden" name="email" value="<?php echo $row['email'];?>"/>
<input type="hidden" name="college" value="<?php echo $row['college'];?>" />
</div>

<?php
	}
?>
<div class="form-group">
<input type="file" class="form-control" name="image" required/>
</div>

<input type="submit" name="btn_sub" class="btn btn-success pull-right" />
</form>
<?php
if(isset($_POST['btn_sub'])){
	$name = $_POST['name'];
	$p_title = $_POST['p_title'];
	$des = $_POST['p_des'];
		$email = $_POST['email'];
				$reg = $_POST['reg'];
					$role = $_POST['role'];
					$college = $_POST['college'];
	$folder = 'uploads/projects/';
	$path = $_FILES['image']['name'];
	$cpath = $folder.$path;
	move_uploaded_file($_FILES['image']['tmp_name'],$cpath);
	$sql = "INSERT INTO proposal(name,email,reg,role,college,attachment,p_title,p_des)VALUES('$name','$email','$reg','$role','$college','$cpath','$p_title','$des');";
	$sql = mysql_query($sql);
	if(!$sql){
		echo mysql_error();
		}
		else{
			?>
            <script>
			alert('Proposal Has Been Inserted');
            </script>
            <?php
			}
	}
?>
</div>
               
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
<footer>
        <h4 align="center">&copy; Copyright 2018, Muhammad Bilal Sadiq<h4>
</footer>
</html>
<?php
			}
		}

?>