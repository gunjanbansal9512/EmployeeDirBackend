<?php
include_once('Connection.php');
if ($db_handle) {
$rows = array();
if ($_SERVER["REQUEST_METHOD"] == "GET") {
  // collect value of input field
  $empid = $_GET['empid'];
  if (empty($empid)) {
   $rows = array("message"=>"error");
  } else {
    $query = "select department,designation,empemail,employeeph from employee where empid = '".$empid."'";
    $details = pg_query($db_handle,$query);
    if(!$details){
       $rows = array("message"=>"error");
    
    }
    else{
      while($row = pg_fetch_assoc($details)){
        $rows[] = $row;
    }

    }
  }
  
}

} else {

 $rows = array("message"=>"error");

}
 print json_encode($rows);
?>