<?php 

 ini_set('session.gc_maxlifetime', 3600*24);
session_start();

ini_set('display_errors', 1);
error_reporting(E_ALL);

require '../admin/config.php';
require '../admin/functions.php';

$connection = mysqli_connect($database['host'],$database['user'], $database['pass'], $database['db']) 
or die("An unexpected error has occurred in the database connection");

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	$password = $_POST['password'];
	$sql = "UPDATE managers SET password='".$password."'";
	mysqli_query($connection, $sql);

	goURL(SITE_URL . '/controller/login.php');
} else {
	$token = $_GET['token'];
	$sql = "SELECT * FROM managers WHERE token='".$token."'";
	$result = mysqli_query($connection, $sql);
	$num = mysqli_num_rows($result);
	$valid = false;
	if ($num > 0) {
		$new_token = md5(time()*524);
		$sql = "UPDATE managers SET token='".$new_token."'";
		mysqli_query($connection, $sql);
		$valid = true;
	}
}

require '../views/header.view.php';
require '../views/navbar.view.php'; 
require '../views/reset.view.php';
require '../views/footer.view.php';
    


?>