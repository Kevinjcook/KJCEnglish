<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Student Grid</title>

    <!-- page specific plugin styles -->

    <!--<link rel="stylesheet" href="assets/css/jquery-ui-1.10.3.full.min.css" />
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="assets/css/datepicker.css" />
    <link rel="stylesheet" href="assets/css/ui.jqgrid.css" />
    <link rel="stylesheet" href="assets/css/custom.css" />  -->

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

      <div id="main-copy">
      
        <?php
          $files = glob("./assets/images/images_fun/*.*");
          for ($i=1; $i<count($files); $i++)
          {
            $num = $files[$i];
            echo '<img src="'.$num.'" alt="random image"  height="220" width="220">'."&nbsp;&nbsp;";
            }
        ?>
       
         
      </div>

      <?php include 'resources/templates/footer.php';?>
    
  </body>
</html>