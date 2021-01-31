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
  $empid = $_REQUEST['empid'];
  if (empty($name)) {
   $message="error in variable";
  } else {
    $data = json_decode($name,true);
    $rows[] = "sucess";
    $query = "update employee set empemail = '$data[empemail]',employeeph = '$data[employeeph]',designation = '$data[designation]',department = '$data[department]' where empid = '$empid';";
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