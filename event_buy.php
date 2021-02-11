<?php 
include 'databaseconnect.php';
if (isset($_SESSION['username_email']) and isset($_POST['event_name']))
{

$to_email =$_SESSION['username_email'];
$username =$_SESSION['username_'];
$message = "Event Name : ".$_POST['event_name']."\n"."Event Location : ".$_POST['event_location']."\n"."Event Time : ".$_POST['event_time']."\n"."Event Price : ".$_POST['event_price'];
$subject = "Hurrah!!! We are waiting to welcome you at event";
$body = "TICKETS BOOKED!!!"."\n"."Event Name : ".$_POST['event_name']."\n"."Event Location : ".$_POST['event_location']."\n"."Event Time : ".$_POST['event_time']."\n"."Event Price : ".$_POST['event_price'];
$headers = "From: sailees14032000@gmail.com";

if(mail($to_email, $subject, $body, $headers))
{
	echo "Please check your mail";
}
else{
	
    echo "Try again";
    
}
}
else{
	echo "Please login first";
    
}
?>