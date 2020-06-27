<?php
	session_start();

	if(isset($_SESSION['Role'])){
		if($_SESSION['Role'] != "ECG Admin"){
			header("Location: admin.php");
		}
	}
	
	else{
		header("Location: login.php");
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
</head>
<body>
	<h1> Welcome <?php echo $_SESSION['User']; ?> </h1>
</body>
</html>