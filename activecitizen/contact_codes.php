<section class="blog-area section">
    <div class="container form-container" id="form-body1">
        <div class="row">
            <div class="container">
                <span class="error"><?php if($login_error!=""){echo $login_error;} ?></span>
                <form role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">

                    <div class="form-group"> <!-- class="form-group" is used to wrap labels for optimum spacing -->
                        <label class="control-label" for="name">Name:</label> 
                        <span class="error"><?php if($name_error!=""){echo $name_error;} ?></span>
                        <input type="text" class="form-control" name="name" placeholder="Enter Name" value="<?php echo $name; ?>"> <!-- class="form-control" gives tags like <input>, <textarea>, and <select> a width of 100%. -->
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="email">Email:</label> 
                        <span class="error"><?php if($email_error!=""){echo $email_error;} ?></span>
                        <input type="email" class="form-control" name="email" placeholder="Enter Email Address" value="<?php echo $email; ?>">
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="subject">Subject:</label> 
                        <span class="error"><?php if($subject_error!=""){echo $subject_error;} ?></span>         
                        <input type="text" class="form-control" name="subject" placeholder="Enter Subject">
                    </div>
         
                    <div class="form-group">
                        <textarea type="text" name="message" placeholder="Message"></textarea>
                    </div>
                    <br>

                    <div class="form-group">       
                        <button type="submit" name="submit" class="btn btn-default">Send Message</button>
                    </div>
          
                </form>
            </div>
            
        </div><!-- row -->
        
    </div><!-- container -->
</section><!-- section -->

   