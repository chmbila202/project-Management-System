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
font-size: 16px;"> <a href="logout.php?id=<?php $row['id']; ?>" class="btn btn-danger square-btn-adjust">Logout</a> </div>
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
                        <a href="add_proposal.php"><i class="fa fa-briefcase fa-3x"></i>Add Proposal</a>
                    </li>
                        
                    <li>
                        <a class="active-menu"  href="chk_proposal.php"><i class="fa fa-briefcase fa-3x"></i>Check Proposal</a>
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
                 <?php
				
		if($row['role'] == 'Focal Person'){
			$college = $row['college'];
			$sql = "SELECT * FROM proposal WHERE college ='$college';";
			$sql = mysql_query($sql);
			if(!$sql){
	echo mysql_error();
	}
	else{
		while($array=mysql_fetch_array($sql)){
				 
				 ?>
              <div class="jumbotron">
              <h2><?php echo $array['p_title'];  ?></h2>
              Submitted By : <b><?php echo $array['name']; ?></b>
              <span class="pull-right">College Name : <b><?php echo $array['college'];?></b></span>
              <br />
              <span class="pull-left">Registration No. : <b><?php echo $array['reg'];?></b></span>
              <span class="pull-right">Email : <b><?php echo $array['email'];?></b></span>
              <br />
              <h3>Project Description :</h3>
              <p><?php echo $array['p_des']; ?></p>
              <a href="<?php echo $array['attachment']; ?>" class="btn btn-danger" >Open Proposal</a>
            <br />
             <?php
			  if($array['status'] == 'Accepted' || $array['status'] == 'Rejected'){
			  ?>
              <h2>Your Project is <?php echo $array['status']; ?></h2>
              <?php
		}
		
			  ?>
              </div>  
			  <?php 
		}
	
	}
		}
		if($row['role'] != 'Focal Person'){
			$sql = "SELECT * FROM proposal;";
			$sql = mysql_query($sql);
		while($array=mysql_fetch_array($sql)){
			
			?>
            <div class="jumbotron">
              <h2><?php echo $array['p_title'];  ?></h2>
              Submitted By : <b><?php echo $array['name']; ?></b>
              <span class="pull-right">College Name : <b><?php echo $array['college'];?></b></span>
              <br />
              <span class="pull-left">Registration No. : <b><?php echo $array['reg'];?></b></span>
              <span class="pull-right">Email : <b><?php echo $array['email'];?></b></span>
              <br />
              <h3>Project Description :</h3>
              <p><?php echo $array['p_des']; ?></p>
              <a href="<?php echo $array['attachment']; ?>" class="btn btn-danger" >Open Proposal</a>
            <br />
              <div class="btn-group pull-right">
              <?php
			  if($array['status'] == 'Accepted' || $array['status'] == 'Rejected'){
			  ?>
              <h2>Your Project is <?php echo $array['status']; ?></h2>
              <?php
		}
		else{
			  ?>
              
              <a href="approved.php?id=<?php echo $array['id']; ?>" class="btn btn-primary">Approved</a>
              <a href="rejected.php?id=<?php echo $array['id']; ?>" class="btn btn-danger">Rejected</a>
              <?php
		}
			  ?>
              </div>
              </div>
            <?php
		}
			}
		?>
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