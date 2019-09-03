<?php  

?>
<!DOCTYPE html >

<html xml:lang="en">
  <head>
   <?php include './metalinks.php';?>
  </head>

  <body>
    <!-- **********************************************************************>
    <!-  ### Header #####         
    <!-  ********************************************************************-->
    <?php include 'resources/templates/header.php';?>

    <!-- **********************************************************************>
    <!-  ### Sidebars ##### 
    <!-  ********************************************************************-->
    <?php include 'resources/templates/sidebars.php';?>

    <!-- ##### Main Copy ##### -->

    <div id="main-copy">
      <h1 id="introduction" style="border-top: none; padding-top: 0;">List of Students</h1>
      <h3 id="First Line"   
             >Firstname &nbsp &nbsp &nbsp Surname &nbsp &nbsp &nbsp &nbsp email </h3>

      <?php  

        $feedback_actual=array();

        require_once("./sqlopen.php");

        $con=OpenConectionBd();

        if ($con->connect_error) {
            die('Error de Conexión ('.$con->connect_errno.')'.$con->connect_error);
            echo ('Error de Conexión ('.$con->connect_errno.')'.$con->connect_error);
          }else{
              $query = "SELECT * FROM `english_classes`.`students`";

              if ($result = $con->query($query)) 
                //$feedback_actual = $result->fetch_assoc();
                //var_dump($feedback_actual);

                foreach ($result as $row) {
                              echo str_pad($row["st_firstname"],25,".");
                              echo str_pad($row["st_lastname"],25,".");
                              echo $row["st_email"] . "<br>" ;
                              echo  "<br>" ;
              }
            }
        mysqli_close($con);

      ?>
      <?php include 'resources/templates/footer.php';?>
         
    </div>
  </body>
</html>

