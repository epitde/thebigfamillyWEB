<?php

header('Content-Type: application/json');
header("access-control-allow-origin: *");
header("Access-Control-Allow-Headers: *");

require '../admin/config.php';

$connection = mysqli_connect($database['host'],$database['user'], $database['pass'], $database['db']) 
or die("An unexpected error has occurred in the database connection");

$pid = $_POST['pid'];
$sql = "SELECT * FROM tbl_follow_product WHERE pid=$pid ORDER BY id";
$result = mysqli_query($connection, $sql));
$list = array();
while($row = mysqli_fetch_array($result)) 
{	
	$id = $row['user_id'];
	$sql = "SELECT profile_pic, id, fullname, username, status, role, provider from tbl_user WHERE id=$id";
	$result1 = mysqli_query($connection, $sql);
	$user = mysqli_fetch_array($result1);
	if (strpos($user['profile_pic'], 'http') === false) {
		$user['profile_pic'] = SITE_URL . '/images/' . $user['profile_pic'];
	}
    $list[] = $user;
}
    
$close = mysqli_close($connection) 
or die("An unexpected error has occurred in the disconnection of the database");
  

$json_string = json_encode($list);
print ($json_string)

?>
