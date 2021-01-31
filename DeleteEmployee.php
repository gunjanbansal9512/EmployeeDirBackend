<?php
// $db_handle = pg_connect("host = localhost port = 5555 dbname = Employee user = postgres password = root");
include_once('Connection.php');
if ($db_handle) {
$rows = array();
if ($_SERVER["REQUEST_METHOD"] == "GET") {
  // collect value of input field
  $name = $_GET['empid'];
  if (empty($name)) {
   $rows = array("message"=>"error");
  } else {
    $query = "delete from employee where empid = '".$name."'";
    $details = pg_query($db_handle,$query);
    if(!$details){
       $rows = array("message"=>"error");
    
    }
    else{
      $rows = array("message"=>"sucess");

    }
  }
   print json_encode($rows);
}

} else {

echo 'Connection attempt failed.';

}
?>