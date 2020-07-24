<?php

header('Content-Type: application/json');
header("access-control-allow-origin: *");
header("Access-Control-Allow-Headers: *");

ini_set('display_errors', 1);
error_reporting(E_ALL);

require '../admin/config.php';
require '../admin/functions.php';

$connection = mysqli_connect($database['host'],$database['user'], $database['pass'], $database['db']) 
or die("An unexpected error has occurred in the database connection");

// ***********************************************************
// $mobile = $_POST['mobile'];
$email = $_POST['email'];
$sql = "SELECT * FROM tbl_user WHERE email='$email'";
$result = mysqli_query($connection, $sql);
$num = mysqli_num_rows($result);
if ($num > 0) {
	$row = mysqli_fetch_array($result);
	$uid = $row['id'];

	$code = generateNumericOTP(6);
	// sendCode($mobile, $code);
	sendCodeEmail($email, $code);

	$sql = "DELETE FROM tbl_user_opt WHERE email='$email'";
	mysqli_query($connection, $sql);
	$sql = "INSERT INTO tbl_user_opt(id, user_id, email, code) VALUES(null, $uid, '$email', '$code')";
	mysqli_query($connection, $sql);
	$json_string = json_encode(array('success'=>'1'));
} else {
	$json_string = json_encode(array('success'=>'0', 'msg'=>"Does not exist email."));
}
// ***********************************************************

$close = mysqli_close($connection) 
or die("An unexpected error has occurred in the disconnection of the database");
  

print ($json_string);

function generateNumericOTP($n) { 
    $generator = "1357902468";   
    $result = "";   
    for ($i = 1; $i <= $n; $i++) { 
        $result .= substr($generator, (rand()%(strlen($generator))), 1); 
    } 
    return $result; 
} 

function sendCodeEmail($email, $code) {
	$message = "
	<html>
	<head>
	<title>SnapPost - Reset Password</title>
	</head>
	<body>
	<p>Your code to reset password : ".$code."</p>
	</html>
	";

	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

	// More headers
	$from = "admin@bigzero.co.in";
	$from = "no-reply@bigzero.co.in";
	$headers .= 'From: <'.$from.'>' . "\r\n";

	mail($email, "SnapPost - Reset Password", $message,$headers);
}

?>
