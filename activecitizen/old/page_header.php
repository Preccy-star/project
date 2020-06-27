<!DOCTYPE html>
<html>
<head>
	<title>Active Citizen</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
  	<script type="text/javascript" src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
	<!-- <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script> -->
	
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/contact.css">
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
  		<div class="container-fluid">
    		<div class="navbar-header">
      			<a class="navbar-brand" href="index.php">ActiveCitizen</a>
    		</div>
    		<ul class="nav navbar-nav">
		      <!-- <li><a href="survey.php">Survey</a></li>
		      <li><a href="login.php">Admin</a></li> -->
		      <li><a href="about.php">About</a></li>
		      <li><a href="contact.php">Contact</a></li>
    		</ul>

    		<ul class="nav navbar-nav navbar-right">
	    		<?php 
	    			if(isset($_SESSION["isuserlogin"])):
	    		?>
	    	 	<li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Log Out</a></li>
			      
				<?php endif?>

				<?php 
	    			if(!isset($_SESSION["isuserlogin"])):
	    		?>
	    	 	<li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Register</a></li>
			    <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li> 
				<?php endif?>

			
		    </ul>
  		</div>
	</nav>