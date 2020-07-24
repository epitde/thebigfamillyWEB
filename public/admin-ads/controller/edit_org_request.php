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
	$mobile = $_POST['mobile'];
	$fullname = $_POST['fullname'];
	$address = $_POST['address'];
	$postal_code = $_POST['postal_code'];
	$status = $_POST['status'];
	$id = cleardata($_POST['id']);

	$statment = $connect->prepare(
		'UPDATE tbl_user SET email = :email, mobile = :mobile, fullname = :fullname, address = :address, postal_code = :postal_code, status = :status WHERE id = :id'
	);
	$statment->execute(array(
		':email' => $email,
		':mobile' => $mobile,
		':fullname' => $fullname,
		':address' => $address,
		':postal_code' => $postal_code,
		':status' => $status,
		':id' => $id
	));


	goURL(SITE_URL . '/controller/org_requests.php');

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
require '../views/edit.org_request.view.php';
require '../views/footer.view.php';
    
} else {
		goURL(SITE_URL . '/controller/login.php');		
		}


?>