<?php 
	session_start();
	include "../connect.php";
?>


<?php
	
	$old_password_error = $new_password_error = "";
	$old_password = $new_password = $password = "";
	$err_status="off";

	if($_SERVER["REQUEST_METHOD"] == "POST"){
		if(empty($_POST["old_pwd"])){
      		$old_password_error = "Previous password is required";
      		$err_status="on";
    	}else{
      		$old_password = $_POST["old_pwd"];

      		$old_password = md5($old_password);
      		$query1 = "SELECT * FROM users WHERE password = '$old_password' ";
      		$result1 = mysqli_query($con, $query1);
      		$counter = mysqli_num_rows($result1); //it counts how many times an password appears in the database table
      		if($counter==0){
        		$old_password_error = "Password does not exist";
        		$err_status="on";
      		}  
  		}

  		if(empty($_POST["new_pwd"])){
      		$new_password_error = "New password is required";
      		$err_status="on";
    	}else{
    		$id = $_SESSION["userID"];
    		$new_password = $_POST["new_pwd"];
	    	$password = $_POST["new_pwd"];
    		$new_password = md5($password);
    		$query = "UPDATE users SET password = '$new_password' WHERE id = $id" ;
	 		$result = mysqli_query($con, $query);
			if($result){
				header("Location: ");
			}else{
				die('Error: ' . mysqli_error($con));
			}
    	}
	}

	// $id = $_GET["id"];
?>



<?php
	include "sadmin_page_header.php";
?>

<div class="container">
	<form role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
		<div class="form-group">
		   	<label class="control-label" for="old_pwd">Old Password:</label>          
		    <input type="password" class="form-control" name="old_pwd" placeholder="Enter Old Password">
		    <span class="error"><?php if($old_password_error!=""){echo $old_password_error;} ?></span>
		</div>

		<div class="form-group">
		    <label class="control-label" for="new_pwd">New Password:</label>          
		    <input type="password" class="form-control" name="new_pwd" placeholder="Enter New Password">
		    <span class="error"><?php if($new_password_error!=""){echo $new_password_error;} ?></span>
		</div>

		<div class="form-group">        
		    <button type="submit" name="change_pwd" class="btn btn-default">CHANGE</button>
		</div>

		<div class="form-group">        
		    <button type="submit" name="cancel" class="btn btn-default">CANCEL</button>
		</div>

	</form>
</div>



<?php
	include "sadmin_page_footer.html";
?>