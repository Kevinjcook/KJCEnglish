<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include './metalinks.php';?>
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
      <h1 id="introduction" style="border-top: none; padding-top: 0;">List of Feedback</h1>
      <?php  
        $feedback_actual=array();
        require_once("./sqlopen.php");
        $con=OpenConectionBd();

        if ($con->connect_error) {
          die('Error de Conexión ('.$con->connect_errno.')'.$con->connect_error);
        echo ('Error de Conexión ('.$con->connect_errno.')'.$con->connect_error);
        }else{
          $query = "SELECT * FROM `blogs`.`feedback_v1`";

          if ($result = $con->query($query)) 
          //$feedback_actual = $result->fetch_assoc();
          // var_dump($feedback_actual);

            echo  "<br>" ;
            echo  "<br>" ;
            echo "id_users"."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . 
                 "name". "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" 
        .      "email        " . "<br>";

            foreach ($result as $row) {
                        echo $row["id_feedback"] . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" ;
                        echo $row["id_user"] . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" ;
                        echo $row["subject"] . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" ;
                        echo htmlspecialchars($row["message"]) . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" ;
                        echo $row["date"] . "<br>" ;
                        echo  "<br>" ;
            }
          
        }
         mysqli_close($con);
      ?>
 
     </div>

    <?php include 'resources/templates/footer.php';?>
  
  </body>
</html>

