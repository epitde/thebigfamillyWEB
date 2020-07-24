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
$check_status = $_POST['check_status'];
$sql = "UPDATE tbl_product SET check_status='".$check_status."' WHERE id=".$id;
$result = mysqli_query($connection, $sql);

// ***********************************************************

$close = mysqli_close($connection) 
or die("An unexpected error has occurred in the disconnection of the database");
  

$json_string = json_encode(array('success'=>'1'));
print ($json_string);

?>
