<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Student Grid</title>

    <!-- page specific plugin styles -->

    <!--<link rel="stylesheet" href="assets/css/jquery-ui-1.10.3.full.min.css" />-->
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="assets/css/datepicker.css" />
    <link rel="stylesheet" href="assets/css/ui.jqgrid.css" />
    <link rel="stylesheet" href="assets/css/custom.css" />

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
      
      <table id="grid_table"></table> 
      <div id="grid_pager"></div> 
    
     
    </div>

  
    <!--<script src="assets/js/jquery-2.0.3.min.js"></script>-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!--<script src="assets/js/jquery-ui-1.10.3.full.min.js"></script>-->
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="assets/js/jquery.contextmenu-fixed.js"></script>
  
    <script src="assets/js/jqGrid/js/i18n/grid.locale-en.js"></script>
    <script src="assets/js/jqGrid/js/jquery.jqGrid.min.js"></script>

    <!-- page specific plugin scripts  
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/typeahead-bs2.min.js"></script>
    <script src="assets/js/date-time/bootstrap-datepicker.min.js"></script> -->


    <script type="text/javascript">
    $(document).ready(function () {

      $("#grid_table").jqGrid({
          url: "StudentLoad.php",
            datatype: "json",
            colNames: ["StuNo", "Firstname", "Surname", "Email"],
            colModel: [
  				{ name: "st_no", width: 5 },
                { name: "st_firstname", width: 10, align: "left", editable:true},
                { name: "st_lastname",  width: 10, align: "left", editable:true},
                { name: "st_email",     width: 20, sortable: false, editable:true}
                ],
            loadui: 'disable',
            pager: "#gridpager",
            rowNum: 10,
            autowidth: true,
            rowList: [10, 20, 30],
            sortname: "st_no",
            sortorder: 'asc',
            search: true,
            viewrecords: true,
            gridview: true,
            autoencode: true,
            caption: "Student List"
        }); 

      $("#grid_table").jqGrid('filterToolbar',
                   {
          autosearch: true,
        stringResult: true,
        searchOnEnter: true,
        defaultSearch: "cn"
      });
       
    }); 

    
    </script>
    <?php include 'resources/templates/footer.php';?>
  </body>
</html>