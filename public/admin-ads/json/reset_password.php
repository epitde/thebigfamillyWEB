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
$code = $_POST['code'];
$new = $_POST['new'];

$sql = "SELECT * FROM tbl_user_opt WHERE code='$code'";
$result = mysqli_query($connection, $sql);
$num = mysqli_num_rows($result);
if ($num > 0) {
	$row = mysqli_fetch_array($result);
	$uid = $row['user_id'];

	$sql = "UPDATE tbl_user SET password='".md5($new)."' WHERE id=$uid";
	$result = mysqli_query($connection, $sql);
	$json_string = json_encode(array('success'=>'1'));
} else {
	$json_string = json_encode(array('success'=>'0', 'msg'=>"Incorrect your code."));
}


$close = mysqli_close($connection) 
or die("An unexpected error has occurred in the disconnection of the database");


print ($json_string);

?>
