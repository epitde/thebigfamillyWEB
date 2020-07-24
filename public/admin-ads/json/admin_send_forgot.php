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
$sql = "SELECT * FROM managers";
$result = mysqli_query($connection, $sql);
$num = mysqli_num_rows($result);
$row = mysqli_fetch_array($result);

$token = md5(time()*524);
$sql = "UPDATE managers SET token='".$token."'";
mysqli_query($connection, $sql);

$link = SITE_URL . '/controller/reset.php?token=' . $token;

$message = "
<html>
<head>
<title>SnapPost Admin - Reset Password</title>
</head>
<body>
<p>Here is reset link</p>
<p><a href='".$link."'>".$link."</a>
</html>
";

$email = $row['username'];
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <'.$email.'>' . "\r\n";

mail($email, "SnapPost Admin - Reset Password", $message,$headers);

// ***********************************************************

$close = mysqli_close($connection) 
or die("An unexpected error has occurred in the disconnection of the database");
  

print (json_encode(array('success'=>'1')));

?>
