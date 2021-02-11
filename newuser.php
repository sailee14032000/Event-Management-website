<?php 
include 'databaseconnect.php';
if (isset($_POST['username']))
{
	$username = $_POST['username'];
	$password = $_POST['password'];
	$email = $_POST['email'];
	$qu = mysqli_query($conn,"SELECT * FROM user_db");
	$num = mysqli_num_rows($qu);

	$query = mysqli_query($conn,"INSERT INTO user_db(id,username,email,password) VALUES('','$username','$email','$password')");
	$que = mysqli_query($conn,"SELECT * FROM user_db");
	
	$num_u = mysqli_num_rows($que);
	
	if($num_u>$num)
	{
		echo "Account created";
	}
	else{
	    echo "Account exists!";
	}


}	





?>