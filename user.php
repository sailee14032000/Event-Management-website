<?php 

include 'databaseconnect.php';
if (isset($_POST['username']))
{
	$username = $_POST['username'];
	$password = $_POST['password'];
	$query = mysqli_query($conn,"SELECT * FROM admin_db WHERE username = '$username' and password = '$password'");
	$num = mysqli_num_rows($query);
	if($num>0)
	{
		$_SESSION['admin'] = 'admin';
		echo "ok";
	}
	else{
		$query_u = mysqli_query($conn,"SELECT * FROM user_db WHERE username = '$username' and password = '$password'");
	$num_u = mysqli_num_rows($query_u);
	$ro = mysqli_fetch_assoc($query_u);
	
	if($num_u==0)
	{
		echo "Username or password incorrect!";
	}
	else{
		$_SESSION['username_'] =$username;
		$_SESSION['username_email'] = $ro['email'] ;

		echo "Hey ".$username." check our new events!";
	}
	}

 
}



?>
