<?php
	session_start();

	// removes all session variables
	session_unset(); 

	// destroys the session 
	session_destroy();

	header("Location: ../login.php");
?>