<?php
  session_start();
  include 'connect.php';
?>

<?php
  $email = $email_message = $key = "";
	$email_error = $email_status = "";
	$err_status = "off";

	if(isset($_POST["submit"])){
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
      $counter = mysqli_num_rows($result1); //it counts how many times an entity appears in the database table
      if($counter==0){
        $email_error = "Email does not exist!";
        $err_status="on";
      }else{
        $row= mysqli_fetch_assoc($result1);
  		  echo $key = $row["ver_key"];
      }
    }


    if($err_status == "off"){

    	$email_message = "Click on this <a href='localhost/activecitizen/new_password.php?key=" . $key . "'> link </a> to change your password.<br> Thank you.";

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

        $mail->addAddress($email);

        $mail->isHTML(true);

        $mail->Subject = "Active Citizen: Change password";
        $mail->Body = $email_message;
        // $mail->AltBody = "This is the plain text version of the email content";

        if(!$mail->send()) 
        {

            $email_status = "Mailer Error: " . $mail->ErrorInfo;
            //You are not online
        } 
        else 
        {
          header("Location: email_sent_success.php");
        }

  	}
  }

  function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
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
         <!-- class="form-group" is used to wrap labels for optimum spacing -->
            <label class="control-label" for="email">Enter Your Email:</label> <?php if($email_status != ""){echo $email_status;} ?>
            <span class="error"><?php if($email_error!=""){echo $email_error;} ?></span>
            <input type="email" class="form-control" name="email" placeholder="Enter Email Adress" value="<?php echo $email; ?>"> <!-- class="form-control" gives tags like <input>, <textarea>, and <select> a width of 100%. -->
          </div>

          <div class="form-group">        
        		<button type="submit" name="submit" class="btn btn-default">SEND</button>
    			</div>

        </form>  	
      </div>
				
		</div><!-- row -->
			
	</div><!-- container -->
</section><!-- section -->


<?php
  include "page_footer.php";
?>
