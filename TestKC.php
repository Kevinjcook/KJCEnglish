<?php  

/*$page = $_GET['page']; // get the requested page
$limit = $_GET['rows']; // get how many rows we want to have into the grid
$sidx = $_GET['sidx']; // get index row - i.e. user click to sort
$sord = $_GET['sord']; // get the direction
if(!$sidx) $sidx =1; */

// var_dump($_GET);
$limit = 6;
$page = 1;

// connect to the database

  require_once("./sqlopen.php");

  $con=OpenConectionBd();

  if ($con->connect_error) {
      die('Error de Conexión ('.$con->connect_errno.')'.$con->connect_error);
      echo ('Error de Conexión ('.$con->connect_errno.')'.$con->connect_error);
      }else{
        $query = "SELECT COUNT(*) AS count FROM `blogs`.`users` ;";
        if ($result = $con->query($query)) {
          $row = $result->fetch_assoc();
          $count=$row['count'];
          echo $count;
          echo "<br/>";
		  if( $count >0 ) {
				$total_pages = ceil($count/$limit);
		  } else {
			$total_pages = 0;
		  }

        
        if ($page > $total_pages) $page=$total_pages;
        

		$start = $limit*$page - $limit; // do not put $limit*($page - 1)
		$query = "SELECT * FROM `blogs`.`users` ORDER BY name LIMIT $start , $limit";
		$result = $con->query($query) or die("Couldn t execute query.".mysql_error());

		$response->page = $page;
		$response->total = $total_pages;
		$response->records = $count;
		        
		$i=0;
		foreach ($result as $row) {
			echo "Kevin";
			var_dump($row);
			$response->rows[$i]['id_users']=$row["id_users"];
    		$response->rows[$i]['cell']=array($row["id_users"],$row["email"],$row["name"]);
    		$i++;
}     

		echo "<br/>";
     	echo "oooo";
		var_dump($response);
		echo "<br/>";

	echo json_encode($response);

        }
      }
  mysqli_close($con);


/* connect to the database





$db = mysql_connect($dbhost, $dbuser, $dbpassword)
or die("Connection Error: " . mysql_error());

mysql_select_db($database) or die("Error conecting to db.");
$result = mysql_query("SELECT COUNT(*) AS count FROM invheader a, clients b WHERE a.client_id=b.client_id");
$row = mysql_fetch_array($result,MYSQL_ASSOC);
$count = $row['count'];

if( $count >0 ) {
	$total_pages = ceil($count/$limit);
} else {
	$total_pages = 0;
}
if ($page > $total_pages) $page=$total_pages;
$start = $limit*$page - $limit; // do not put $limit*($page - 1)
$SQL = "SELECT a.id, a.invdate, b.name, a.amount,a.tax,a.total,a.note FROM invheader a, clients b WHERE a.client_id=b.client_id ORDER BY $sidx $sord LIMIT $start , $limit";
$result = mysql_query( $SQL ) or die("Couldn t execute query.".mysql_error());

$responce->page = $page;
$responce->total = $total_pages;
$responce->records = $count;
$i=0;
while($row = mysql_fetch_array($result,MYSQL_ASSOC)) {
    $responce->rows[$i]['id']=$row[id];
    $responce->rows[$i]['cell']=array($row[id],$row[invdate],$row[name],$row[amount],$row[tax],$row[total],$row[note]);
    $i++;
}        
echo json_encode($responce);
...
?>*/