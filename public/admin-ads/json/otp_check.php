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
$code = $_POST['code'];
$sql = "SELECT * FROM tbl_user_opt WHERE code='$code'";
$result = mysqli_query($connection, $sql);
$num = mysqli_num_rows($result);
if ($num > 0) {
	$row = mysqli_fetch_array($result);
	$uid = $row['user_id'];

	$sql = "SELECT profile_pic, id, username, status, role, provider FROM tbl_user WHERE id=$uid";
	$result = mysqli_query($connection, $sql);
	$row = mysqli_fetch_array($result);
	$row['user_role'] = $user_role[$row['role']];
	if (strpos($row['profile_pic'], 'http') === false) {
		$row['profile_pic'] = SITE_URL . '/images/' . $row['profile_pic'];
	}
	$json_string = json_encode(array('success'=>'1', 'ret'=>$row));
} else {
	$json_string = json_encode(array('success'=>'0', 'msg'=>"Incorrect your code."));
}
// ***********************************************************

$close = mysqli_close($connection) 
or die("An unexpected error has occurred in the disconnection of the database");
  

print ($json_string);

?>
