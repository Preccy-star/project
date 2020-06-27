<!DOCTYPE HTML>
<html lang="en">
<head>
	<title>ActiveCitizen</title>
	<link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">


	<!-- Font -->

	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">


	<!-- Stylesheets -->

	<link href="common-css/bootstrap.css" rel="stylesheet">

	<link href="common-css/ionicons.css" rel="stylesheet">


	<link href="layout-1/css/styles.css" rel="stylesheet">

	<link href="layout-1/css/responsive.css" rel="stylesheet">

</head>
<body >

	<header>
		<div class="container-fluid position-relative no-side-padding nav-style1">

			<a href="#" class="logo"><img src="images/logo1.png" alt="Logo Image"></a>

			<div class="menu-nav-icon" data-nav-menu="#main-menu"><i class="ion-navicon"></i></div>

			<ul class="main-menu visible-on-click" id="main-menu">
				<li><a href="index.php">Home</a></li>
				<li><a href="organizations.php">Take a Survey</a></li>
				<li><a href="about.php">About</a></li>
				<li><a href="contact.php">Contact</a></li>
			</ul><!-- main-menu -->

			<div class="src-area nav-style2">
				<!-- <form>
					<button class="src-btn" type="submit"><i class="ion-ios-search-strong"></i></button>
					<input class="src-input" type="text" placeholder="Type of search">
				</form> -->
				

			   <!--  <ul> -->
	    		<?php 
	    			if(isset($_SESSION["isuserlogin"])):
	    		?>
	    	 	<li style="margin-top: 20px;"><a href="logout.php"><span class="glyphicon glyphicon-log-out">Log Out</span> </a></li>
			      
				<?php endif?>

				<?php 
	    			if(!isset($_SESSION["isuserlogin"])):
	    		?>
	    	 	<li style="margin-top: 20px; padding-right: 15px;"><a href="register.php"><span class="glyphicon glyphicon-user">Register</span> </a></li>

			    <li style="margin-top: 20px;"><a href="login.php"><span class="glyphicon glyphicon-log-in">Login</span> </a></li> 
				<?php endif?>
		
		   <!--  </ul> -->
			</div>

		</div><!-- conatiner -->
	</header>