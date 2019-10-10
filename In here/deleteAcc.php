<?php
session_start();

$csrd = $sid = "";

// echo $_POST['CSRF'];

if (isset($_POST['CSRF'])) 
{
	if (!isset($_SESSION["map"])) 
	{
		echo "Session has expired. Try Again";
	}

	elseif (isset($_SESSION["map"])) 
	{
		// echo "<br/> ".$_SESSION["map"]."<br/>";
		// splitting the session id and the tokrn from session map
		$mapArr = explode (":", $_SESSION["map"]);

        //asign them to variables
        $csrf = $mapArr[0];
        $sid = $mapArr[1];
	}

	// if the submitted 
	if ($csrf != $_POST['CSRF'])
	{
        $messege = "Invalid CSRF token";
    }
    //compare the mapped seesion id and the posted session id 
    elseif ($sid != $_COOKIE['sID'])
    {
        $messege = "Invalid cookie.";
    }
    //if there are no errors
    else 
    {
        $messege = "Account Deleted Successfully";
    }
}
else
{
	$messege = "Invalid Request";
}

unset($_SESSION['map']);

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

	<h1 class="mx-auto" style="width: 35%; text-align: center; margin: 15%" ><?php echo $messege; ?></h1>
	<?php header( "refresh:3;url=logout.php" ); ?>

</body>
</html>