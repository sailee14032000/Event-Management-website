<?php
 session_start();
 $conn = mysqli_connect('localhost','root');
 $db = mysqli_select_db($conn,'event_management');
 if(!$conn)
 {
   echo "Connection failed";
 } 
 if(!$db)
 {
 	echo "Database not connected";
 }
?>