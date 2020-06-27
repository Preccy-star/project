<?php
	//defining variables and setting them to empty string
	$fname_error = $lname_error = $org_id_error = $org_email_error = $permission_error = $password_error ="";

	$fname = $lname = $org_id = $org_email = $permission = $password = $password1 = "";
	$err_status="Allowed";
	//validation
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		if(empty($_POST["fname"])){
			$fname_error = "First name is required";
			$err_status="Not Allowed";
		}else{
			$fname = test_input($_POST["fname"]);
			//check if name only contains letters and whitespaces
			if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {
  				$fname_error = "Only letters and white space allowed";
  				$err_status="Not Allowed";
			}
		}

		if(empty($_POST["lname"])){
			$lname_error = "Last name is required";
			$err_status="Not Allowed";
		}else{
			$lname = test_input($_POST["lname"]);
			//check if name only contains letters and whitespaces
			if (!preg_match("/^[a-zA-Z ]*$/",$lname)) {
  				$lname_error = "Only letters and white space allowed";
  				$err_status="Not Allowed";
			}
		}

		if(empty($_POST["org_id"])){
			$org_id_error = "Organization id is required";
			$err_status="Not Allowed";
		}else{
				$org_id = $_POST["org_id"];
			// $org_name = test_input($_POST["orgName"]);
			//check if name only contains letters and whitespaces
			// if (!preg_match("/^[a-zA-Z ]*$/",$org_name)) {
  	// 			$org_name_error = "Only letters and white space allowed";
  	// 			$err_status="Not Allowed";
			// }
		}

		if (empty($_POST["email"])) {
    		$org_email_error = "Organization email is required";
    		$err_status="Not Allowed";
  		} else {
    		$org_email = test_input($_POST["email"]);
    		$err_status="Allowed";
    		//check if email is well formed
    		if (!filter_var($org_email, FILTER_VALIDATE_EMAIL)) {
    			$err_status="Not Allowed";
  				$org_email_error = "Invalid email format";
  				
			}

			$query1 = "SELECT * FROM users WHERE email = '$org_email' ";
		    $result1 = mysqli_query($con, $query1);
		    $counter = mysqli_num_rows($result1); //it counts how many times an ID appears in the database table
		    if($counter>0){
		     	$email_error = "Email already exists!";
		       	$err_status="on";
		    }
  		}

  		if(empty($_POST["permission"])){
			$permission_error = "Permission is required";
			$err_status="Not Allowed";
		}else{
			$permission = test_input($_POST["permission"]);
		}

		if(isset($_POST["pwd"])){
	    	$password1 = $_POST["pwd"];
	    	$password = $_POST["pwd"];
	    	$password = md5($password1);
		    if(strlen($password) < 8){
		    	$err_status="Not Allowed";
		        $password_error = "Password should have at least 8 characters";
		      
		    }
  
	    	if(!preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#", $password )){
	        	$err_status="Not Allowed";
	        	$password_error = "Password should contain numbers, letters(lower and upper case), special characters and must be between 8 to 20 characters";
	      	}
    	}else{
	      $password_error = "Password is required";
	      $err_status="Not Allowed";
	    }

	    // if(isset($_POST["pwd2"])){
	    //   $password2 = $_POST["pwd2"];
	    //   if($password1 != $password2){
	    //     $err_status="on";
	    //     $password2_error = "Password does not match";
	      
	    //   }
	    // }


		if($err_status!="Not Allowed"){

	      //removing sql injections
	      $fname = mysqli_real_escape_string($con, $fname);
	      $lname = mysqli_real_escape_string($con, $lname);
	      // $org_name = mysqli_real_escape_string($con, $org_name);
	      $email = mysqli_real_escape_string($con, $email);
			//executing another query
			$query2 = "INSERT INTO users (fname, lname, email, permission, org_id, password) VALUES ('$fname', '$lname', '$org_email', '$permission', '$org_id','$password')";
			$result2 = mysqli_query($con, $query2);
			if($result2){
				header("Location: reg_inst_success.php");
			}
			else{
				die('Error: ' . mysqli_error($con));
			}	
		}		
	}
	


	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
?>