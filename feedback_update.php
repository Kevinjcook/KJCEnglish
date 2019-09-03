<?php  

    //echo htmlentities(file_get_contents('http://www.as.com'));

    $p_email = $_POST['contact']['email'];
    $p_name = $_POST['contact']['name'];
    $p_subject = $_POST['contact']['subject'];
    $p_message = $_POST['contact']['message'];

    echo $p_email . $p_name . $p_subject . $p_message ;
    $feedback_actual=array();
    require_once("./sqlopen.php");

    $con=OpenConectionBd();

    if ($con->connect_error) {
      die('Error de Conexión ('.$con->connect_errno.')'.$con->connect_error);
      echo ('Error de Conexión ('.$con->connect_errno.')'.$con->connect_error);
      }else{
        $query = "CALL p_add_feedback('$p_email','$p_name','$p_subject', '$p_message');";
        if ($result = $con->query($query)) {
          $feedback_actual = $result->fetch_assoc();
          $p_Id = $feedback_actual['count'];
          
          }else {
            trigger_error('Invalid/Error in SQL: ' . $query . ' Error: ' . $con->error, E_USER_ERROR);
          }
       }
  mysqli_close($con);
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
    <?php include 'header.php';?>

    <!-- **********************************************************************>
    <!-  ### Sidebars ##### 
    <!-  *********************************************************************-->
    <?php include 'sidebars.php';?>

    <!-- ##### Main Copy ##### -->


    <!-- ##### Main Copy ##### -->

    <div id="main-copy">
      <h1 id="introduction" style="border-top: none; padding-top: 0;">Feedback</h1>
      


       <div id="contentsection">
          <p>
          <strong>Your feedback record <?php echo $feedback_actual['count'] ?> has been successfully created </strong>
          </p>

          <p>
          <strong>Date: </strong> <?php echo $feedback_actual['date'] ?>
          </p>

          <p>
          <strong>Name: </strong> <?php echo $feedback_actual['name'] ?>
          </p>

          <p>
          <strong>Subject: </strong> <?php echo $feedback_actual['subject'] ?>
          </p>

          <p>
          <strong>Email:</strong> <?php echo $feedback_actual['email'] ?> 
          </p>

          <p>
          <strong>Message:</strong> <?php echo $feedback_actual['message'] ?> 
          </p>
                

          <input id="contact_user_id" name="contact[user_id]" type="hidden" value="3013" />
       </div>
    </div>

 <?php include 'footer.php';?>
   
    
  </body>
</html>

