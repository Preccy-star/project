<?php
	include '../connect.php';
	include 'registration_validation.php';
?>

<?php
	include "sadmin_page_header.php";
?>
	<div class="container" id="form-body2">
  		<form role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST"> <!-- role="form" helps improve accessibility for people using screen readers -->
	  		<div class="form-group"> <!-- class="form-group" is used to wrap labels for optimum spacing -->
	      		<label class="control-label" for="fname">First Name:</label>
	        	<input type="text" class="form-control" name="fname" placeholder="Enter First Name" value="<?php echo $fname; ?>"> <!-- class="form-control" gives tags like <input>, <textarea>, and <select> a width of 100%. -->
	        	<span class="error"><?php if($fname_error!=""){echo $fname_error;} ?></span>
	    	</div>

	    	<div class="form-group">
	      		<label class="control-label" for="lname">Last Name:</label>
	        	<input type="text" class="form-control" name="lname" placeholder="Enter Last Name" value="<?php echo $lname; ?>"> 
	        	<span class="error"><?php if($lname_error!=""){echo $lname_error;} ?></span>
	    	</div>

	    	<div class="form-group">
	      		<label class="control-label" for="organization_name">Organization Name:</label>
	        	<input type="text" class="form-control" name="orgName" placeholder="Enter Organization Name" value="<?php echo $org_name; ?>">
	        	<span class="error"><?php if($org_name_error!=""){echo $org_name_error;} ?></span>
	    	</div>

	    	<div class="form-group">
	      		<label class="control-label" for="email">Organisation Email:</label>
	        	<input type="text" class="form-control" name="email" placeholder="Enter Organisation Email" value="<?php echo $org_email; ?>">
	        	<span class="error"><?php if($org_email_error!=""){echo $org_email_error;} ?></span>
	    	</div>

    		<div class="form-group">
	      		<label class="control-label" for="pwd">Password:</label>          
	        	<input type="password" class="form-control" name="pwd" placeholder="Enter Password">
	        	<span class="error"><?php if($password_error!=""){echo $password_error;} ?></span>
	    	</div>

    		<div class="form-group">
	      		<label class="control-label" for="Permission">Permission:</label>          
	        	<select name="permission">
	        		<option>ADMIN</option>
	        		<option>SUPER ADMIN</option>
	        	</select>
	        	<span class="error"><?php if($permission_error!=""){echo $permission_error;} ?></span>
	    	</div>

	    	<div class="form-group">        
	        	<button type="submit" name="register" class="btn btn-default">REGISTER</button>
	    	</div>
    		
  		</form>
	</div>


<?php
	include "sadmin_page_footer.php";
?>

<?php

	// if(isset($_POST ["register"])){
	// 	$firstName = $_POST["fname"];
	// 	$lastName = $_POST["lname"];
	// 	$orgName = $_POST["orgName"];
	// 	$email = $_POST["email"];
	// 	$password = $_POST["pwd"];
	// 	$role = $_POST["role"];
	// 	$userID = $_POST["userID"];

			
		//executing a query
		// $query1 = "SELECT * FROM registration WHERE user_id = '$userID' ";
		// $result1 = mysqli_query($con, $query1);
		// $counter = mysqli_num_rows($result1); //it counts how many times an ID appears in the database table

		// if($counter == 1){
		// 	echo "<script type='text/Javascript'>";
		// 	echo "alert('User ID Already Exists!')";
		// 	echo "</script>";
		// }
		// else{
			//executing another query
		// 	$query2 = "INSERT INTO registration (user_id, first_name, last_name, org_name, email, password, role) VALUES ('$userID', '$firstName', '$lastName', '$orgName', '$email', '$password', '$role')";
		// 	$result2 = mysqli_query($con, $query2);
		// 	if($result2){
		// 		echo "<script type='text/Javascript'>";
		// 		echo "alert('Registration Successful')";
		// 		echo "</script>";
		// 	}
		// 	else{
		// 		echo "<script type='text/Javascript'>";
		// 		echo "alert('Registration Unsuccessful')";
		// 		echo "</script>";
		// 	}	
		// }		
	// }

				//echo phpinfo();
?>