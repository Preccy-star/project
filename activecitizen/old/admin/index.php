<?php
	session_start();

	if($_SESSION["isuserlogin"] == "YES"){
	    
	    if($_SESSION["permission"] == "USER"){
	    	header("Location: ../survey.php");
	    }

	    if($_SESSION["permission"] == "SUPER ADMIN"){
	    	header("Location: ../super_admin/index.php");
	    }
	}

	if(!isset($_SESSION["isuserlogin"])){
		header("Location: ../login.php");
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
</head>
<body>
	<h1>Welcome <?php echo $_SESSION["organization"]; ?></h1>

	<!-- Note: there should be logout in dashboard -->
</body>
</html>