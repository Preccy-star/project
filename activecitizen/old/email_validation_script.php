<?php
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
  } 
  else 
  {
    header("Location: reg_success.php");
  }


?>