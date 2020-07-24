<?php

header('Content-Type: application/json');
header("access-control-allow-origin: *");
header("Access-Control-Allow-Headers: *");

ini_set('display_errors', 1);
error_reporting(E_ALL);

require '../admin/config.php';

$connection = mysqli_connect($database['host'],$database['user'], $database['pass'], $database['db']) 
or die("An unexpected error has occurred in the database connection");

// ***********************************************************
$old = $_POST['old'];
$new = $_POST['new'];
$id =  $_POST['user_id'];

$sql = "SELECT password FROM tbl_user WHERE id=$id";
$result = mysqli_query($connection, $sql);
$row = mysqli_fetch_array($result);
$b = false;
if ($row['password'] == '') {
	$b = true;
}
$sql = "SELECT * FROM tbl_user WHERE password='".md5($old)."' AND id=$id";
$result = mysqli_query($connection, $sql);
if ($result || $b) {
	$num = mysqli_num_rows($result);
	if ($num == 0 && !$b) {
		$json_string = json_encode(array('success'=>'0', 'msg'=>"Incorrect an old password."));
		print ($json_string);
	} else {
		$sql = "UPDATE tbl_user SET password='".md5($new)."' WHERE id=$id";
		$result = mysqli_query($connection, $sql);
		$json_string = json_encode(array('success'=>'1'));
		print ($json_string);
	}
} else {
	$json_string = json_encode(array('success'=>'0', 'msg'=>"Incorrect an old password."));
	print ($json_string);
}


$close = mysqli_close($connection) 
or die("An unexpected error has occurred in the disconnection of the database");


?>
