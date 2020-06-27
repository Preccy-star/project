<?php

	//connecting to database
	$con = mysqli_connect('localhost','root','', 'activecitizen');
		if(!$con){
			echo "Connection lost" . mysqli_error($con);
		}

?>