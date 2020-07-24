<?php 

 ini_set('session.gc_maxlifetime', 3600*24);
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);
require '../admin/config.php';
require '../admin/functions.php';	

if (isset($_SESSION['username'])){
    
    
require '../views/header.view.php';
require '../views/navbar.view.php';    

$errors = '';   

$connect = connect($database);
if(!$connect){
	goURL(SITE_URL . '/controller/error.php');
}

$categories = get_all_categories($connect);
$users = get_all_users($connect);
for ($i=0; $i<count($users); $i++) {
	if (strpos($users[$i]['profile_pic'], 'http') === false) {
		if ($users[$i]['profile_pic'] == '') {
			$users[$i]['profile_pic'] = SITE_URL . '/images/profile.png';
		} else {
			$users[$i]['profile_pic'] = SITE_URL . '/images/' . $users[$i]['profile_pic'];
		}
	}
}
$products = get_all_products($connect);
$requests = get_all_requests($connect);

$categories_total = count($categories);
$users_total = count($users);
$products_total = count($products);

require '../views/home.view.php';
require '../views/footer.view.php';
    
} else {
	goURL(SITE_URL . '/controller/login.php');		
}


?>