<?php  


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
      <h1 id="introduction" style="border-top: none; padding-top: 0;">Comment</h1>
      <?php  

    if(isset($_GET['month'])){ 
            $month = $_GET['month'];     
           } 
    

    $dateObj   = DateTime::createFromFormat('!m', $month);
    $monthName = $dateObj->format('F'); // March
     

    require_once("./sqlopen.php");

  $con=OpenConectionBd();

  if ($con->connect_error) {
      die('Error de Conexión ('.$con->connect_errno.')'.$con->connect_error);
      echo ('Error de Conexión ('.$con->connect_errno.')'.$con->connect_error);
      }else{
        $query = "SELECT * FROM `comments` WHERE Comment_Number=$month;";
        if ($result = $con->query($query)) 
        {
          $row = $result->fetch_assoc();
          $Blog_Comment=$row['Blog_Comment'];
          echo "<br/>";
          echo "Blog Comments for " ; 
           
          echo $monthName;
          echo "<br/>";
          echo $Blog_Comment;
        }
        else{ echo "XXXXXXX" ; }
      }
  mysqli_close($con);

?>
    </div>
    
    <!-- ##### Footer ##### -->

    <div id="footer">
      <div class="doNotPrint">
        <a href="./index.php">Tell a Friend</a> |
        <a href="./index.php">Privacy Policy</a> |
        <a href="./index.php">Site Map</a> |
        <a href="./index.php">Feedback</a> |
        <a href="./index.php">Help</a>
      </div>

      <div>
        Copyright &copy; 2015, Company |
        Modified on 2015-June-01 by 
          <a href="http://www.facebook.com" title="The author">Mr.Cook</a>
      </div>
    </div>
  </body>
</html>

