<?php
error_reporting(0);
include_once('Connection.php');
if ($db_handle) {
$rows = array();
$message="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    global $message;
  // collect value of input field
  $name = $_REQUEST['data'];
  if (empty($name)) {
   $message="error in variable";
  } else {
    $data = json_decode($name,true);
    $rows[] = "sucess";
    $query = "insert into employee values('$data[empid]','$data[empname]','$data[empemail]','$data[employeeph]','$data[designation]','$data[department]','$data[joiningdate]');";
    $details = pg_query($db_handle,$query);
    if(!$details){
       $message = pg_errormessage($db_handle);
    }
    else{
      $message="sucess";
    }
  }
//    echo json_encode($rows);
}

} else {
$message="error";
}
 global $message;
 header('Content-type: application/json');
 $rows=array("message"=>$message);
 echo json_encode($rows);
?>