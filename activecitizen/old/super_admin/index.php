<?php
	session_start();

	if($_SESSION["isuserlogin"] == "YES"){
	    
	    if($_SESSION["permission"] == "USER"){
	    	header("Location: ../survey.php");
	    }

	    if($_SESSION["permission"] == "ADMIN"){
	    	header("Location: ../admin/index.php");
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
	<h1>Welcome</h1>

	<!-- Note: there should be logout in dashboard -->
</body>
</html>