<?php  

?>

<!DOCTYPE html >

<html xml:lang="en">
  <head>
    <meta charset="utf-8">
    
    <title>English Classes Web Site</title>

    <?php 
      define('PROJECT_ROOT', __DIR__.'/');
      // echo PROJECT_ROOT;
    ?>
   
    <?php include 'metalinks.php';?>
    <?php include 'configs.php';?>
    <!-- <?php include 'resources/services/basedatos.php';?>-->

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
      <h1 id="introduction" style="border-top: none; padding-top: 0;">Introduction</h1>
      <p> <strong>English Bits and Bobs </strong> is my personal Web Page to be used as a repository for all things related to my English classes and for English topics in general.</p>
      <img src="assets/images/KMad2.png" alt="Jason's Photo" border='0' width="200" height="150"/>
      <p>Well that's me in the foto above, taken a couple of years ago in Madrid. </p>
         
      <p>I have decided to create this web page to improve my newly found skills in web programming and as an example I have selected my English students as a sort of guinea pig.</p>
      

      <p>As such, I have whipped this paged up so that I may test various concepts that I have learnt. As one of these concepts was CSS you will find the colours, presentation a little strange perhaps. </p>

      <p>As such, I have whipped this paged up so that I may test various concepts that I have learnt. As one of these concepts was CSS you will find the colours, presentation a little strange perhaps. </p>



    </div>
    
    <!-- **********************************************************************>
    <!-  ### Footer ##### 
    <!-  *********************************************************************-->
    <?php include 'resources/templates/footer.php';?>
     

</html>

