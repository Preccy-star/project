<?php
  session_start();
  include 'connect.php'; 
?>

<?php 
  $key = "";

  if(isset($_GET["ver_key"])){
    $key = $_GET["ver_key"];
  }

	$new_password = $password = " ";
	$new_password_error = "";
	$err_status = "off";
 
	if(isset($_POST["submit"])){
		if(empty($_POST["pwd"])){
      $new_password_error = "Password is required";
      $err_status="on";
    }else{
      $new_password = $_POST["pwd"];
      $password = $_POST["pwd"];
      // if(strlen($password) < 8){
      // $err_status="on";
      // $password_error = "Password should have at least 8 characters";
      // }
      if(!preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#", $new_password )){
        $err_status="on";
        $new_password_error = "Password should contain numbers, letters(lower and upper case), special characters and must be between 8 to 20 characters";
      }
      $new_password = md5($password);
    } 

    $key = $_POST["ver_key"];

    if($err_status == "off"){
      $query = "UPDATE users SET password = '$new_password' WHERE ver_key = '$key' ";
      $result = mysqli_query($con, $query);
      if($result){
        header("Location: password_changed_success.php");
      }else{
        die('Error: ' . mysqli_error($con));
      }
    }
	}
?>


<?php
  include "page_header.php";
?>

<section class="blog-area section">
	<div class="container form-container">
		<div class="row" >

      <div class="container">
		    <form role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
			     <div class="form-group">
      		  <label class="control-label" for="pwd">Input New Password:</label> 
            <span class="error"><?php if($new_password_error!=""){echo $new_password_error;} ?></span>  <input type="password" class="form-control" name="pwd" placeholder="Enter New Password">
          </div>

          <div class="form-group">
             <input type="hidden" class="form-control" name="ver_key" value="<?php $key; ?>">
          </div>

    		  <div class="form-group">        
        		<button type="submit" name="submit" class="btn btn-default">SEND</button>
    		  </div>
		    </form>
      </div>

		</div><!-- row -->
		
	</div><!-- container -->
</section><!-- section -->


</body>
</html>