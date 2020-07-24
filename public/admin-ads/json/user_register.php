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
$type = $_POST['type'];
$data = json_decode($_POST['data'], true);

$sql = "SELECT * FROM tbl_user WHERE email='".$data['email']."'";
$result = mysqli_query($connection, $sql);
$num = mysqli_num_rows($result);
if ($num > 0) {
	mysqli_close($connection);
	$json_string = json_encode(array('success'=>'0', 'msg'=>"Already exist email address."));
	print ($json_string);
	return;
}


if ($type == "0") {
	$sql = "INSERT INTO tbl_user(`fullname`, `mobile`, `email`, `postal_code`, `username`, `password`, `profile_pic`, `created_at`) VALUES('".$data['fullname']."', '".$data['mobile']."', '".$data['email']."', '', '".$data['username']."', '".md5($data['password'])."', '', '".time()."')";
} else {
	$sql = "INSERT INTO tbl_user(`fullname`, `mobile`, `email`, `postal_code`, `username`, `password`, `profile_pic`, `address`, `role`, `created_at`) VALUES('".$data['company_name']."', '".$data['mobile']."', '".$data['email']."', '', '".$data['username']."', '".md5($data['password'])."', '', '".$data['address']."', '1', '".time()."')";
}
$result = mysqli_query($connection, $sql);

$sql = "SELECT email, id, fullname, username, status, role, provider FROM tbl_user ORDER BY id DESC";
$result = mysqli_query($connection, $sql);
$row = mysqli_fetch_array($result);
$row['user_role'] = $user_role[$row['role']];

// ***********************************************************

$close = mysqli_close($connection) 
or die("An unexpected error has occurred in the disconnection of the database");
  

$json_string = json_encode(array('success'=>'1', 'ret'=>$row));
print ($json_string);

?>
