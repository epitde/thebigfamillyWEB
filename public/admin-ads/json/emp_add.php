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
$org_id = $_POST['org_id']; // org_id
$data = json_decode($_POST['data'], true);

$sql = "INSERT INTO tbl_user(`fullname`, `mobile`, `email`, `postal_code`, `username`, `password`, `profile_pic`, `address`, `role`, `status`, `request_by`, `created_at`) VALUES('".$data['fullname']."', '', '', '', '".$data['username']."', '".md5($data['password'])."', '', '', '2', 'active', '".$org_id."', '".time()."')";
mysqli_query($connection, $sql);
$sql = "SELECT * from tbl_user ORDER BY id DESC";
$result = mysqli_query($connection, $sql);
$row = mysqli_fetch_array($result);
$id = $row['id'];
$sql = "INSERT INTO `tbl_user_info`(`id`, `user_id`, `video`, `video_thumb`, `country`, `bio`, `gender`, `birthday`, `option1`, `option2`, `option3`, `option4`, `reg_number`) VALUES (null,".$row['id'].",'','','','','','','false','false','false','false','')";
mysqli_query($connection, $sql);

// ***********************************************************

$close = mysqli_close($connection) 
or die("An unexpected error has occurred in the disconnection of the database");
  

$json_string = json_encode(array('success'=>'1'));
print ($json_string);

?>
