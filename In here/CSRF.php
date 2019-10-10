<?php 

if (isset($_POST['token_gen'])) 
{
	if ($_POST['token_gen'] == "deleteAcc") 
	{
		// calling a function to generate a token
		$token = generateToken();

		// function to map session ID and the token
		mapping($token);
	}
	//ajax response
    header("Content-Type: application/json", true);
    echo json_encode(array("token" => $token));
    exit;
}

//generate a token
function generateToken()
{
	$length = 32;
	// generating a random token
	$token = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $length);

	return $token;
}

// mapping session id and the token together
function mapping($token)
{
    session_start();

    //checking if the session id is set
    if(isset($_COOKIE["sID"]))
    {
        //getting session id from cookie
        $sID = $_COOKIE["sID"];

        //saving mapped token and session id in a session
        $_SESSION["map"] = $token.":".$sID;
    }
}

?>