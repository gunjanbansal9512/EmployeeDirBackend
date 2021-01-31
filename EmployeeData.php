<?php
// $db_handle = pg_connect("host = localhost port = 5555 dbname = Employee user = postgres password = root");
include_once('Connection.php');
if ($db_handle) {
$command = "select * from employee order by empid";
$details = pg_query($db_handle,$command);
$rows=array();
// echo 'Connection attempt succeeded.';
if(!$details){
    echo "Error while fetching";
}
else{
    while($row = pg_fetch_assoc($details)){
        $rows[] = $row;
    }
    print json_encode($rows);
}
} else {

echo 'Connection attempt failed.';

}
?>