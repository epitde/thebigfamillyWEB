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
$id = $_POST['user_id'];
$limit = $_POST['limit'];

$sql = "SELECT profile_pic, id, username, status, role, provider from tbl_user WHERE id=$id";
$result = mysqli_query($connection, $sql);
$user = mysqli_fetch_array($result);
if (strpos($user['profile_pic'], 'http') === false) {
	$user['profile_pic'] = SITE_URL . '/images/' . $user['profile_pic'];
}

// $sql = "SELECT u.* FROM tbl_user as u, tbl_user_info as info WHERE u.id=info.user_id AND u.role != '10' AND (u.status = 'active' or u.status = 'approved') ORDER BY u.id LIMIT ".$limit;
// $result = mysqli_query($connection, $sql);
// $list = array();
// while($row = mysqli_fetch_array($result)) 
// {	
// 	$row['profile_pic'] = SITE_URL . '/images/' . $row['profile_pic'];
//     $list[] = $row;
// }
$sql = "SELECT * FROM tbl_adbanner ORDER BY id";
$result = mysqli_query($connection, $sql);
$list = array();
while($row = mysqli_fetch_array($result)) 
{	
	$row['image'] = SITE_URL . '/images/' . $row['image'];
    $list[] = $row;
}

// ***********************************************************

$close = mysqli_close($connection) 
or die("An unexpected error has occurred in the disconnection of the database");
  

$json_string = json_encode(array('list'=>$list, 'me'=>$user));
print ($json_string);

?>
