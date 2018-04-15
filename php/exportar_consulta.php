<?php

  // *****************************************************************
  // CONECTARSE A LA BASE DE DATOS
  // *****************************************************************  
  // connect to database
  require_once 'dbconfig.php';
 // $connection = new mysqli($host, $user, $password, $dbname, $port, $socket)
   // or die ('Could not connect to the database server' . mysqli_connect_error());
  
    $conn_string = "host=$host port=$port dbname=$dbname user=$user password=$password";

    $db = pg_connect($conn_string);
    if(!$db){
        $errormessage=pg_last_error();
        echo "Error 0: " . $errormessage;
        exit();
    }

  error_reporting(0);
  #date_default_timezone_set('America/Monterrey');
  
  // *****************************************************************
  // CARGAR FUNCIONES
  // *****************************************************************
  include("functions_lib.php");

  // drop temp_table
  $query = "DROP TABLE IF EXISTS temp_table;";

  /*if ($stmt = $connection->prepare($query)) {
    $stmt->execute();
  }*/

    $result = pg_query($db,$query);

  // set default column separator
  $col_separator = ",";
  // set default null value
  $null_value = "NULL";

  // extrae valores del formulario
  $query_post = $_POST['query'];
  // remove the ; 
  $query_post = str_replace(';','', $query_post);
  
  // create new table
  $query = "CREATE TABLE temp_table AS ".$query_post.";";

  /*if ($stmt = $connection->prepare($query)) {
    $stmt->execute();
  }*/
  

    $result = pg_query($db,$query);

  $table = 'temp_table';



 /* $link = mysql_connect($host, $user, $password) or die("Can not connect." . mysql_error());
  mysql_select_db($dbname) or die("Can not connect.");*/

 
  //$result = mysql_query("SHOW COLUMNS FROM ".$table."");
  //$result = pg_query("SHOW COLUMNS FROM ".$table."");
  $result = pg_query("select column_name,data_type 
from information_schema.columns 
where table_name = '".$table."';");
$csv_output_luis ="";
$csv_output ="";
  //if (mysql_num_rows($result) > 0) {
  if (pg_num_rows ($result) > 0) {

   //while ($row = mysql_fetch_assoc($result)) {
   while ($row = pg_fetch_array($result, NULL, PGSQL_ASSOC)) {
   // $csv_output .= "\"".$row['Field']."\"".$col_separator;
    $csv_output .= "\"".$row['column_name']."\"".$col_separator;
    $i++;
   }
  }

  $csv_output .= "\n";
$values = pg_query("SELECT * FROM ".$table."");
  //while ($rowr = mysql_fetch_row($values)) {
  while ($rowr = pg_fetch_array($values,  NULL, PGSQL_ASSOC)) {
  

foreach ($rowr as $key => $value) {
 $csv_output .= "\"".$value."\"".$col_separator;
}

$csv_output .= "\n";

}

  // set file name
  $file = $_POST['file'];
  $filename = $file."_".date("Y-m-d_H-i",time());
  
  #header("Content-type: application/vnd.ms-excel");
  #header("Content-disposition: xls" . date("Y-m-d") . ".xls");
  #header("Content-disposition: filename=".$filename.".xls");
  
  header("Content-type: text/csv");
  header("Content-disposition: csv" . date("Y-m-d") . ".csv");
  header("Content-disposition: filename=".$filename.".csv");
  print $csv_output;
  exit;
  
  
  print $csv_output;
  exit;
?>
