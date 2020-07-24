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
$user_id = $_POST['user_id'];
$sql = "SELECT u.* FROM tbl_user as u, tbl_user_info as info WHERE u.id=info.user_id AND u.status = 'approved' AND u.request_by='".$user_id."' ORDER BY u.id DESC";
$result = mysqli_query($connection, $sql);
$list = array();
while($row = mysqli_fetch_array($result)) 
{	
	$row['profile_pic'] = SITE_URL . '/images/' . $row['profile_pic'];
    $list[] = $row;
}
// ***********************************************************

$close = mysqli_close($connection) 
or die("An unexpected error has occurred in the disconnection of the database");
  

$json_string = json_encode($list);
print ($json_string);

?>
