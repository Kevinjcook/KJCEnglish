<?php 
//include the information needed for the connection to MySQL data base server. 
// we store here username, database and password 
include("sqlopen.php");
header('Content-Type: application/json');

// to the url parameter are added 4 parameters as described in colModel
// we should get these parameters to construct the needed query
// Since we specify in the options of the grid that we will use a GET method 
// we should use the appropriate command to obtain the parameters. 
// In our case this is $_GET. If we specify that we want to use post 
// we should use $_POST. Maybe the better way is to use $_REQUEST, which
// contain both the GET and POST variables. For more information refer to php documentation.
// Get the requested page. By default grid sets this to 1. 
$page = $_GET['page']; 
//$page = 1;
// get how many rows we want to have into the grid - rowNum parameter in the grid 
$limit = $_GET['rows']; 
//$limit = 10;
// get index row - i.e. user click to sort. At first time sortname parameter -
// after that the index from colModel 
$sidx = $_GET['sidx']; 
 
// sorting order - at first time sortorder 
$sord = $_GET['sord']; 
 
// if we not pass at first time index use the first column for the index or what you want
if(!$sidx) $sidx =1; 
 
// Check connection to the MySQL database server 
$con=OpenConectionBd();
if ($con->connect_error) {
			die('Error de Conexión ('.$con->connect_errno . ')'.$con->connect_error);
}else{
	$count=0;
	$query_count = "SELECT COUNT(*) AS count FROM students";
    
	// calculate the number of rows for the query. We need this for paging the result 
	if ($result = $con->query($query_count)) {
		$rcount = $result->fetch_assoc();
		$count = $rcount['count'];
	}else{
		mysqli_close ($con);
		exit(0);
	}
 
	// calculate the total pages for the query 
	if( $count > 0 && $limit > 0) { 
    	$total_pages = ceil($count/$limit); 
	} else { 
    	$total_pages = 0; 
	} 
 
	// if for some reasons the requested page is greater than the total 
	// set the requested page to total page 
	if ($page > $total_pages) 
		$page=$total_pages;
 
	// calculate the starting position of the rows 
	//$start = ($rows*$page) - $rows;
	$start = $limit*$page - $limit;

	// if for some reasons start position is negative set it to 0 
	// typical case is that the user type 0 for the requested page ORDER BY $sidx $sord
	if($start <0) $start = 0; 
 
	// the actual query for the grid data 
	$query_grid = "SELECT st_no, st_firstname, st_lastname, st_email FROM students  ORDER BY st_no ASC LIMIT $start , $limit;"; 

	$respuesta->page = 0;
	$respuesta->total = 0;
	$respuesta->records = 0;

	if ($result = $con->query($query_grid)) {
		$students=array();
		$respuesta->page = $page;
		$respuesta->total = $total_pages;
		$respuesta->records = $count;
		$i=0;
		while ($row = $result->fetch_assoc()){
		// $respuesta->rows[$i]['id']=$row["id"];
			//$respuesta->rows[$i]['st_no']=$row["st_no"];
			$students=array_map(function ($e) {return htmlentities($e, ENT_NOQUOTES, 'UTF-8');}, $row);
			$respuesta->rows[$i]=$students;
			$i++;
		}
	echo json_encode($respuesta);
 	}else{
	 	mysqli_close ($con);
	    die("Couldn't execute query.".mysql_error()); 
	exit(0);
	}
mysqli_close ($con);
}

?>
