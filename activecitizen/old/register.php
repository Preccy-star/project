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
  
  $fname = $lname = $age = $email = $password = $password2 = $dob = $permission = $status = $org = $key = "";
  $fname_error = $lname_error = $age_error = $email_error = $password_error = $password2_error = $email_status = "";
  $err_status = "off"; 

  if(isset($_POST["submit"])){
    if(empty($_POST["fname"])){
      $fname_error = "First name is required";
      $err_status="on";
    }else{
      $fname = test_input($_POST["fname"]);
      //check if name only contains letters and whitespaces
      if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {
          $fname_error = "Only letters and white space allowed";
          $err_status="on";
      }
    }

    if(empty($_POST["lname"])){
      $lname_error = "Last name is required";
      $err_status="on";
    }else{
      $lname = test_input($_POST["lname"]);
      //check if name only contains letters and whitespaces
      if (!preg_match("/^[a-zA-Z ]*$/",$lname)) {
        $lname_error = "Only letters and white space allowed";
        $err_status="on";
      }
    }

    if(empty($_POST["age"])){
      $age_error = "Age is required";
      $err_status="on";
    }else{
      $dob = $_POST["age"];
      $current_date = time("Y-m-d");
      $age = strtotime($dob);
      $difference = $current_date - $age;
      $age = floor($difference/31556926);

      if($age<18){
        $age_error = "You are under age";
        $err_status="on";
      }
    }

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

      $query1 = "SELECT * FROM users WHERE email = '$email' ";
      $result1 = mysqli_query($con, $query1);
      $counter = mysqli_num_rows($result1); //it counts how many times an ID appears in the database table
      if($counter>0){
        $email_error = "Email already exists!";
        $err_status="on";
      }
    }

    if(empty($_POST["pwd"])){
      $password_error = "Password is required";
      $err_status="on";
    }else{
      $password2 = $_POST["pwd"];
      $password = $_POST["pwd"];
      // if(strlen($password) < 8){
      //   $err_status="on";
      //   $password_error = "Password should have at least 8 characters";
      // }
      if (!preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#", $password )){
        $err_status="on";
        $password_error = "Password should contain numbers, letters(lower and upper case), special characters and must be between 8 to 20 characters";
      }
    }
    
      // else{
      // $password_error = "Password is required";
      // $err_status="on";
      // }

    if(isset($_POST["pwd2"])){
      $password2 = $_POST["pwd2"];
      if($password != $password2){
        $err_status="on";
        $password2_error = "Password does not match";
      }
    }
    

    $password = md5($password2);
    $org = "USER";
    $status = "PENDING";
    $permission = "USER";
    $chars = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $key = substr(str_shuffle($chars), 0, 32);
    $email_message = "Hello " . $fname . " " . $lname . "<br>" . "Thank you for registering with <b>Active Citizen</b>. Click on this <a href='localhost/activecitizen/activate_account.php?key=" . $key . "'> link </a> to activate.<br> Thank you.";
  

    if($err_status == "off"){
      //removing sql injections
      $fname = mysqli_real_escape_string($con, $fname);
      $lname = mysqli_real_escape_string($con, $lname);
      $email = mysqli_real_escape_string($con, $email);

      $query = "INSERT INTO users (fname, lname, date_of_birth, email, password, status, permission, organization, ver_key) VALUES ('$fname', '$lname', '$dob', '$email', '$password', '$status', '$permission', '$org', '$key')";
      if(!mysqli_query($con, $query)){
        die('Error: ' . mysqli_error($con));
      }else{
        
        require_once "PHPMailer/PHPMailerAutoload.php";

        $mail = new PHPMailer;

        //Enable SMTP debugging. 
        //0 - debugger off, 1 - debug client, 2 - debug server, 3 - debug connection
         
        $mail->SMTPDebug = 0;                               
        //Set PHPMailer to use SMTP.
        $mail->isSMTP();            
        //Set SMTP host name                          
        $mail->Host = "mail.gnarhgh.com";
        //Set this to true if SMTP host requires authentication to send email
        $mail->SMTPAuth = true;                          
        //Provide username and password     
        $mail->Username = "georgenarh@gnarhgh.com";                 
        $mail->Password = "gn@ng138";                           
        //If SMTP requires TLS encryption then set it
        $mail->SMTPSecure = "ssl";                           
        //Set TCP port to connect to 
        $mail->Port = 465;                                   

        $mail->From = "preccypromail@gmail.com";
        $mail->FromName = "Precious";

        $mail->addAddress($email, $lname);

        $mail->isHTML(true);

        $mail->Subject = "Active Citizen Registration Validation";
        $mail->Body = $email_message;
        // $mail->AltBody = "This is the plain text version of the email content";

        if(!$mail->send()) 
        {

            $email_status = "Mailer Error: " . $mail->ErrorInfo;
            //You are not online
        } 
        else 
        {
          header("Location: reg_success.php");
        }
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
 include "page_header.php";
?>


	<div class="container" id="form-body2">
  		<form role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST"> <!-- role="form" helps improve accessibility for people using screen readers -->
        <div class="form-group"> <!-- class="form-group" is used to wrap labels for optimum spacing -->
            <label class="control-label" for="fname">First Name:</label> 
            <span class="error"><?php if($fname_error!=""){echo $fname_error;} ?></span>
            <input type="text" class="form-control" name="fname" placeholder="Enter First Name" value="<?php echo $fname; ?>"> <!-- class="form-control" gives tags like <input>, <textarea>, and <select> a width of 100%. -->
        </div>

        <div class="form-group"> <!-- class="form-group" is used to wrap labels for optimum spacing -->
            <label class="control-label" for="lname">Last Name:</label> 
            <span class="error"><?php if($lname_error!=""){echo $lname_error;} ?></span>
            <input type="text" class="form-control" name="lname" placeholder="Enter Last Name" value="<?php echo $lname; ?>"> <!-- class="form-control" gives tags like <input>, <textarea>, and <select> a width of 100%. -->
        </div>

        <div class="form-group"> <!-- class="form-group" is used to wrap labels for optimum spacing -->
            <label class="control-label" for="age">Date of Birth:</label> 
            <span class="error"><?php if($age_error!=""){echo $age_error;} ?></span>
            <input type="date" class="form-control" name="age" placeholder="Enter Date of Birth"> <!-- class="form-control" gives tags like <input>, <textarea>, and <select> a width of 100%. -->
        </div>

        <div class="form-group"> <!-- class="form-group" is used to wrap labels for optimum spacing -->
            <label class="control-label" for="email">Email:</label> 
            <span class="error"><?php if($email_error!=""){echo $email_error;} ?></span>
            <input type="email" class="form-control" name="email" placeholder="Enter Email Adress" value="<?php echo $email; ?>"> <!-- class="form-control" gives tags like <input>, <textarea>, and <select> a width of 100%. -->
        </div>

    		<div class="form-group">
      			<label class="control-label" for="pwd">Password:</label> 
            <span class="error"><?php if($password_error!=""){echo $password_error;} ?></span>        
        		<input type="password" class="form-control" name="pwd" placeholder="Enter Password">
    		</div>

        <div class="form-group">
            <label class="control-label" for="pwd2">Confirm Password:</label> 
            <span class="error"><?php if($password2_error!=""){echo $password2_error;} ?></span>        
            <input type="password" class="form-control" name="pwd2" placeholder="Confirm Password">
        </div>
        <br>
    		<div class="form-group">        
        		<button type="submit" name="submit" value="submit" class="btn btn-default">REGISTER</button>
    		</div>

    
  		</form>
	</div>

  <div style="color:white; margin-top: 60px;">
    <?php
      // echo $err_status . "<br>";
      // echo $fname_error . "<br>";
      // echo $lname_error . "<br>";
      // echo $email_error . "<br>";
      // echo $age_error . "<br>";
      // echo $password_error . "<br>";
      // echo $password2_error . "<br>";
      echo $email_status;
    ?>
  </div>

<?php
  include "page_footer.html";
?>


