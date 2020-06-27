<?php 
	session_start();
	include "connect.php";
?>

<?php
	$inst_name = $description = $inst_prefix = "";
   	$inst_name_error = $inst_prefix_error = $description_error = "";
   	$err_status = "off";

   	if(isset($_POST["submit"])){
   		if(empty($_POST["inst_name"])){
	      $inst_name_error = "Institution name is required";
	      $err_status="on";
	    }else{
	      $inst_name = test_input($_POST["inst_name"]);
	      //check if name only contains letters and whitespaces
	      if (!preg_match("/^[a-zA-Z ]*$/",$inst_name)) {
	          $inst_name_error = "Only letters and white space allowed";
	          $err_status="on";
	      }

	      $query1 = "SELECT * FROM institutions WHERE institution_name = '$inst_name' ";
	      $result = mysqli_query($con, $query1);
	      $counter = mysqli_num_rows($result); //it counts how many times an inst_name appears in the database table
	      if($counter>0){
	        $inst_name_error = "Institution already exists!";
	        $err_status="on";
	      }
    	}

    	if(empty($_POST["inst_prefix"])){
	      	$inst_prefix_error = "Institution prefix is required";
	      	$err_status="on";
	    }else{
	      	$inst_prefix = test_input($_POST["inst_prefix"]);
	      	//check if name only contains letters and whitespaces
	      	if (!preg_match("/^[a-zA-Z ]*$/",$inst_prefix)) {
	        	$inst_prefix_error = "Only letters and white space allowed";
	        	$err_status="on";
	        }else{
	        	$chars = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    	  		$key = substr(str_shuffle($chars), 0, 4);
    	  		$inst_prefix = $inst_prefix . "-" . $key;
	      	}
	     }

    	if(empty($_POST["description"])){
	      $description_error = "Description is required";
	      $err_status="on";
	    }else{
	      $description = test_input($_POST["description"]);
	    }

	   


	    if($err_status == "off"){
	    	$inst_name = mysqli_real_escape_string($con, $inst_name);

	    	$query = "INSERT INTO institutions (institution_name, description, org_prefix) VALUES ('$inst_name', '$description', '$inst_prefix')";
      		if(!mysqli_query($con, $query)){
        		die('Error: ' . mysqli_error($con));
      		}else{
      			header("Location: add_org_success.html");
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

<?php
	include 'sadmin_page_header.php';
?>

	<div class="container form_style">
		<form role="form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<div class="form-group">
				<label class="control-label" for="inst_name">Institution Name:</label> 
				<span class="error"><?php if($inst_name_error!=""){echo $inst_name_error;} ?></span>        
				<input class="form-control" type="text" name="inst_name" placeholder="Enter institution name">
			</div>

			<div class="form-group">
				<label class="control-label" for="inst_prefix">Institution Prefix:</label> 
				<span class="error"><?php if($inst_name_error!=""){echo $inst_name_error;} ?></span>        
				<input class="form-control" type="text" name="inst_prefix" placeholder="Enter Prefix">
			</div>

			<div class="form-group">
				<label class="control-label" for="description">Description:</label>
				<span class="error"><?php if($description_error!=""){echo $description_error;} ?></span>      
				<input class="form-control" type="text" name="description" placeholder="Enter description for the organization">
			</div>

			
			<div class="form-group">        
        		<button type="submit" name="submit" value="submit" class="btn btn-default">SEND</button>
    		</div>
		</form>
	</div>

<?php
	include 'sadmin_page_footer.php';
?>