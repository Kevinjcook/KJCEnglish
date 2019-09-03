
<?php

   //****  check if the Submit button was pressed
  
  
  ?>


<!DOCTYPE html >

<html xml:lang="en">
  <head>
    <?php include 'metalinks.php';?>
  </head>

  <body>
    
   <!-- **********************************************************************>
    <!-  ### Header ##### 
    <!-  *********************************************************************-->
    <?php include 'resources/templates/header.php';?>

    <!-- **********************************************************************>
    <!-  ### Sidebars ##### 
    <!-  *********************************************************************-->
    <?php include 'resources/templates/sidebars.php';?>

    <!-- ##### Main Copy ##### -->


    <div id="main-copy">
      <h1 id="introduction" style="border-top: none; padding-top: 0;">Feedback</h1>
      
<div id="contentsection">
  <p>
    <strong>Using this form will create a feedback record </strong>for the support team.
    Make sure to include your return email address.
  </p>

  <p><span class="error" >* required field.</span></p>

  <form accept-charset="UTF-8" action="http://localhost/KJCEnglish/feedback_update.php" class="new_feedback" id="new_feedback" method="post">
  <div style="margin:0;padding:0;display:inline">
  
       <dl>
          <dt><label for="contact_email">Your Email</label></dt>
          <dd><input id="contact_email" name="contact[email]" type="email" required /></dd>

          <dt><label for="contact_name">Your Name</label></dt>
          <dd><input id="contact_name" name="contact[name]" type="text" required /></dd>

          <dt><label for="contact_subject">Subject</label></dt>
          <dd><input id="contact_subject" name="contact[subject]" type="text" required /></dd>

          <dt><label for="contact_message">Message</label></dt>
          <dd>Messages are sent in plain text.</dd>
          <dd><textarea rows="10" cols="50" id="contact_message" name="contact[message]" type="text" required >
          </textarea></dd>

     
        <dt></dt>
        <dd><input class="submit" name="commit" type="submit" value="Create Feedback" /></dd>
       </dl>
    </div>
    </form>
   </div>

    </div>
    
    <!-- ##### Footer ##### -->

    <?php include 'resources/templates/footer.php';?>

  </body>
</html>
