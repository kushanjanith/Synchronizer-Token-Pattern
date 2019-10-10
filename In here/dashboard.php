<?php

session_start();

// a local variable for late use
$loggedIN = 0;

if (isset($_COOKIE['sID']) && isset($_COOKIE['user']) && $_SESSION['logged'] == 1)
{
	// user is logged in to the dashboard
	$loggedIN = 1;

	// a small toast for the user
	$toast = "Welcome ".$_COOKIE['user']."!<br/>";
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>DASHBOARD</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script>
		// ajax call to generate a token and store it in the form below as a hidden value
		$.ajax({
            url:'CSRF.php',
            type:'POST',
            data:{ token_gen:"deleteAcc" },
            success:function(response) 
            {
                // getting the token from ajax response and add it in a hidden field
                document.getElementById("CSRF").value = response.token;
            }
        });
	</script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<!--checking whether the user is logged in or not -->
	<?php if ($loggedIN == 1) { ?>

		<div class="mx-auto" style="width: 35%; height:50%; margin: 15%" align="center">
			<table>
				<h1><?php echo $toast; ?></h1>
				<td>
					<form action="deleteAcc.php" method="POST">
						<input type="hidden" name="CSRF" id="CSRF" value=""/>
						<button type="submit" name="deleteAcc">DELETE ACOUNT</button><br>
					</form>
				</td>
				<td>
					<form action="logout.php">
						<button type="submit" name="logout">LOGOUT</button>
					</form>
				</td>
			</table>
		</div>

	<?php } 

	else
	{ ?>
		<div class="mx-auto" style="width: 35%; margin: 15%; text-align: center;">
			<h1>Your are not logged in</h1>
			<br><br>
			<a href="Login.php"><h2>Login</h2></a>
		</div>

	<?php } ?>

</body>
</html>