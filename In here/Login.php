<?php

//starting session
session_start();

//checking if the user logged in already
if(isset($_COOKIE["sID"]) && isset($_COOKIE["user"]) && isset($_SESSION["logged"])){
    // rederecting to the dashboard.php
    header("Location: 	dashboard.php");
}

// generating a random token value
$length = 32;
$_SESSION['token'] = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $length);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<div class="mx-auto" style="width: 15%; margin: 15% text-align: center; margin-top: 15%;">
		<form action="validate_login.php" method="POST">
			<h1 class="mx-auto" style="width: 35%;">Login</h1>

			<div class="form-group">
    			<label>Username</label>
    			<input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    		</div>

			<div class="form-group">
    			<label>Password</label>
    			<input type="password" name="password" class="form-control" id="exampleInputPassword1">
  			</div>

			<div class="mx-auto" style="width: 25%;">
				<button type="submit" class="btn btn-dark">Login</button>
			</div>

			<input type="hidden" name="token" id="token" value="<?=$_SESSION['token']?>">

			<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/	X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="	sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
			<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="	sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		</form>
	</div>
</body>
</html>