<?php
  include 'connect.php';
  session_start();
?>

<?php
	$key = $_GET["key"];
	$query = "SELECT * FROM users WHERE ver_key = '$key' AND status = 'PENDING'";
	$result = mysqli_query($con, $query);

	if(mysqli_num_rows($result) > 0){
		$row = mysqli_fetch_assoc($result);
		$query2 = "UPDATE users SET status='ACTIVE' WHERE ver_key = '$key' ";
		
		if(mysqli_query($con, $query2)){
			/*header("Location: survey.php");*/
			$_SESSION["userID"] = $row["id"];
			$_SESSION["isuserlogin"] = "YES";
			$_SESSION["permission"] = $row["permission"];
			echo "<h1>Your account has been activated. Click on this <a href='survey.php'>link</a> to take a survey</h1>";
		}else{
			die ('Error: ' . mysqli_error($con));
		}
	}
	else{
		die ('Error: ' . mysqli_error($con));
	}
?>