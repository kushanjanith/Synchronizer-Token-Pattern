<?php

// hard coded user credentials
$user = "admin";
$pass = "letmein";

session_start();

$username = $_POST['username'];
$password;
$csrfT;
$message;

// assigning the token which was created in the Login page to a local variable
if (isset($_SESSION['token'])) 
	$csrfT = $_SESSION['token'];

// checkin whether the username or password or token is missing
if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['token'])) 
{
	// if the token from the FORM is similar to the SESSION token
	if ($csrfT == $_POST['token']) 
	{	
		// checking whether the user is a registed user
		if ($_POST['username'] == $user && $_POST['password'] == $pass)
		{
			// setting cookies for username and for sessionID
			setcookie("user", $_POST['username'], time() + (86400 * 5), "/");
			setcookie("sID", session_id(), time() + (86400 * 5), "/");

			// if the credentials are valid, then the is a logged in user
			$_SESSION['logged'] = 1;

			// redirecting the user to the dashboard
			header("Location: dashboard.php");

			// unsetting the SESSION token which was created in the login page
			unset($_SESSION['token']);
		}
		// if there are any error
		else
			$message = "INVALID USERNAME OR PASSWORD";
	}
	else
		die('INVALID REQUEST');
}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<!-- Showing error message -->
	<div class="mx-auto" style="width: 35%; margin: 15%; text-align: center;">
		<h1><?php echo $message;?></h1>
		<br>
		<a href="Login.php"><h2>LOGIN</h2></a>
	</div>

</body>
</html>