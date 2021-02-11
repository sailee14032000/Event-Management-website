<?php
include 'databaseconnect.php';
 
function get_event($conn , $term){ 
 $query = mysqli_query($conn,"SELECT * FROM events WHERE event_name LIKE '%".$term."%' ORDER BY event_name ASC");
 $rows = mysqli_num_rows($q);
 $result = mysqli_query($conn, $query); 
 $data = mysqli_fetch_all($result,MYSQLI_ASSOC);
 return $data; 
}
 
if (isset($_GET['term'])) {
 $getEvent = get_event($conn, $_GET['term']);
 echo $getEvent;
 $EventLIst = array();
 foreach($getEvent as $ety){
 $EventLIst[] = $ety['event_name'];
 }
 echo json_encode($EventLIst);
}
?>