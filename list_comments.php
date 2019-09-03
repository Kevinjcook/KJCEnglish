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
      <h1 id="introduction" style="border-top: none; padding-top: 0;">List of Comments</h1>
      <?php  

  $feedback_actual=array();

  require_once("./sqlopen.php");

  $con=OpenConectionBd();

  if ($con->connect_error) {
      die('Connection Error ('.$con->connect_errno.')'.$con->connect_error);
      echo ('Connection Error ('.$con->connect_errno.')'.$con->connect_error);
      }else{
        $query = "SELECT * FROM `blogs`.`comments`";

        if ($result = $con->query($query)) 
          //$feedback_actual = $result->fetch_assoc();
          // var_dump($feedback_actual);

          echo  "<br>" ;
          echo  "<br>" ;
          echo "id_users"."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . 
               "name". "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" 
        .      "email        " . "<br>";

          foreach ($result as $row) {
                        echo $row["Blog_Comment_Number"] . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" ;
                        echo $row["Blog_Date"] . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" ;
                        echo htmlspecialchars($row["Blog_Comment"]) . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" ;
                        echo  "<br>" ;
            }
          
        }
  mysqli_close($con);

?>
  <?php include 'resources/templates/footer.php';?>

  </div>
  </body>
</html>

