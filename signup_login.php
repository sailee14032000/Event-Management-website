<?php
include 'databaseconnect.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
   
</head>
<body>
<header>
	<nav>
		<ul id="navigation-links">
			<li ><a href="index.php" >Events</a></li>
			<li><a href="create_event.php">Create Events</a></li>
			<li class="active"><a href="">Sign up/Login</a></li>
		</ul>
		<div id="clear"></div>
	</nav>
</header>

<div id="signup_login">
	<form id="signup" class="enable" action="dashboard.php" method="post">
		<label for="username">Username</label>
		<input type="text" name="username">
		<label for="email">Email</label>
		<input type="email" name="email">
		<label for="password">Password</label>
		<input type="password" name="password">
		<input type="button" name="" id="register-link" onclick="opacitychange('login','signup')" value="Already a member? Login here">
		<input type="submit" name="Sign up">
	</form>
	<form id="login"  action="dashboard.php" method="post">
		<label for="username">Username</label>
		<input type="text" name="username">
		<label for="password">Password</label>
		<input type="password" name="password">
		<input type="button" name="" id="signup-link" onclick="opacitychange('signup','login')" value="New member? Sign up here">
		<input type="submit" name="Login" >
	</form>
</div>
<script type="text/javascript">
	function opacitychange(formid,formid2){
		$('#'+formid).addClass('enable');
		$('#'+formid2).removeClass('enable');

	}
</script>
</body>

</html>