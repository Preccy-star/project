<?php 
	session_start();
	include "../connect.php";
?>

<?php
	$id = $_GET["id"];

	$query = "UPDATE users SET status = 'DEACTIVE' WHERE id = $id" ;
	$result = mysqli_query($con, $query);
		if($result){
			header("Location: update_success.html");
		}else{
			die('Error: ' . mysqli_error($con));
		}
?>