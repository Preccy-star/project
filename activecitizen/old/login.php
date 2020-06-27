<?php
  session_start();
  include 'connect.php'; 
?>
<?php
  if($_SESSION["isuserlogin"] == "YES"){
    if($_SESSION["permission"] == "USER"){
      header("Location: survey.php");
    }
    
    if($_SESSION["permission"] == "ADMIN"){
      header("Location: ../admin/index.php");
    }

    if($_SESSION["permission"] == "SUPER ADMIN"){
      header("Location: ../super_admin/index.php");
    }
  }
  
?>


<?php
  $email = $password = "";
  $email_error = $password_error = $login_error = "";
  $err_status = "off";

  if(isset($_POST["submit"])){
    // if(isset($_POST["email"])){
    //   $email = test_input($_POST["email"]);
    //   if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    //     $err_status="on";
    //     $email_error = "Invalid email format"; 
    //   }
    // }else{
    //   $err_status = "on";
    //   $email_error = "Please input your email";
    // }

    if(empty($_POST["email"])){
      $email_error = "Email is required";
      $err_status="on";
    }else{
      $email = test_input($_POST["email"]);
      //check if email is well formed
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $err_status="on";
        $email_error = "Invalid email format"; 
      }
    }


    if(empty($_POST["pwd"])){
      $password_error = "Password is required";
      $err_status="on";
    }else{
      $password = $_POST["pwd"];
      $password = md5($password);
    }


    // if(isset($_POST["pwd"])){
    //   $password = $_POST["pwd"];
    //   $password = md5($password);
    // }else{
    //   $err_status = "on";
    //   $password_error = "Please input your password";
    // }

    if($err_status == "off"){
      $email = mysqli_real_escape_string($con, $email);

      $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
      $result = mysqli_query($con, $query);
      if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        $_SESSION["userID"] = $row["id"];
        $_SESSION["isuserlogin"] = "YES";
        $_SESSION["permission"] = $row["permission"];
        if($_SESSION["permission"] == "USER"){
          header("Location: survey.php");
        }elseif($_SESSION["permission"] == "ADMIN"){
          header("Location: admin/index.php");
        }elseif($_SESSION["permission"] == "SUPER ADMIN"){
          header("Location: super_admin/index.php");
        }else{
          header("Location: 404.php");
        }
      }else{
        // die('Error: ' . mysqli_error($con));
        $login_error = "Email or Password is incorrect";
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
  include 'page_header.php';
?>

	<div class="container" id="form-body1">
      <span class="error"><?php if($login_error!=""){echo $login_error;} ?></span>
  		<form role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST"> <!-- role="form" helps improve accessibility for people using screen readers -->
    		<div class="form-group"> <!-- class="form-group" is used to wrap labels for optimum spacing -->
      			<label class="control-label" for="email">Email:</label> 
            <span class="error"><?php if($email_error!=""){echo $email_error;} ?></span>
        		<input type="email" class="form-control" name="email" class="placeholder-color" placeholder="Enter Email Address" value="<?php echo $email; ?>"> <!-- class="form-control" gives tags like <input>, <textarea>, and <select> a width of 100%. -->
    		</div>

    		<div class="form-group">
      			<label class="control-label" for="pwd">Password:</label> 
            <span class="error"><?php if($password_error!=""){echo $password_error;} ?></span>         
        		<input type="password" class="form-control" name="pwd" placeholder="Enter Password" class="placeholder-color">
    		</div>
        <br>

    		<div class="form-group">        
        		<button type="submit" name="submit" class="btn btn-default">LOGIN</button>
    		</div>

        <br>
    		<div class="form-group">
    			<a href="forgot_password.php">Forgot Password?</a>
    		</div>
  		</form>
	</div>


<?php
  include 'page_footer.html'
?>
