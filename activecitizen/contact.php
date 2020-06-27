<?php
    session_start();
   include 'connect.php';
?>

<?php 
    include "page_header.php";
?>

<div class="container contact">
    <!-- <h3>Contact Us</h3> -->
   <form role="form" method="POST" action="#">
        <div class="form-group"> <!-- class="form-group" is used to wrap labels for optimum spacing -->
            <label class="control-label" for="name">Name:</label> 
            <input type="text" class="form-control" name="name" placeholder="Enter Name">
        </div>

       <div class="form-group">
            <label class="control-label" for="email">Email:</label> 
            <input type="email" class="form-control" name="email" placeholder="Enter Email Address">
        </div>

       <div class="form-group">
            <label class="control-label" for="subject">Subject:</label>        
            <input type="text" class="form-control" name="subject" placeholder="Enter Subject">
        </div>

        <div class="form-group">
            <label class="control-label" for="msg">Message:</label><br>
            <textarea type="text" name="message" placeholder="Message"></textarea>
        </div>

        <div class="form-group">       
            <button type="submit" name="submit" class="btn btn-default" id="contact-btn">Send Message</button>
        </div>
    </form>
</div>
 

      <!--   <div>
            <p>Copyright © Shuvo Habib. All rights reserved. Template by <a href="http://shuvohabib.com" target="blank">Shuvo Habib </a>. </p>
        </div> -->
   


<?php
    include "page_footer.php";
?>
