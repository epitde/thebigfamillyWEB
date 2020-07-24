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
$password = $_POST['password'];
	

$sql = "SELECT email, fullname, id, username, status, role, provider from tbl_user WHERE email='$email' AND password='".md5($password)."'";
$result = mysqli_query($connection, $sql);


$ret = "";
if ($result) {
	$num = mysqli_num_rows($result);
	if ($num == 0) {
		$json_string = json_encode(array('success'=>'0', 'msg'=>"Incorrect login information."));
		print ($json_string);
		return;
	}
	$ret = mysqli_fetch_array($result);

	$ret['user_role'] = $user_role[$ret['role']];
	if ($ret['status'] != 'active' && $ret['status'] != 'approved') {
		$json_string = json_encode(array('success'=>'0', 'msg'=>"Can't login because you are blocked or not approval."));
		print ($json_string);
		return;
	}
} else {
	$json_string = json_encode(array('success'=>'0', 'msg'=>"Incorrect login information."));
	print ($json_string);
	return;
}
// ***********************************************************

$close = mysqli_close($connection) 
or die("An unexpected error has occurred in the disconnection of the database");
  

$json_string = json_encode(array('success'=>'1', 'ret'=>$ret));
print ($json_string);

?>
