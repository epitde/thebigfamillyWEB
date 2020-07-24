<?php

header('Content-Type: application/json');
header("access-control-allow-origin: *");
header("Access-Control-Allow-Headers: *");

require '../admin/config.php';

$connection = mysqli_connect($database['host'],$database['user'], $database['pass'], $database['db']) 
or die("An unexpected error has occurred in the database connection");

$user_id = $_POST['user_id'];
$pid = $_POST['pid'];
$sql = "SELECT * FROM tbl_follow_product WHERE user_id=$user_id AND pid=$pid";
$result = mysqli_query($connection, $sql);
$num = mysqli_num_rows($result);
if ($num > 0) {
	$sql = "DELETE FROM tbl_follow_product WHERE user_id=$user_id AND pid=$pid";
} else {
	$sql = "INSERT INTO tbl_follow_product(id, user_id, pid) VALUES(null, $user_id, $pid)";
}

if(!$result = mysqli_query($connection, $sql)) die();
    
$close = mysqli_close($connection) 
or die("An unexpected error has occurred in the disconnection of the database");
  

$json_string = json_encode(array('success'=>'1'));
print ($json_string)

?>
