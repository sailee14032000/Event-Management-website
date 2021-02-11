<?php 
if (isset($_POST['usernamec']))
{
$to_email = "sailees14032000@gmail.com";
$username = $_POST['usernamec'];
$email_c = $_POST['emailc'];
$subject = "Fedback from customer";
$body = " Username :".$username." Email :".$email_c."\n".$_POST['messsage'];
$headers = "From: sailees14032000@gmail.com";

if(mail($to_email, $subject, $body, $headers))
{
	echo "Feedback sent";
}
else{
	
    echo "Try again";
    
}
}
?>