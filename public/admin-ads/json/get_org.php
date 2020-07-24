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
$id = $_POST['id'];
$sql = "SELECT u.* FROM tbl_user as u, tbl_user_info as info WHERE u.id=info.user_id AND u.id='".$id."'";
$result = mysqli_query($connection, $sql);
$row = mysqli_fetch_array($result);
$row['password'] = '';
$row['profile_pic'] = SITE_URL . '/images/' . $row['profile_pic'];
// ***********************************************************

$close = mysqli_close($connection) 
or die("An unexpected error has occurred in the disconnection of the database");
  

$json_string = json_encode($row);
print ($json_string);

?>
