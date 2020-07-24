<?php 

 ini_set('session.gc_maxlifetime', 3600*24);
session_start();

ini_set('display_errors', 1);
error_reporting(E_ALL);

require '../admin/config.php';
require '../admin/functions.php';
if (isset($_SESSION['username'])){
    
    

$connect = connect($database);
if(!$connect){
	goURL(SITE_URL . '/controller/error.php');
	}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){


	$email = $_POST['email'];
	$username = $_POST['username'];
	$fullname = $_POST['fullname'];
	$role = $_POST['role'];
	$status = $_POST['status'];
	$id = cleardata($_POST['id']);

	$statment = $connect->prepare(
		'UPDATE tbl_user SET email = :email, username = :username, fullname = :fullname, role = :role, status = :status WHERE id = :id'
	);
	$statment->execute(array(
		':email' => $email,
		':username' => $username,
		':fullname' => $fullname,
		':role' => $role,
		':status' => $status,
		':id' => $id
	));


	goURL(SITE_URL . '/controller/users.php');

} else {

	$id_user = id_user($_GET['id']);
	    
	if(empty($id_user)){
		goURL(SITE_URL . '/controller/home.php');
	}	

	$user = get_user_per_id($connect, $id_user);
	    
    if (!$user){
	    goURL(SITE_URL . '/controller/home.php');
	}

	$user = $user['0'];

}


require '../views/header.view.php';
require '../views/navbar.view.php'; 
require '../views/edit.user.view.php';
require '../views/footer.view.php';
    
} else {
		goURL(SITE_URL . '/controller/login.php');		
		}


?>